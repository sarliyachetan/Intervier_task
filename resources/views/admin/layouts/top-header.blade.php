<header id="page-topbar">
    <div class="layout-width">
       <div class="navbar-header">
          <div class="d-flex">
             <!-- LOGO -->
             <div class="navbar-brand-box horizontal-logo">
                <a href="index.html" class="logo logo-dark">
                <span class="logo-sm">
                <img src="{{ asset('backend/images/logo-sm.png')}}" alt="" height="22">
                </span>
                <span class="logo-lg">
                <img src="{{ asset('backend/images/logo-dark.png')}}" alt="" height="17">
                </span>
                </a>
                <a href="index.html" class="logo logo-light">
                <span class="logo-sm">
                <img src="{{ asset('backend/images/logo-sm.png')}}" alt="" height="22">
                </span>
                <span class="logo-lg">
                <img src="{{ asset('backend/images/logo-light.png')}}" alt="" height="17">
                </span>
                </a>
             </div>
             <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger material-shadow-none" id="topnav-hamburger-icon">
             <span class="hamburger-icon">
             <span></span>
             <span></span>
             <span></span>
             </span>
             </button>
             <!-- App Search-->
            
          </div>
          <div class="d-flex align-items-center">
             <div class="dropdown d-md-none topbar-head-dropdown header-item">
                <button type="button" class="btn btn-icon btn-topbar material-shadow-none btn-ghost-secondary rounded-circle" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="bx bx-search fs-22"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">
                   <form class="p-3">
                      <div class="form-group m-0">
                         <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                         </div>
                      </div>
                   </form>
                </div>
             </div>
           
             <div class="dropdown ms-sm-3 header-item topbar-user">
                <button type="button" class="btn material-shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="d-flex align-items-center">
                <img class="rounded-circle header-profile-user" src="{{ asset('backend/images/users/avatar-1.jpg')}}" alt="Header Avatar">
                <span class="text-start ms-xl-2">
                <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ __(Auth::guard('admin')->user()->name) }}</span>
                <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text">Developer</span>
                </span>
                </span>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                   <!-- item-->
                   <h6 class="dropdown-header">Welcome {{ __(Auth::guard('admin')->user()->name) }}!</h6>
                   <a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
                </div>
             </div>
          </div>
       </div>
    </div>
 </header>
