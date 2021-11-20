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
                        <form class="cmxform" method="post" name="myFormName" action="{{ route('users.updatestatus', $detail->id) }}" id="submit_update_form" enctype="multipart/form-data">
                            @csrf
                            <fieldset>
                                <div class="form-group">
                                    <div class="row">
					<div class="col-md-9"></div>
                                        <div class="col-md-3">
                                            <select name="user_status" class="form-control updateStatus" id="">
                                                <option value="">-- Change User Status</option>
                                                <option value="1" @if($detail->published == 1){{'selected'}}@endif>Active</option>
                                                <option value="0" @if($detail->published == 0){{'selected'}}@endif>Deactive</option>
                                            </select>
                                        </div>
                                    </div>
				</div>
                                <div class="form-group">
                                    <div class="row">
					<div class="col-md-2"><label for="name">Username : </label></div>
					<div class="col-md-4">{{ $detail->name }}</div>
                                        <div class="col-md-2"><label for="name">Email : </label></div>
					<div class="col-md-4">{{  $detail->email }}</div>
                                    </div>
				</div>
                                <div class="form-group">
                                    <div class="row">
					<div class="col-md-2"><label for="name">DOB : </label></div>
					<div class="col-md-4">@if($detail->dob){{ \App\Helpers\Helper::instance()->dateFormat($detail->dob) }}@else{{'NA'}}@endif</div>
                                        <div class="col-md-2"><label for="name">Whatsapp Number : </label></div>
					<div class="col-md-4">@if($detail->watsapp){{ $detail->watsapp }}@else{{'NA'}}@endif</div>
                                    </div>
				</div>
                                <div class="form-group">
                                    <div class="row">
					<div class="col-md-2"><label for="name">Twitter Link : </label></div>
					<div class="col-md-4">@if($detail->twitter_link){{ $detail->twitter_link }}@else{{'NA'}}@endif</div>
                                        <div class="col-md-2"><label for="name">Wallet Address : </label></div>
					<div class="col-md-4">@if($detail->hyper_code){{ $detail->hyper_code }}@else{{'NA'}}@endif</div>
                                    </div>
				</div>
                                <div class="form-group">
                                    <div class="row">
					<div class="col-md-2"><label for="name">Wallet Address Verified : </label></div>
					<div class="col-md-4">@if($detail->hypercode_verified ==1){{ 'Yes' }}@else{{ 'No' }}@endif</div>
                                        <div class="col-md-2"><label for="name">Profile Photo : </label></div>
                                        <div class="col-md-4">@if($detail->photo)<img src='{{ url('/'.$detail->photo) }}' height="80px"> @else{{'NA'}}@endif</div>
                                    </div>
				</div>
                                <div class="form-group">
                                    <div class="row">
					<div class="col-md-2"><label for="name">Registered At : </label></div>
					<div class="col-md-4">{{ \App\Helpers\Helper::instance()->dateFormat($detail->created_at) }}</div>
                                        <div class="col-md-2"><label for="name"></label></div>
					<div class="col-md-4"></div>
                                    </div>
				</div>
                                
                                
                                
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