<!-- partial:partials/_navbar.html -->
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
            <a class="navbar-brand brand-logo" href="#">
                <img src="{{asset('admin/images/logo.png')}}" style="width:45px" alt="logo" />
                <label style="font-size:18px;color:white"> cryptokaktus</label></a>
            <a class="navbar-brand brand-logo-mini" href="#">
                <img src="{{asset('admin/images/logo.png')}}" style="width:40px" alt="logo" /></a>
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="typcn typcn-th-menu"></span>
            </button>
        </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-2">
            <li class="nav-item nav-profile dropdown">
                    <img src="{{asset(Auth::user()->profile == null
                    ? Config::get('constants.NO_AVATAR')
                    : Auth::user()->profile->image)}}" alt="profile" />
                    <span class="nav-profile-name">{{ Auth::user()->name }}</span>
            </li>
            <li class="nav-item nav-user-status dropdown">
                <p class="mb-0">Member since {{ Auth::user()->created_at->format('M Y') }}</p>
            </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-date dropdown">
                <a class="nav-link d-flex justify-content-center align-items-center" href="javascript:;">
                    <h6 class="date mb-0">Today : {{date("M d")}}</h6>
                    <i class="typcn typcn-calendar"></i>
                </a>
            </li>
            <li class="nav-item dropdown mr-0">
                <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center
                 justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
                    <i class="typcn typcn-export-outline"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="typcn typcn-export-outline text-primary"></i>
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center"
         type="button" data-toggle="offcanvas">
            <span class="typcn typcn-th-menu"></span>
        </button>
    </div>
</nav>
