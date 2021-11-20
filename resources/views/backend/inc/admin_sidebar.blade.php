<!-- partial:partials/_sidebar.html -->
		<nav class="sidebar">
      <div class="sidebar-header">
          <a href="{{ route('admin.dashboard') }}" class="sidebar-brand" style="font-size:18px;">
          
          <img src="{{ url('storage/app/public/logo/'.Helper::instance()->general_settings('logo')->logo) }}" style="height: 50px;">
        </a>
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="sidebar-body">
        <ul class="nav">
          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.generalsettings') }}" class="nav-link">
              <i class="link-icon" data-feather="feather"></i>
              <span class="link-title">General Settings</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#airdrops" role="button" aria-expanded="false" aria-controls="airdrops">
              <i class="link-icon" data-feather="feather"></i>
              <span class="link-title">Airdrops</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="@php $v = \App\Helpers\Helper::instance()->areActiveRoutes(['users.valid,users.invalid']); if($v =='active') echo 'collapse show';else echo 'collapse'; @endphp " id="airdrops">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{ route('users.valid') }}" class="nav-link @php echo $v = \App\Helpers\Helper::instance()->areActiveRoutes(['users.valid']); @endphp">Valid Users</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('users.invalid') }}" class="nav-link @php echo $v = \App\Helpers\Helper::instance()->areActiveRoutes(['users.invalid']); @endphp">Invalid Users</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
              <i class="link-icon" data-feather="feather"></i>
              <span class="link-title">Profiles</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="@php $v = \App\Helpers\Helper::instance()->areActiveRoutes(['users.index']); if($v =='active') echo 'collapse show';else echo 'collapse'; @endphp " id="emails">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{ route('users.index') }}" class="nav-link @php echo $v = \App\Helpers\Helper::instance()->areActiveRoutes(['users.index']); @endphp">Users List</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a href="{{ route('token-request.index') }}" class="nav-link">
              <i class="link-icon" data-feather="feather"></i>
              <span class="link-title">Token Requests</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('contact.index') }}" class="nav-link">
              <i class="link-icon" data-feather="feather"></i>
              <span class="link-title">Contact Requests</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.forum') }}" class="nav-link">
              <i class="link-icon" data-feather="feather"></i>
              <span class="link-title">Forum</span>
            </a>
          </li>
           <li class="nav-item">
            <a href="{{ route('admin.news') }}" class="nav-link">
              <i class="link-icon" data-feather="volume-2"></i>
              <span class="link-title">Announcements</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.chats') }}" class="nav-link">
              <i class="link-icon" data-feather="feather"></i>
              <span class="link-title">Chat</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.users1')}}" class="nav-link">
              <i class="link-icon" data-feather="feather"></i>
              <span class="link-title">Assign Moderator</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.hyperzones')}}" class="nav-link">
              <i class="link-icon" data-feather="feather"></i>
              <span class="link-title">Hyperzones</span>
            </a>
          </li>
         
          
            
            
            
          
           
        </ul>
      </div>
    </nav>