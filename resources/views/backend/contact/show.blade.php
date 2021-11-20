@extends('backend.layouts.layout')
@section('content')
<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('contact.index') }}">Contact Request</a></li>
            <li class="breadcrumb-item active" aria-current="page">View Contact Request</li>
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
	
                    <form class="cmxform" method="post" action="{{ route('contact.update', $detail->id) }}" enctype="multipart/form-data">
                    @csrf
                    <input name="_method" type="hidden" value="PATCH">
                    <fieldset>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name">Name</label>
				</div>
				<div class="col-md-4">
                                    {{ ucwords($detail->name) }}
				</div>
                                <div class="col-md-2">
                                    <label for="name">Email</label>
				</div>
				<div class="col-md-4">
                                    {{ $detail->email }}
				</div>
                            </div>
			</div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name">Phone</label>
				</div>
				<div class="col-md-4">
                                    {{ $detail->phone }}
				</div>
                                <div class="col-md-2">
                                    <label for="name">Message</label>
				</div>
				<div class="col-md-4">
                                    {{ $detail->message }}
				</div>
                            </div>
			</div>
                        
                        <div class="form-group">
                            <div class="row">
                                
                                <div class="col-md-2">
                                    <label for="name">Status</label>
				</div>
				<div class="col-md-4">
                                    @if($detail->published == 1){{ 'Closed' }}
                                    @else
                                    <select name="published" class="form-control updateStatus" id="">
                                        <option value="">-- Change request Status</option>
                                        <option value="0" @if($detail->published == 0){{'selected'}}@endif>Open</option>
                                        <option value="1" @if($detail->published == 1){{'selected'}}@endif>Closed</option>
                                    </select>
                                    @if($errors->has('published'))
						<div class='error text-danger'>{{ $errors->first('published') }}</div>
                                            @endif
                                    @endif
				</div>
                                <div class="col-md-2"></div>
				<div class="col-md-4"></div>
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