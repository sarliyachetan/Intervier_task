<div class="header">
    <nav class="navbar py-2">
        <div class="container-xxl">
            <!-- header rightbar icon -->
            <div class="h-right d-flex align-items-center mr-5 mr-lg-0 order-1">
                {{-- <div class="d-flex">
                <a class="nav-link text-primary collapsed" href="help.html" title="Get Help">
                <i class="icofont-info-square fs-5"></i>
                </a></div> --}}
                {{-- <div class="dropdown zindex-popover">
                <a class="nav-link dropdown-toggle pulse" href="#" role="button" data-bs-toggle="dropdown">
                <img src="assets/images/flag/GB.png" alt="">
                </a>
              
             </div> --}}
              
                <div class="dropdown user-profile ml-2 ml-sm-3 d-flex align-items-center zindex-popover">
                    <div class="u-info me-2">
                        <p class="mb-0 text-end line-height-sm "><span class="font-weight-bold">{{ __(Auth::guard('admin')->user()->name) }}</span></p>
                        {{-- <small>Admin Profile</small> --}}
                    </div>
                    <a class="nav-link dropdown-toggle pulse p-0" href="#" role="button" data-bs-toggle="dropdown" data-bs-display="static">
                        <img class="avatar lg rounded-circle img-thumbnail" src="{{ asset('backend/images/profile_av.svg') }}" alt="profile">
                    </a>
                    <div class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-end p-0 m-0">
                        <div class="card border-0 w280">
                            <div class="card-body pb-0">
                                <div class="d-flex py-1">
                                    <img class="avatar rounded-circle" src="{{ asset('backend/images/profile_av.svg') }}" alt="profile">
                                    <div class="flex-fill ms-3">
                                        <p class="mb-0"><span class="font-weight-bold">{{ __(Auth::guard('admin')->user()->name) }}</span></p>
                                        <small class="">{{ __(Auth::guard('admin')->user()->email) }}</small>
                                    </div>
                                </div>
                                <div>
                                    <hr class="dropdown-divider border-dark">
                                </div>
                            </div>
                            <div class="list-group m-2 ">
                                <a href="#" class="list-group-item list-group-item-action border-0 "><i class="icofont-ui-user fs-5 me-3"></i>Profile Page</a>
                                {{-- <a href="order-invoices.html"
                                    class="list-group-item list-group-item-action border-0 "><i
                                        class="icofont-file-text fs-5 me-3"></i>Order Invoices</a> --}}
                                <a href="{{ route('admin.logout') }}" class="list-group-item list-group-item-action border-0 "><i class="icofont-logout fs-5 me-3"></i>Signout</a>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="setting ms-2">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#Settingmodal"><i class="icofont-gear-alt fs-5"></i></a>
                </div> --}}
            </div>
            <!-- menu toggler -->
            <button class="navbar-toggler p-0 border-0 menu-toggle order-3" type="button" data-bs-toggle="collapse" data-bs-target="#mainHeader">
                <span class="fa fa-bars"></span>
            </button>
            <!-- main menu Search-->
            <div class="order-0 col-lg-4 col-md-4 col-sm-12 col-12 mb-3 mb-md-0 ">
                <div class="input-group flex-nowrap input-group-lg">
                    <input type="search" class="form-control" placeholder="Search" aria-label="search" aria-describedby="addon-wrapping">
                    <button type="button" class="input-group-text" id="addon-wrapping"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
    </nav>
</div>
