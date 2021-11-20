<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;
use ErrorException;
use Illuminate\Support\Facades\Route;

use File;
use App\Models\GeneralSetting;
use App\Models\PrivateConversation;
class Helper{
    public static function diffInHours($date){
        $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i',now());
        $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i',$date);
        $diff_in_hours = $to->diffInHours($from);
  
      return $diff_in_hours;    
  }
	//remove special character from string
	function generateRandomString($length) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*(){}<>?';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	
        //remove special character from string
	function sessionString($length) {
		$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
       public static function unreadChats(){
           \DB::enableQueryLog();
       $c=PrivateConversation::where(function($q){
        $q->where('from_id',auth()->id())->orWhere('to_id',auth()->id());
           
       })->where('is_read','No')->count();
      // dd(\DB::getQueryLog());
  //dd($c);
      return $c;    
  }  
	
        //areActiveRoutes
	function areActiveRoutes(Array $routes, $output = "active"){
            foreach ($routes as $route) {
                if (Route::currentRouteName() == $route) return $output;
            }

        }
    
	//get decimal two digits
	public function numberFormat($number){
		return number_format($number, 2);
	}
	
        //RemoveSpecialChar
        public function RemoveSpecialChar($str){ 
            // Using preg_replace() function  
            // to replace the word  
            $res = preg_replace('/[^a-zA-Z0-9_ -]/s','',$str); 
		  
            // Returning the result  
            return $res = str_replace(' ', '-', $res);; 
	}
        
        //json encode
        public function jsonEncode($array){
            return json_encode($array);
        }
        
        //json decode
        public function jsonDecode($array){
            return json_decode($array);
        }
        
        
        //date format 
        public function dateFormat($date){
            return date('M d, Y', strtotime($date));
        }
        
        //datetime format 
        public function datetimeFormat($date){
            return date('M d, Y  H:i A', strtotime($date));
        }
        
        //convert usd to ethereum
        public function convertUsdToEthereum(){
            $ch = curl_init(); //curl handler init

            curl_setopt($ch,CURLOPT_URL,"https://min-api.cryptocompare.com/data/price?fsym=USD&tsyms=ETH");
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);// set optional params
            curl_setopt($ch,CURLOPT_HEADER, false); 
            $result=curl_exec($ch);
            curl_close($ch);
            return $this->jsonDecode($result);
        }
        
        // get general settings
        public function general_settings($select){
            return GeneralSetting::select($select)->orderBy('id', 'desc')->first();
        }
        
       //make instance
	public static function instance(){
		return new Helper();
	}
	
	
    
}
?>