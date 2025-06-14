<div class="app-menu navbar-menu">
    {{-- <div class="navbar-brand-box">
       <a href="index.html" class="logo logo-dark">
       <span class="logo-sm">
       <img src="{{ asset('backend/Logo/thumnail.png') }}" alt="" height="22">
       </span>
       <span class="logo-lg">
       <img src="{{ asset('backend/Logo/admin-logo-change.png')}}" alt="" height="17">
       </span>
       </a>
       <a href="index.html" class="logo logo-light">
       <span class="logo-sm">
       <img src="{{ asset('backend/Logo/thumnail.png') }}" alt="" height="22">
       </span>
       <span class="logo-lg">
       <img src="{{ asset('backend/Logo/admin-logo-change.png')}}" alt="" height="25">
       </span>
       </a>
       <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
       <i class="ri-record-circle-line"></i>
       </button>
    </div> --}}
    <div id="scrollbar">
       <div class="container-fluid">
          <div id="two-column-menu"> </div>
          <ul class="navbar-nav" id="navbar-nav">
             <li class="menu-title"><span data-key="t-menu">Menu</span></li>
             <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('admin.dashboard') }}" role="button">
                <i class="ri-dashboard-2-line"></i> <span>Dashboards</span>
                </a>
             </li>
             <li class="menu-title"><i class="ri-bar-chart-fill"></i> <span data-key="t-pages">Master</span></li>
             <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('admin.product.index')}}" role="button">
                <i class="ri-admin-fill"></i> <span data-key="t-apps">Inventory Management</span>
                </a>
             </li>
            
                <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('admin.order.index')}}" role="button">
                <i class="ri-admin-fill"></i> <span data-key="t-apps">Order Management</span>
                </a>
             </li>
           
            
            

            
            
          </ul>
       </div>
    </div>
    <div class="sidebar-background"></div>
 </div>
