@extends('backend.layouts.layout')
@section('content')
<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('token-request.index') }}">Token Request</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update Token Request</li>
	</ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
		
                    @if (Session::has('successmessage'))
                        <div class="row mb-3"><div class='error text-success'>{{ Session::get('successmessage') }}</div></div>
                    @endif 
                    @if (Session::has('errormessage'))
                        <div class="row mb-3"><div class='error text-success'>{{ Session::get('errormessage') }}</div></div>
                    @endif 
	
                    <form class="cmxform" method="post" action="{{ route('token-request.update', $detail->id) }}" enctype="multipart/form-data">
                    @csrf
                    <input name="_method" type="hidden" value="PATCH">
                    <fieldset>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name">Username</label>
				</div>
				<div class="col-md-4">
                                    {{ ucwords($detail->user->name) }}
				</div>
                                <div class="col-md-2">
                                    <label for="name">Email</label>
				</div>
				<div class="col-md-4">
                                    {{ $detail->user->email }}
				</div>
                            </div>
			</div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name">Amount</label>
				</div>
				<div class="col-md-4">
                                    ${{ $detail->amount }}
				</div>
                                <div class="col-md-2">
                                    <label for="name">Ethereum Value</label>
				</div>
				<div class="col-md-4">
                                    {{ $detail->ethereum }}
				</div>
                            </div>
			</div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name">Token Value</label>
				</div>
				<div class="col-md-4">
                                    {{ $detail->hyper_token }}
				</div>
                                <div class="col-md-2">
                                    <label for="name">Wallet Address</label>
				</div>
				<div class="col-md-4">
                                    @if($detail->wallet_address){{ $detail->wallet_address }}@else{{ $detail->user->hyper_code }}@endif
				</div>
                            </div>
			</div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name">Hash Number</label>
				</div>
				<div class="col-md-4">
                                    {{ $detail->hash_number }}
				</div>
                                <div class="col-md-2">
                                    <label for="name">Request Token Status</label>
				</div>
				<div class="col-md-4">
                                    @if($detail->published == 1){{ 'Confirmed' }}
                                    @else
                                    <select name="published" class="form-control updateStatus" id="">
                                        <option value="">-- Change request Status</option>
                                        <option value="0" @if($detail->published == 0){{'selected'}}@endif>Pending</option>
                                        <option value="1" @if($detail->published == 1){{'selected'}}@endif>Done</option>
                                    </select>
                                    @if($errors->has('published'))
						<div class='error text-danger'>{{ $errors->first('published') }}</div>
                                            @endif
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
$(document).ready(function() {
	
});
</script>
@endsection('script')