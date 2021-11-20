@extends('backend.layouts.layout')
@section('content')
<div class="page-content">
	<nav class="page-breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Profile</a></li>
			<li class="breadcrumb-item active" aria-current="page">Update Profile</li>
		</ol>
	</nav>
	<div class="row">
	
		<div class="col-lg-3 grid-margin stretch-card"></div>
					<div class="col-lg-6 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Update Profile</h4>
								@if (Session::has('successmessage'))
									<div class='error text-success'>{{ Session::get('successmessage') }}</div>
								@endif 
								@if (Session::has('errormessage'))
									<div class='error text-success'>{{ Session::get('errormessage') }}</div>
								@endif 
	
								<form class="cmxform" method="post" action="{{ route('admin.update') }}">
								@csrf
									<fieldset>
										<div class="form-group">
											<label for="name">Name</label>
											<input id="name" class="form-control" name="name" type="text" value="{{ $details->name }}">
											@if($errors->has('name'))
												<div class='error text-danger'>{{ $errors->first('name') }}</div>
											@endif
										</div>
										<div class="form-group">
											<label for="email">Email</label>
											<input id="email" class="form-control" name="email" type="email" value="{{ $details->email }}">
											@if($errors->has('email'))
												<div class='error text-danger'>{{ $errors->first('email') }}</div>
											@endif
										</div>
										<div class="form-group">
											<label for="password">Password</label>
											<input id="password" class="form-control" name="password" type="password">
											@if($errors->has('password'))
												<div class='error text-danger'>{{ $errors->first('password') }}</div>
											@endif
										</div>
										<div class="form-group">
											<label for="confirm_password">Confirm password</label>
											<input id="confirm_password" class="form-control" name="confirm_password" type="password">
											@if($errors->has('confirm_password'))
												<div class='error text-danger'>{{ $errors->first('confirm_password') }}</div>
											@endif
										</div>
										<input class="btn btn-primary" type="submit" name="update" value="Update">
									</fieldset>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-3 grid-margin stretch-card">
						
					</div>
				</div>
</div>
@endsection('content')