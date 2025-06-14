@extends('saleperson.layouts.app')
@section('title', 'Order')
@section('css')
@endsection
@section('content')
<div class="page-content">
   <div class="container-fluid">
      <!-- start page title -->
      <div class="row">
         <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
               <h4 class="mb-sm-0">Order</h4>
               <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                     <li class="breadcrumb-item"><a href="javascript: void(0);">ERP</a></li>
                     <li class="breadcrumb-item active">Order</li>
                  </ol>
               </div>
            </div>
         </div>
      </div>
      <!-- end page title -->
    
      <div class="row">
         <div class="col-lg-12">
            <div class="card" id="applicationList">
               <div class="card-header  border-0">
                  <div class="d-md-flex align-items-center">
                     <h5 class="card-title mb-3 mb-md-0 flex-grow-1">Order</h5>
                     <div class="flex-shrink-0">
                        <div class="d-flex gap-1 flex-wrap">
                        
                         <a href="{{ route('saleperson.order.order-pdf') }}" class="btn btn-primary" target="_blank">
    <i class="ri-add-line align-bottom me-1"></i> PDF Export
</a>
                        </div>
                     </div>
                  </div>
               </div>
             
               <div class="card-body pt-0">
                  <div>
                     <ul class="nav nav-tabs nav-tabs-custom nav-success mb-3" role="tablist">
                        <li class="nav-item">
                           <a class="nav-link active All py-3" data-bs-toggle="tab" id="All" href="#" role="tab" aria-selected="true">
                           Order LISTING
                           </a>
                        </li>
                     </ul>
                     <div class="table-responsive table-card mb-1">
                        <table class="table table-nowrap align-middle" id="jobListTable">
                           <thead class="text-muted table-light">
                              <tr class="text-uppercase">
                                 <th class="sort" data-sort="id" style="width: 140px;">ID</th>
                                 <th class="sort" >NAME</th>
                                 <th class="sort" >SKU</th>
                                 <th class="sort" >PRICE</th>
                                 <th class="sort" >QUANTITY</th>
                               
                                 <th class="sort" >TOTAL</th>
                                 <th class="sort" > ORDERED STATUS</th>
                              </tr>
                           </thead>
                           <tbody class="list form-check-all">
                              @foreach ($MutipleOrderProduct  as  $p)
                              <meta name="csrf-token" content="{{ csrf_token() }}">
                              <tr>
                                 <td class="id"><a href="#" class="fw-medium link-primary">{{ $p->id  ?? '/' }}</a></td>
                                 <td class="id"><a href="#" class="fw-medium link-primary">{{ $p->product->name ?? '/' }}</a></td>
                                 <td class="id"><a href="#" class="fw-medium link-primary">{{ $p->product->sku ?? '/' }}</a></td>
                                 <td class="id"><a href="#" class="fw-medium link-success">
                                       <h5 class="card-title mb-3 mb-md-0 flex-grow-1">{{ $p->price ?? '/' }}</h>
                                    </a>
                                </td>
                                 <td class="id">
                                  <a href="#" class="fw-medium link-primary">{{ $p->quantity }}</a>

                                </td>
                                 <td class="id">
                                  <a href="#" class="fw-medium link-primary">{{ $Order->total }}</a>

                                </td>
                                <td class="id">
                                 @if($Order->status == 1)
                                    <a href="#" class="fw-medium text-warning">Pending</a>
                                 @elseif($Order->status == 2)
                                    <a href="#" class="fw-medium text-success">Confirmed</a>
                                 @elseif($Order->status == 3)
                                    <a href="#" class="fw-medium text-danger">Cancelled</a>
                                 @else
                                    <a href="#" class="fw-medium text-muted">Unknown</a>
                                 @endif
                                 

                                </td>
                               
                                
                              </tr>
                              @endforeach
                            
                              @if ($MutipleOrderProduct->isEmpty())
                              <tr>
                                 <td colspan="6" class="text-center" style="color:red;">No records found.</td>
                              </tr>
                              @endif
                           </tbody>
                        </table>
                       
                     </div>
                     <div class="d-flex justify-content-end">
                        <div class="pagination-wrap hstack gap-2">
                           @if ($MutipleOrderProduct->onFirstPage())
                           <a class="page-item pagination-prev disabled" href="javascript:void(0);">
                           Previous
                           </a>
                           @else
                           <a class="page-item pagination-prev" href="{{ $MutipleOrderProduct->previousPageUrl() }}">
                           Previous
                           </a>
                           @endif
                           <ul class="pagination listjs-pagination mb-0">
                              @php
                              $start = max(1, $MutipleOrderProduct->currentPage() - 5);
                              $end = min($MutipleOrderProduct->lastPage(), $start + 9);
                              @endphp
                              @for ($i = $start; $i <= $end; $i++)
                              <li class="{{ $i == $MutipleOrderProduct->currentPage() ? 'active' : '' }}">
                                 <a class="page" href="{{ $MutipleOrderProduct->url($i) }}" data-i="{{ $i }}" data-page="{{ $MutipleOrderProduct->perPage() }}">{{ $i }}</a>
                              </li>
                              @endfor
                           </ul>
                           @if ($MutipleOrderProduct->hasMorePages())
                           <a class="page-item pagination-next" href="{{ $MutipleOrderProduct->nextPageUrl() }}">
                           Next
                           </a>
                           @else
                           <a class="page-item pagination-next disabled" href="javascript:void(0);">
                           Next
                           </a>
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--end col-->
      </div>
      <!--end row-->
   </div>
   <!-- container-fluid -->
</div>

@endsection
@section('js')
<style>
   .toast-success {
   background-color: #3498db;
   color: #fff;
   }
   .toast-close-button {
   color: #fff;
   }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endsection