@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('css')
@endsection
@section('content')
<div class="page-content">
   <div class="container-fluid">
      <div class="row">
         <div class="col">
            <div class="h-100">
               <div class="row mb-3 pb-1">
                  <div class="col-12">
                     <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                        <div class="flex-grow-1">
                           <h4 class="fs-16 mb-1">Good Morning, {{ __(Auth::guard('admin')->user()->name) }} !</h4>
                           <p class="text-muted mb-0">Here's what's happening with your store today.</p>
                        </div>
                        <div class="mt-3 mt-lg-0">
                           <form action="javascript:void(0);">
                              <div class="row g-3 mb-0 align-items-center">
                                 <div class="col-sm-auto">
                                    <div class="input-group">
                                       <input type="text" class="form-control border-0 dash-filter-picker shadow" data-provider="flatpickr" data-range-date="true" data-date-format="d M, Y" data-deafult-date="01 Jan 2022 to 31 Jan 2022">
                                       <div class="input-group-text bg-primary border-primary text-white">
                                          <i class="ri-calendar-2-line"></i>
                                       </div>
                                    </div>
                                 </div>
                                 <!--end col-->
                                 <div class="col-auto">
                                    {{-- <button type="button" class="btn btn-soft-success"><i class="ri-add-circle-line align-middle me-1"></i> Add Product</button> --}}
                                 </div>
                                 <!--end col-->
                                 <div class="col-auto">
                                    <button type="button" class="btn btn-soft-info btn-icon waves-effect waves-light layout-rightside-btn"><i class="ri-pulse-line"></i></button>
                                 </div>
                                 <!--end col-->
                              </div>
                              <!--end row-->
                           </form>
                        </div>
                     </div>
                     <!-- end card header -->
                  </div>
                  <!--end col-->
               </div>
            </div>
            <!-- end .h-100-->
         </div>
      </div>
      <!--  -->
      <div class="row">
         <div class="col-xl-4 col-md-4">
            <!-- card -->
            <div class="card card-animate">
               <div class="card-body">
                  <div class="d-flex align-items-center">
                     <div class="flex-grow-1 overflow-hidden">
                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Total Order</p>
                     </div>
                     <div class="flex-shrink-0">
                        <h5 class="text-success fs-14 mb-0">
                           <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +16.24 %
                        </h5>
                     </div>
                  </div>
                  <div class="d-flex align-items-end justify-content-between mt-4">
                     <div>
                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">{{ $OrderTotal ?? '0'}} </h4>
                        <!-- <a href="#" class="text-decoration-underline">View net earnings</a> -->
                     </div>
                     <!-- <div class="avatar-sm flex-shrink-0">
                        <span class="avatar-title bg-success-subtle rounded fs-3">
                        <i class="bx bx-dollar-circle text-success"></i>
                        </span>
                        </div> -->
                  </div>
               </div>
               <!-- end card body -->
            </div>
            <!-- end card -->
         </div>
         <!-- end col -->
         <div class="col-xl-4 col-md-4">
            <!-- card -->
            <div class="card card-animate">
               <div class="card-body">
                  <div class="d-flex align-items-center">
                     <div class="flex-grow-1 overflow-hidden">
                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Payment</p>
                     </div>
                     <div class="flex-shrink-0">
                        <h5 class="text-danger fs-14 mb-0">
                           <i class="ri-arrow-right-down-line fs-13 align-middle"></i> 
                        </h5>
                     </div>
                  </div>
                  <div class="d-flex align-items-end justify-content-between mt-4">
                     <div>
                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">{{ $OrderTotalPayment ?? '0'}}</h4>
                     </div>
                  </div>
               </div>
               <!-- end card body -->
            </div>
            <!-- end card -->
         </div>
         <!-- end col -->
         <div class="col-xl-4 col-md-4">
            <!-- card -->
            <div class="card card-animate">
               <div class="card-body">
                  <div class="d-flex align-items-center">
                     <div class="flex-grow-1 overflow-hidden">
                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">TOTAL STOCK </p>
                     </div>
                     <div class="flex-shrink-0">
                        <h5 class="text-success fs-14 mb-0">
                           <i class="ri-arrow-right-up-line fs-13 align-middle"></i>
                        </h5>
                     </div>
                  </div>
                  <div class="d-flex align-items-end justify-content-between mt-4">
                     <div>
                        <h4 class="fs-22 fw-semibold ff-secondary mb-4 {{ $TotalStock <= 49 ? 'text-danger' : '' }}">
                           {{ $TotalStock ?? '0' }}
                        </h4>
                        @if($TotalStock <= 49)
                        <div class="text-danger fw-medium">Low Stock</div>
                        @endif
                     </div>
                  </div>
               </div>
               <!-- end card body -->
            </div>
            <!-- end card -->
         </div>
         <!-- end col -->
         <!-- end col -->
      </div>
      <!--  -->
      {{--  --}}
      <div class="row">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-header align-items-center d-flex">
                  <h4 class="card-title mb-0 flex-grow-1">Today Order </h4>
                  <div class="flex-shrink-0">
                     <div class="dropdown card-header-dropdown">
                        <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="fw-semibold text-uppercase fs-12">Sort by:
                        </span><span class="text-muted">Today<i class="mdi mdi-chevron-down ms-1"></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                           <a class="dropdown-item" href="#">Today</a>
                           <a class="dropdown-item" href="#">Yesterday</a>
                           <a class="dropdown-item" href="#">Last 7 Days</a>
                           <a class="dropdown-item" href="#">Last 30 Days</a>
                           <a class="dropdown-item" href="#">This Month</a>
                           <a class="dropdown-item" href="#">Last Month</a>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- end card header -->
               <div class="card-body">
                  <div class="table-responsive table-card">
                     <table class="table table-hover table-centered align-middle table-nowrap mb-0">
                        <tbody>
                           @foreach($OrderToday as $today)
                           <tr>
                              <td>
                                 <div class="d-flex align-items-center">
                                    <div class="avatar-sm bg-light rounded p-1 me-2">
                                       <img src="assets/images/products/img-1.png" alt="" class="img-fluid d-block">
                                    </div>
                                    <div>
                                       <h5 class="fs-14 my-1"><a href="apps-ecommerce-product-details.html" class="text-reset">{{ $today->Users->name }}</a></h5>
                                       <span class="text-muted">{{ $today->created_at ? $today->created_at->format('d M Y, h:i A') : '/' }}</span>
                                    </div>
                                 </div>
                              </td>
                             
                              <td>
                                 <h5 class="fs-14 my-1 fw-normal">${{ $today->total ?? ''}}</h5>
                                 <span class="text-muted">Amount</span>
                              </td>
                           </tr>
                           @endforeach
                        
                        </tbody>
                     </table>
                  </div>
                  <div class="align-items-center mt-4 pt-2 justify-content-between row text-center text-sm-start">
                     <div class="col-sm">
                        <div class="text-muted">
                           Showing <span class="fw-semibold">5</span> of <span class="fw-semibold">25</span> Results
                        </div>
                     </div>
                     <div class="col-sm-auto  mt-3 mt-sm-0">
                        <ul class="pagination pagination-separated pagination-sm mb-0 justify-content-center">
                           <li class="page-item disabled">
                              <a href="#" class="page-link">←</a>
                           </li>
                           <li class="page-item">
                              <a href="#" class="page-link">1</a>
                           </li>
                           <li class="page-item active">
                              <a href="#" class="page-link">2</a>
                           </li>
                           <li class="page-item">
                              <a href="#" class="page-link">3</a>
                           </li>
                           <li class="page-item">
                              <a href="#" class="page-link">→</a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
        
         <!-- .col-->
      </div>
   </div>
   <!-- container-fluid -->
</div>
@endsection
@section('js')
<script src="{{ asset('backend/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
@endsection