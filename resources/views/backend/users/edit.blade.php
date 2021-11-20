@extends('backend.layouts.layout')
@section('content')
<div class="page-content">
	<nav class="page-breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
			<li class="breadcrumb-item active" aria-current="page">Users Detail</li>
		</ol>
	</nav>
	<div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        {{--<h6 class="card-title">Hoverable Table</h6>
                                            <p class="card-description">Add class <code>.table-hover</code></p>--}}

                        @if (Session::has('successmessage'))
                            <div class='error text-success'>{{ Session::get('successmessage') }}</div>
                        @endif 
                        @if (Session::has('errormessage'))
                            <div class='error text-danger'>{{ Session::get('errormessage') }}</div>
                        @endif 
                        <form class="cmxform" method="post" name="myFormName" action="{{ route('users.update', $detail->id) }}" id="submit_update_form" enctype="multipart/form-data">
                            @csrf
                            <input name="_method" type="hidden" value="PATCH">
                            <fieldset>
                                <div class="form-group">
                                    <div class="row">
					<div class="col-md-2"><label for="name">Username : </label></div>
                                        <div class="col-md-4">
                                            <input type="text" name="username" value="@if(old('username')){{ old('username') }}@else{{ $detail->name }}@endif" class="form-control">
                                            @if($errors->has('username'))
						<div class='error text-danger'>{{ $errors->first('username') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-md-2"><label for="name">Email : </label></div>
					<div class="col-md-4">
                                            <input type="text" name="email" value="@if(old('email')){{ old('email') }}@else{{ $detail->email }}@endif" class="form-control">
                                            @if($errors->has('email'))
						<div class='error text-danger'>{{ $errors->first('email') }}</div>
                                            @endif
                                        </div>
                                    </div>
				</div>
                                <div class="form-group">
                                    <div class="row">
					<div class="col-md-2"><label for="name">DOB : </label></div>
					<div class="col-md-4">
                                            <input type="text" name="dob" value="@if(old('dob')){{ old('dob') }}@elseif($detail->dob){{ date('Y-m-d', strtotime($detail->dob)) }}@endif" class="form-control" id="dob" autocomplete="off">
                                            @if($errors->has('dob'))
						<div class='error text-danger'>{{ $errors->first('dob') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-md-2"><label for="name">Whatsapp Number : </label></div>
					<div class="col-md-4">
                                            <input type="text" name="watsapp" value="@if(old('watsapp')){{ old('watsapp') }}@else{{ $detail->watsapp }}@endif" class="form-control">
                                            @if($errors->has('watsapp'))
						<div class='error text-danger'>{{ $errors->first('watsapp') }}</div>
                                            @endif
                                        </div>
                                    </div>
				</div>
                                <div class="form-group">
                                    <div class="row">
					<div class="col-md-2"><label for="name">Twitter Link : </label></div>
					<div class="col-md-4">
                                            <input type="text" name="twitter_link" value="@if(old('twitter_link')){{ old('twitter_link') }}@else{{ $detail->twitter_link }}@endif" class="form-control">
                                            @if($errors->has('twitter_link'))
						<div class='error text-danger'>{{ $errors->first('twitter_link') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-md-2"><label for="name">Wallet Address : </label></div>
					<div class="col-md-4">
                                            <input type="text" name="hyper_code" value="@if(old('hyper_code')){{ old('hyper_code') }}@else{{ $detail->hyper_code }}@endif" class="form-control">
                                            @if($errors->has('hyper_code'))
						<div class='error text-danger'>{{ $errors->first('hyper_code') }}</div>
                                            @endif
                                        </div>
                                    </div>
				</div>
                                <div class="form-group">
                                    <div class="row">
					<div class="col-md-2"><label for="name">Wallet Address Verified : </label></div>
					<div class="col-md-4">
                                            <select name="hyper_code_verified" class="form-control updateStatus" id="">
                                                <option value="">-- Change Wallet Status</option>
                                                <option value="1" @if($detail->hypercode_verified == 1){{'selected'}}@endif>Yes</option>
                                                <option value="0" @if($detail->hypercode_verified == 0){{'selected'}}@endif>No</option>
                                            </select>
                                            @if($errors->has('hyper_code_verified'))
						<div class='error text-danger'>{{ $errors->first('hyper_code_verified') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-md-2"><label for="name">Published : </label></div>
                                        <div class="col-md-4">
                                            <select name="user_status" class="form-control updateStatus" id="">
                                                <option value="">-- Change Status</option>
                                                <option value="1" @if($detail->published == 1){{'selected'}}@endif>Active</option>
                                                <option value="0" @if($detail->published == 0){{'selected'}}@endif>Deactive</option>
                                            </select>
                                            @if($errors->has('user_status'))
						<div class='error text-danger'>{{ $errors->first('user_status') }}</div>
                                            @endif
                                        </div>
                                    </div>
				</div>
                               <input class="btn btn-primary float-right" type="submit" name="submit" value="Update">
                                
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
	</div>
</div>
@endsection('content')
@section('script')
<script>
    //submit function onchange
    $(function() {
        $('.updateStatus').change(function() {
            this.form.submit();
        });
    });
</script>
@endsection