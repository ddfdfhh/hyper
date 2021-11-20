<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Hypermeteor Admin</title>
	<!-- core:css -->
	<link rel="stylesheet" href="{{ asset('/assets/backend/vendors/core/core.css') }}">
	<link rel="stylesheet" href="{{ asset('/assets/backend/vendors/select2/select2.min.css') }}">
	<!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('/assets/backend/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
	<!-- end plugin css for this page -->
	<!-- inject:css -->
	
	<link rel="stylesheet" href="{{ asset('/assets/backend/fonts/feather-font/css/iconfont.css') }}">
	<link rel="stylesheet" href="{{ asset('/assets/backend/vendors/flag-icon-css/css/flag-icon.min.css') }}">
	<!-- endinject -->
  <!-- Layout styles -->  
	<link rel="stylesheet" href="{{ asset('/assets/backend/css/demo_1/style.css') }}">
  <!-- End layout styles -->
  
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
  <link rel="stylesheet" href="{{ asset('/assets/backend/css/all.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/backend/vendors/jquery-tags-input/jquery.tagsinput.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/backend/vendors/simplemde/simplemde.min.css') }}">
  <link rel="shortcut icon" href="{{ asset('/assets/backend/images/favicon.png') }}" />
  <style>
	  .pull-right{
		  float:right!important;margin-bottom:10px;
	  }
	  table td img{
		  border-radius:0!important;
		 height:200 px!important;
		 width:200px!important; */
	  }
	  </style>
  @livewireStyles
  
</head>
<body>
	<div class="main-wrapper">

		@include('backend.inc.admin_sidebar') 
    
	
		<div class="page-wrapper">
					
			<!-- partial:partials/_navbar.html -->
			<nav class="navbar">
				<a href="#" class="sidebar-toggler">
					<i data-feather="menu"></i>
				</a>
				<div class="navbar-content">
				{{--<form class="search-form">
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i data-feather="search"></i>
								</div>
							</div>
							<input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
						</div>
					</form>--}}
					<ul class="navbar-nav">
						
						<li class="nav-item dropdown nav-profile">
							
							<a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								 <img src="{{ asset('/assets/backend/images/usericon.png') }}" alt="profile">
							</a>
							<div class="dropdown-menu" aria-labelledby="profileDropdown">
								<div class="dropdown-header d-flex flex-column align-items-center">
									<div class="figure mb-3">
										<img src="{{ asset('/assets/backend/images/yourlogo.png') }}" alt="profile">
									</div>
									<div class="info text-center">
										<p class="name font-weight-bold mb-0">{{ Auth::user()->name }}</p>
										<p class="email text-muted mb-3">{{ Auth::user()->email }}</p>
									</div>
								</div>
								<div class="dropdown-body">
									<ul class="profile-nav p-0 pt-3">
										<li class="nav-item">
											<a href="{{ route('admin.profile') }}" class="nav-link">
												<i data-feather="user"></i>
												<span>Profile</span>
											</a>
										</li>
										<li class="nav-item">
											<a href="{{ route('logout') }}" class="nav-link">
												<i data-feather="log-out"></i>
												<span>Log Out</span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</nav>
			<!-- partial -->

			@yield('content')

			<!-- partial:partials/_footer.html -->
			<footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">
				<p class="text-muted text-center text-md-left">Copyright © {{ date('Y') }} <a href="{{ asset('/') }}" target="_blank">Hypermeteor</a>. All rights reserved</p>
				
			</footer>
			<!-- partial -->
		
		</div>
	</div>
		
	<div class="alert-container">
		{{--<div class="alert success">success!</div>
		  <div class=" alert warning">warning</div>--}}
		</div>
		<style>
		.alert-container{min-width: 250px;position: fixed;top: 12px;right: 12px;max-width: 480px;z-index: 10000;opacity: 0.9;border-radius: 6px;}.warning,.success{margin: 0;color: #FFF;}.alert-container .success{background-color:#009900;}.alert-container .warning{background-color:#F59D2E;}
		
		</style>
		 @livewireScripts
	<script type="text/javascript" src="{{ asset('/assets/backend/js/jquery-3.3.1.min.js') }}"></script>
	<!-- core:js -->
	<script src="{{ asset('/assets/backend/vendors/core/core.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/assets/backend/js/spartan-multi-image-picker-min.js') }}"></script>
	
	<script src="{{ asset('/assets/backend/vendors/select2/select2.min.js') }}"></script>
	<script src="{{ asset('/assets/backend/js/select2.js') }}"></script>
	
	<script src="{{ asset('/assets/backend/vendors/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
	<script src="{{ asset('/assets/backend/js/tags-input.js') }}"></script>
	
	<script src="{{ asset('/assets/backend/vendors/simplemde/simplemde.min.js') }}"></script>
	<script src="{{ asset('/assets/backend/js/simplemde.js') }}"></script>
	
	<script src="{{ asset('/assets/backend/vendors/tinymce/tinymce.min.js') }}"></script>
	<script src="{{ asset('/assets/backend/js/tinymce.js') }}"></script>
	
	<!-- endinject -->
	<!-- plugin js for this page -->
	{{--<script src="{{ asset('/assets/backend/vendors/chartjs/Chart.min.js') }}"></script>--}}
		{{--<script src="{{ asset('/assets/backend/vendors/jquery.flot/jquery.flot.js') }}"></script>
	<script src="{{ asset('/assets/backend/vendors/jquery.flot/jquery.flot.resize.js') }}"></script>--}}
	<script src="{{ asset('/assets/backend/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
		{{--<script src="{{ asset('/assets/backend/vendors/apexcharts/apexcharts.min.js') }}"></script>
	<script src="{{ asset('/assets/backend/vendors/progressbar.js/progressbar.min.js') }}"></script>--}}
	<script src="{{ asset('/assets/backend/vendors/feather-icons/feather.min.js') }}"></script>
	<script src="{{ asset('/assets/backend/js/template.js') }}"></script>
	<script src="{{ asset('/assets/backend/js/dashboard.js') }}"></script>
	<script src="{{ asset('/assets/backend/js/datepicker.js') }}"></script>
	<script src="{{ asset('/assets/backend/js/datepicker.js') }}"></script>
	
	
		{{--<script src="{{ asset('/assets/backend/vendors/jquery-validation/jquery.validate.min.js') }}"></script>
		<script src="{{ asset('/assets/backend/js/form-validation.js') }}"></script>--}}
	
	@yield('script')
	@stack('scripts')
	<script>
	$(document).ready(function(){
		//validate string with numeric data
		$(document).on('keydown', '.checkdigits', function(e){
			$(this).val($(this).val().replace(/[^0-9\.]/g,''));
		});
	});
	window.livewire.on('postUpdated', () => {
	
     $('#myModal').modal('hide');
     $('.modal-backdrop').css('display','none');
 })
	</script>
	
</body>
</html>    