@extends('saleperson.layouts.app')
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
                           <h4 class="fs-16 mb-1">Good Morning, {{ __(Auth::guard('saleperson')->user()->name) }} !</h4>
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
   <div class="col-xl-6 col-md-6">
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
                  <!-- <a href="" class="text-decoration-underline">View </a> -->
               </div>
               <div class="avatar-sm flex-shrink-0">
                  <span class="avatar-title bg-success-subtle rounded fs-3">
                  <i class="bx bx-dollar-circle text-success"></i>
                  </span>
               </div>
            </div>
         </div>
         <!-- end card body -->
      </div>
      <!-- end card -->
   </div>
   <!-- end col -->
  
</div>
      <!--  -->
      {{--  --}}
   </div>
   <!-- container-fluid -->
</div>

@endsection
@section('js')
<script src="{{ asset('backend/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
@endsection