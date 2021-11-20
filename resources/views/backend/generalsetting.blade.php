@extends('backend.layouts.layout')
@section('content')
<div class="page-content">
	<nav class="page-breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('admin.generalsettings') }}">General Setting</a></li>
			<li class="breadcrumb-item active" aria-current="page">Update General Setting</li>
		</ol>
	</nav>
	<div class="row">
		<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
				<div class="card-body">
				{{--<h4 class="card-title">Update Profile</h4>--}}
					@if (Session::has('successmessage'))
						<div class="row mb-3"><div class='error text-success'>{{ Session::get('successmessage') }}</div></div>
					@endif 
					@if (Session::has('errormessage'))
						<div class="row mb-3"><div class='error text-success'>{{ Session::get('errormessage') }}</div></div>
					@endif 
	
					<form class="cmxform" method="post" action="{{ route('admin.generalsettings') }}" enctype="multipart/form-data">
						@csrf
						<fieldset>
							<div class="form-group">
								<div class="row">
									<div class="col-md-2">
										<label for="name">Logo (200x100)</label>
									</div>
									<div class="col-md-4">
										  <input type="file" name="logo" value="">
										@if($errors->has('logo'))
											<div class='error text-danger'>{{ $errors->first('logo') }}</div>
										@endif
									</div>
                                                                    <div class="col-md-2">
										<label for="name">Favicon Icon (50x50)</label>
									</div>
									<div class="col-md-4">
										  <input type="file" name="fav_icon" value="" >
										@if($errors->has('fav_icon'))
											<div class='error text-danger'>{{ $errors->first('fav_icon') }}</div>
										@endif
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<div class="row">
									<div class="col-md-2">
										<label for="name">Reddit Url</label>
									</div>
									<div class="col-md-4">
										<input type="text" class="form-control" name="reddit_url" value="{{ $detail->reddit }}"/>
										@if($errors->has('reddit_url'))
											<div class='error text-danger'>{{ $errors->first('reddit_url') }}</div>
										@endif
									</div>
									<div class="col-md-2">
										<label for="name">Twitter Url</label>
									</div>
									<div class="col-md-4">
										<input type="text" class="form-control" name="twitter_url" value="{{ $detail->twitter }}"/>
										@if($errors->has('twitter_url'))
											<div class='error text-danger'>{{ $errors->first('twitter_url') }}</div>
										@endif
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-2">
										<label for="name">Instagram Url</label>
									</div>
									<div class="col-md-4">
										<input type="text" class="form-control" name="instagram_url" value="{{ $detail->instagram }}"/>
										@if($errors->has('instagram_url'))
											<div class='error text-danger'>{{ $errors->first('instagram_url') }}</div>
										@endif
									</div>
									<div class="col-md-2">
										<label for="name">Linkedin Url</label>
									</div>
									<div class="col-md-4">
										<input type="text" class="form-control" name="linkedin_url" value="{{ $detail->linkedin }}"/>
										@if($errors->has('linkedin_url'))
											<div class='error text-danger'>{{ $errors->first('linkedin_url') }}</div>
										@endif
									</div>
								</div>
							</div>
                                                        <div class="form-group">
								<div class="row">
									<div class="col-md-2">
										<label for="name">Youtube Url</label>
									</div>
									<div class="col-md-4">
										<input type="text" class="form-control" name="youtube_url" value="{{ $detail->youtube }}"/>
										@if($errors->has('youtube_url'))
											<div class='error text-danger'>{{ $errors->first('youtube_url') }}</div>
										@endif
									</div>
									<div class="col-md-2">
										<label for="name">Discord Url</label>
									</div>
									<div class="col-md-4">
										<input type="text" class="form-control" name="discord_url" value="{{ $detail->discord }}"/>
										@if($errors->has('discord_url'))
											<div class='error text-danger'>{{ $errors->first('discord_url') }}</div>
										@endif
									</div>
								</div>
							</div>
                                                        <div class="form-group">
								<div class="row">
									<div class="col-md-2">
										<label for="name">Hyper Unity</label>
									</div>
									<div class="col-md-4">
										<input type="text" class="form-control" name="hyper_url" value="{{ $detail->hyper }}"/>
										@if($errors->has('hyper_url'))
											<div class='error text-danger'>{{ $errors->first('hyper_url') }}</div>
										@endif
									</div>
									<div class="col-md-2">
										<label for="name">Site Title</label>
									</div>
									<div class="col-md-4">
										<input type="text" class="form-control" name="site_title" value="{{ $detail->site_title }}"/>
										@if($errors->has('site_title'))
											<div class='error text-danger'>{{ $errors->first('site_title') }}</div>
										@endif
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-2">
										<label for="name">Address</label>
									</div>
									<div class="col-md-4">
										<input type="text" class="form-control" name="address" value="{{ $detail->address }}"/>
										@if($errors->has('address'))
											<div class='error text-danger'>{{ $errors->first('address') }}</div>
										@endif
									</div>
									<div class="col-md-2">
										<label for="name">Phone Number</label>
									</div>
									<div class="col-md-4">
										<input type="text" class="form-control" name="phone" value="{{ $detail->phone }}"/>
										@if($errors->has('phone'))
											<div class='error text-danger'>{{ $errors->first('phone') }}</div>
										@endif
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-2">
										<label for="name">Email</label>
									</div>
									<div class="col-md-4">
										<input type="text" class="form-control" name="email" value="{{ $detail->email }}"/>
										@if($errors->has('email'))
											<div class='error text-danger'>{{ $errors->first('email') }}</div>
										@endif
									</div>
                                                                    <div class="col-md-2">
                                                                        <label for="name">Hymeteor Token Value</label>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input type="text" class="form-control" name="hymeteor_token" value="{{ $detail->hymeteor_token }}"/>
										@if($errors->has('hymeteor_token'))
											<div class='error text-danger'>{{ $errors->first('hymeteor_token') }}</div>
										@endif
                                                                    </div>
								</div>
							</div>
                                                        
							
                                                    <input type="hidden" name="old_logo" value="{{ $detail->logo }}">
                                                    <input type="hidden" name="old_favicon" value="{{ $detail->favicon }}">
							<input class="btn btn-primary float-right" type="submit" name="submit" value="Update">
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	<div>
	
		
</div>
@endsection('content')

@section('script')
<script>
$(document).ready(function() {
	
});
</script>
@endsection('script')