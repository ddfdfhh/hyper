<?php

use Illuminate\Support\Facades\Route;
use App\Models\Forum;
use App\Models\User;
use App\Events\UserOnline;
use App\Events\UserOffline;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/setUserLive/{id}', function ($id) {
    User::find($id)->update('live_status','Yes');
    broadcast(new UserOnline($user));
    return 'done';
});
Route::get('/setUserOffline/{id}', function ($id) {
    User::find($id)->update('live_status','No');
    broadcast(new UserOffline($user));
    return 'done';
});
Auth::routes();
Broadcast::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/who-are-hypo-meteor', [App\Http\Controllers\HomeController::class, 'aboutus'])->name('aboutus');
Route::get('/meet-the-team', [App\Http\Controllers\HomeController::class, 'team'])->name('team');
Route::get('/contact-us', [App\Http\Controllers\HomeController::class, 'contactus'])->name('contactus');
Route::post('/contact-us', [App\Http\Controllers\HomeController::class, 'contactus'])->name('contactus');
Route::get('/services', [App\Http\Controllers\HomeController::class, 'services'])->name('services');
Route::get('/partnerships-and-collaborations', [App\Http\Controllers\HomeController::class, 'partnerships'])->name('partnerships');

//Route::get('/user/register', [App\Http\Controllers\HomeController::class, 'userregister'])->name('user.register');
Route::post('/user/register', [App\Http\Controllers\Auth\RegisterController::class, 'userregister'])->name('user.register');
Route::post('/user/token/register', [App\Http\Controllers\Auth\RegisterController::class, 'tokenregister'])->name('token.register');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


Route::post('/cart', [App\Http\Controllers\CartController::class, 'storecart'])->name('storecart');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'cart'])->name('viewcart');

//user routes
Route::group(['middleware' => ['auth','CheckUser']], function () {
    //admin routes
    Route::prefix('user')->group(function () {
        Route::get('dashboard', [App\Http\Controllers\User\DashboardController::class, 'index'])->name('user.dashboard');
          Route::get('search', [App\Http\Controllers\User\DashboardController::class, 'search'])->name('user.search');
        Route::post('profile', [App\Http\Controllers\User\ProfileController::class, 'profile'])->name('user.profile');
        Route::get('profile/{base64id?}', [App\Http\Controllers\User\ProfileController::class, 'profileView'])->name('user.profileView');
        Route::post('profile/photo', [App\Http\Controllers\User\ProfileController::class, 'profilePhoto'])->name('profile.photo');
        
        Route::get('presale', [App\Http\Controllers\User\PresaleController::class, 'index'])->name('user.presale');
        Route::get('forums', [App\Http\Controllers\User\ProfileController::class, 'forums'])->name('user.forums');
        Route::get('forum/{id}', [App\Http\Controllers\User\ProfileController::class, 'forum'])->name('user.forum');
        Route::get('hyperzone/{id?}', [App\Http\Controllers\User\ProfileController::class, 'hyperzone'])->name('user.hyperzone');
         Route::get('hyperzone-front', [App\Http\Controllers\User\ProfileController::class, 'hyperzone_front'])->name('user.hyperzone.front');
          Route::get('hyperzone-single/{id}/{obj?}', [App\Http\Controllers\User\ProfileController::class, 'hyperzone_single'])->name('user.hyperzone-single');
        Route::get('setting', [App\Http\Controllers\User\ProfileController::class, 'setting'])->name('user.setting');
        Route::get('wallet', [App\Http\Controllers\User\ProfileController::class, 'wallet'])->name('user.wallet');
        Route::get('notifications', [App\Http\Controllers\User\ProfileController::class, 'notifications'])->name('user.notifications');
        Route::get('messages', [App\Http\Controllers\User\ProfileController::class, 'messages'])->name('user.messages');
       Route::get('private_message', [App\Http\Controllers\User\ProfileController::class, 'private_message'])->name('user.private_message');
      
        Route::get('about', [App\Http\Controllers\User\ProfileController::class, 'about'])->name('user.about');
        Route::get('airdrop', [App\Http\Controllers\User\ProfileController::class, 'airdrop'])->name('user.airdrop');
        Route::get('getUsers', [App\Http\Controllers\User\ProfileController::class, 'userFilter'])->name('user.filter');
         Route::get('referrals', [App\Http\Controllers\User\ProfileController::class, 'referrals'])->name('user.referrals');
          Route::get('guide', [App\Http\Controllers\User\ProfileController::class, 'guide'])->name('user.guide');
         Route::get('post/{id}', [App\Http\Controllers\User\ProfileController::class, 'single_post'])->name('user.post');
        Route::get('search', [App\Http\Controllers\User\DashboardController::class, 'search'])->name('user.search');
         Route::get('hypertokens', [App\Http\Controllers\User\ProfileController::class, 'hyper_tokens'])->name('user.hyper_tokens');
             Route::get('hyper_article', [App\Http\Controllers\User\ProfileController::class, 'hyper_article'])->name('user.hyper_article');
     Route::get('collaborations', [App\Http\Controllers\User\ProfileController::class, 'collaborations'])->name('user.collaborations');
     Route::get('help_center', [App\Http\Controllers\User\ProfileController::class, 'help_center'])->name('user.help_center');
   
    
    });
});
  Route::get('forum/{id}', [App\Http\Controllers\User\ProfileController::class, 'forum'])->name('user.forum');
      
     Route::get('post/{id}', [App\Http\Controllers\User\ProfileController::class, 'single_post'])->name('user.post');
    
//user routes
Route::get('/admin', function () {    return redirect()->route('admin.login'); });
Route::get('/admin/login', [App\Http\Controllers\Admin\AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [App\Http\Controllers\Auth\LoginController::class, 'adminlogin'])->name('admin.login');
Route::group(['middleware' => ['auth','CheckAdmin']], function () {
    //admin routes
    Route::prefix('admin')->group(function () {
        Route::get('dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('profile', [App\Http\Controllers\Admin\AdminController::class, 'profile'])->name('admin.profile');
        Route::post('update', [App\Http\Controllers\Admin\AdminController::class, 'updateprofile'])->name('admin.update');
        Route::get('general-settings', [App\Http\Controllers\Admin\AdminController::class, 'generalSettings'])->name('admin.generalsettings');
        Route::post('general-settings', [App\Http\Controllers\Admin\AdminController::class, 'generalSettings'])->name('admin.generalsettings');
        Route::get('chats', [App\Http\Controllers\Admin\AdminController::class, 'chats'])->name('admin.chats');
        Route::get('chat_del/{id}/{status}', [App\Http\Controllers\Admin\AdminController::class, 'chat_delete'])->name('admin.chats.delete');
        Route::get('/users1', [App\Http\Controllers\Admin\AdminController::class, 'user_list'])->name('admin.users1');
        Route::get('users/search', [App\Http\Controllers\Admin\AdminController::class, 'user_list'])->name('admin.search.users');
        Route::post('assign_moderator', [App\Http\Controllers\Admin\AdminController::class, 'assingModerator'])->name('admin.assign.moderator');
        Route::post('mute/user', [App\Http\Controllers\Admin\AdminController::class, 'muteUser'])->name('admin.mute.user');
        Route::post('hyperzone/update', [App\Http\Controllers\Admin\AdminController::class, 'hyperzoneUpdate'])->name('admin.hyperzone.update');
        Route::get('hyperzone', [App\Http\Controllers\Admin\AdminController::class, 'hyperzoneList'])->name('admin.hyperzones');
        Route::get('hyperzone/search', [App\Http\Controllers\Admin\AdminController::class, 'hyperzoneList'])->name('admin.search.hyperzones');
    
        // Route::post('forum', [Admin\AdminController::class, 'forum'])->name('admin.forum');
        Route::get('forum', function(){
            return view('backend.forum');
        })->name('admin.forum');
        Route::get('forum/view/{id}',[App\Http\Controllers\Admin\AdminController::class, 'viewForum'])->name('admin.forum.view');
        Route::get('forum/edit/{id}',[App\Http\Controllers\Admin\AdminController::class, 'editForum'])->name('admin.forum.edit');
        Route::put('forum/update/{id}',[App\Http\Controllers\Admin\AdminController::class, 'updateForum'])->name('admin.forum.update');
       //news routes 
        Route::get('news', function(){
            return view('backend.news');
        })->name('admin.news');
        Route::get('news/view/{id}',[App\Http\Controllers\Admin\AdminController::class, 'viewNews'])->name('admin.news.view');
        Route::get('news/edit/{id}',[App\Http\Controllers\Admin\AdminController::class, 'editNews'])->name('admin.news.edit');
        Route::put('news/update/{id}',[App\Http\Controllers\Admin\AdminController::class, 'updateNews'])->name('admin.news.update');
       
        //token request
        Route::resource('token-request','App\Http\Controllers\Admin\TokenRequestController');
        Route::get('token-request/destroy/{id}', [App\Http\Controllers\Admin\TokenRequestController::class, 'destroy'])->name('token-request.destroy');
        
        //users
        Route::resource('users','App\Http\Controllers\Admin\UserController');
        
        //contact
        Route::resource('contact','App\Http\Controllers\Admin\ContactController');
        Route::get('contact/destroy/{id}', [App\Http\Controllers\Admin\ContactController::class, 'destroy'])->name('contact.destroy');
        
        Route::get('valid/users', [App\Http\Controllers\Admin\UserController::class, 'validUsers'])->name('users.valid');
        Route::get('invalid/users', [App\Http\Controllers\Admin\UserController::class, 'invalidUsers'])->name('users.invalid');
        Route::get('users/destroy/{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('users.destroy');
        Route::post('updatestatus/{id}', [App\Http\Controllers\Admin\UserController::class, 'updatestatus'])->name('users.updatestatus');
        Route::get('exportusers', [App\Http\Controllers\Admin\UserController::class, 'exportUsersCsv'])->name('users.export');
        Route::get('exportvalidusers/{hypercode}', [App\Http\Controllers\Admin\UserController::class, 'exportUsersCsv'])->name('users.validexport');
    });
});
Route::get('redirecttologin/{amount}',[App\Http\Controllers\PaypalController::class,'redirecttologin']);
Route::get('paywithpaypal/{amount}', [App\Http\Controllers\PaypalController::class,'postPaymentWithpaypal'])->name('paypal');
Route::get('paypal/{amount}',  [App\Http\Controllers\PaypalController::class,'postPaymentWithpaypal']);
Route::get('paypal',  [App\Http\Controllers\PaypalController::class,'getPaymentStatus'])->name('status');
Route::get('payment_success',function(){
    return view('front/user/payment_success');
})->name('payment-success');
Route::get('payment_failed',function(){
    return view('front/user/payment_failed');
})->name('payment-failed');
Route::get('payment_cancelled',function(){
    return view('front/user/payment_cancelled');
})->name('payment-cancelled');
Route::get('payment_error',function(){
    return view('front/user/payment_error');
})->name('payment-error');
Route::get('/clear-cache', function() {
   // Artisan::call('storage:link');
    Artisan::call('cache:clear');
    Artisan::call('optimize:clear');
    Artisan::call('route:clear');
	Artisan::call('view:clear');
	Artisan::call('config:cache');

    return '<h1>Cache facade value cleared</h1>';
});
Route::get('/link', function() {
     Artisan::call('storage:link');
    
 
     return '<h1>linked</h1>';
 });
