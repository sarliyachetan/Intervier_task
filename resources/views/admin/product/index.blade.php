@extends('admin.layouts.app')
@section('title', 'Product')
@section('css')
@endsection
@section('content')
<div class="page-content">
   <div class="container-fluid">
      <!-- start page title -->
      <div class="row">
         <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
               <h4 class="mb-sm-0">Product</h4>
               <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                     <li class="breadcrumb-item"><a href="javascript: void(0);">ERP</a></li>
                     <li class="breadcrumb-item active">Product</li>
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
                     <h5 class="card-title mb-3 mb-md-0 flex-grow-1">Product</h5>
                     <div class="flex-shrink-0">
                        <div class="d-flex gap-1 flex-wrap">
                        
                           <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ViewProductModal"><i class="ri-add-line align-bottom me-1"></i> CREATE Product</button>
                        </div>
                     </div>
                  </div>
               </div>
             
               <div class="card-body pt-0">
                  <div>
                     <ul class="nav nav-tabs nav-tabs-custom nav-success mb-3" role="tablist">
                        <li class="nav-item">
                           <a class="nav-link active All py-3" data-bs-toggle="tab" id="All" href="#" role="tab" aria-selected="true">
                           Product LISTING
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
                               
                                 <th class="sort" >ACTION</th>
                              </tr>
                           </thead>
                           <tbody class="list form-check-all">
                              @foreach ($Product as $p)
                              <meta name="csrf-token" content="{{ csrf_token() }}">
                              <tr>
                                 <td class="id"><a href="#" class="fw-medium link-primary">{{ $p->id  ?? '/' }}</a></td>
                                 <td class="id"><a href="#" class="fw-medium link-primary">{{ $p->name ?? '/' }}</a></td>
                                 <td class="id"><a href="#" class="fw-medium link-primary">{{ $p->sku ?? '/' }}</a></td>
                                 <td class="id"><a href="#" class="fw-medium link-success">
                                       <h5 class="card-title mb-3 mb-md-0 flex-grow-1">{{ $p->price ?? '/' }}</h>
                                    </a>
                                </td>
                                 <td class="id">
                                    <a href="#" class="fw-medium 
                                        {{ $p->quantity <= 10 ? 'text-danger' : 'link-primary' }}">
                                        {{ $p->quantity ?? '/' }}
                                    </a>

                                    @if($p->quantity <= 10)
                                        <div class="text-danger small">Low Quantity</div>
                                    @endif
                                </td>
                               
                                 <td>
                                    <ul class="list-inline hstack gap-2 mb-0">
                                       <li class="list-inline-item" data-bs-toggle="modal" data-bs-target="" data-id="{{ $p->id }}"  data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="View">
                                          <a href="#" class="text-primary d-inline-block view-item-btn" data-id="{{ $p->id }}">
                                          <i class="ri-eye-fill fs-16"></i>
                                          </a>
                                       </li>
                                       <li class="list-inline-item"  title="Remove">
                                          <a class="text-danger d-inline-block remove-item-btn delete"  data-id="{{ $p->id }}" href="#deleteOrder">
                                          <i class="ri-delete-bin-5-fill fs-16"></i>
                                          </a>
                                       </li>
                                    </ul>
                                 </td>
                              </tr>
                              @endforeach
                              @if ($Product->isEmpty())
                              <tr>
                                 <td colspan="6" class="text-center" style="color:red;">No records found.</td>
                              </tr>
                              @endif
                           </tbody>
                        </table>
                       
                     </div>
                     <div class="d-flex justify-content-end">
                        <div class="pagination-wrap hstack gap-2">
                           @if ($Product->onFirstPage())
                           <a class="page-item pagination-prev disabled" href="javascript:void(0);">
                           Previous
                           </a>
                           @else
                           <a class="page-item pagination-prev" href="{{ $Product->previousPageUrl() }}">
                           Previous
                           </a>
                           @endif
                           <ul class="pagination listjs-pagination mb-0">
                              @php
                              $start = max(1, $Product->currentPage() - 5);
                              $end = min($Product->lastPage(), $start + 9);
                              @endphp
                              @for ($i = $start; $i <= $end; $i++)
                              <li class="{{ $i == $Product->currentPage() ? 'active' : '' }}">
                                 <a class="page" href="{{ $Product->url($i) }}" data-i="{{ $i }}" data-page="{{ $Product->perPage() }}">{{ $i }}</a>
                              </li>
                              @endfor
                           </ul>
                           @if ($Product->hasMorePages())
                           <a class="page-item pagination-next" href="{{ $Product->nextPageUrl() }}">
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
{{-- Create Modal --}}
<div class="modal fade" id="ViewProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content border-0">
         <form id="postform"   method="POST" autocomplete="off" class="needs-validation"  enctype="multipart/form-data" novalidate>
            @csrf
            <div class="modal-body">
               <input type="hidden" id="id-field" />
               <div class="row g-3">
                  <div class="col-lg-12">
                     <div class="px-1 pt-1">
                        <div class="modal-team-cover position-relative mb-0 mt-n4 mx-n4 rounded-top overflow-hidden">
                           <img src="{{ asset('backend/images/small/img-9.jpg') }}" alt="" id="modal-cover-img" class="img-fluid">
                           <div class="d-flex position-absolute start-0 end-0 top-0 p-3">
                              <div class="flex-grow-1">
                                 <h5 class="modal-title text-white" id="exampleModalLabel">CREATE PRODUCT</h5>
                              </div>
                              <div class="flex-shrink-0">
                                 <div class="d-flex gap-3 align-items-center">
                                    <button type="button" class="btn-close btn-close-white"  id="close-jobListModal" data-bs-dismiss="modal" aria-label="Close"></button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="text-center mb-4 mt-n5 pt-2">
                        <div class="position-relative d-inline-block">
                           <div class="avatar-lg p-1">
                              <div class="avatar-title bg-light rounded-circle">
                                 <img src="{{ asset('backend/images/users/multi-user.jpg')}}" id="companylogo-img" class="avatar-md rounded-circle object-fit-cover" />
                              </div>
                           </div>
                        </div>
                       
                     </div>
                     
                  </div>
                  <div class="col-lg-12">
                     <div>
                        <label for="user_name" class="form-label"> Name</label>
                        <input type="text" id="name" class="form-control" name="name" placeholder="Enter name"/>
                     </div>
                     
                  </div>
                  <div class="col-lg-12">
                     
                     <div>
                        <label for="user_name" class="form-label">SKU</label>
                        <input type="TEXT" id="sku" class="form-control" name="sku" placeholder="Enter  sku"/>
                     </div>
                  </div>
                   <div class="col-lg-6">
                     
                     <div>
                        <label for="user_name" class="form-label">PRICE</label>
                        <input type="TEXT" id="price" class="form-control" name="price" placeholder="Enter  price"/>
                     </div>
                  </div>
                    <div class="col-lg-6">
                     
                     <div>
                        <label for="user_name" class="form-label">QUNANITY</label>
                        <input type="TEXT" id="quantity" class="form-control" name="quantity" placeholder="Enter  quantity"/>
                     </div>
                  </div>
                
                 
                
                 
             
                 
               </div>
            </div>
            <div class="modal-footer">
               <div class="hstack gap-2 justify-content-end">
                  <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success" id="add-btn">Submit</button>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
{{-- Update Modal --}}
<div class="modal fade" id="UpdatePost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content border-0">
         <form id="postUpdateform"   method="POST" autocomplete="off" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            <meta name="csrf-token" content="{{ csrf_token() }}">
            
            <div class="modal-body">
            <input type="hidden" id="product-id" />
            <!-- <input type="hidden" id="update-id-field" name="update_id" /> -->
               <div class="row g-3">
                  <div class="col-lg-12">
                     <div class="px-1 pt-1">
                        <div class="modal-team-cover position-relative mb-0 mt-n4 mx-n4 rounded-top overflow-hidden">
                           <img src="{{ asset('backend/images/small/img-9.jpg') }}" alt="" id="modal-cover-img" class="img-fluid">
                           <div class="d-flex position-absolute start-0 end-0 top-0 p-3">
                              <div class="flex-grow-1">
                                 <h5 class="modal-title text-white" id="exampleModalLabel">EDIT Product</h5>
                              </div>
                              <div class="flex-shrink-0">
                                 <div class="d-flex gap-3 align-items-center">
                                    <button type="button" class="btn-close btn-close-white"  id="close-jobListModal" data-bs-dismiss="modal" aria-label="Close"></button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="text-center mb-4 mt-n5 pt-2">
                        <div class="position-relative d-inline-block">
                           <div class="avatar-lg p-1">
                              <div class="avatar-title bg-light rounded-circle">
                                 <img src="{{ asset('backend/images/users/multi-user.jpg')}}" id="companylogo-img" class="avatar-md rounded-circle object-fit-cover" />
                              </div>
                           </div>
                        </div>
                        {{-- 
                        <h5 class="fs-13 mt-3">Company Logo</h5>
                        --}}
                     </div>
                     
                  </div>
                  <div class="col-lg-12">
                     <div>
                        <label for="user_name" class="form-label"> NAME</label>
                        <input type="text" id="update_name" class="form-control" name="name" placeholder="Enter  Title"/>
                     </div>
                     
                  </div>
                 <div class="col-lg-12">
                     
                     <div>
                        <label for="user_name" class="form-label">SKU</label>
                        <input type="TEXT" id="update_sku" class="form-control" name="sku" placeholder="Enter  sku"/>
                     </div>
                  </div>
                   <div class="col-lg-6">
                     
                     <div>
                        <label for="user_name" class="form-label">PRICE</label>
                        <input type="TEXT" id="update_price" class="form-control" name="price" placeholder="Enter  price"/>
                     </div>
                  </div>
                    <div class="col-lg-6">
                     
                     <div>
                        <label for="user_name" class="form-label">QUNANITY</label>
                        <input type="TEXT" id="update_quantity" class="form-control" name="quantity" placeholder="Enter  quantity"/>
                     </div>
                  </div>
               
                  
                 
               </div>
            </div>
            <div class="modal-footer">
               <div class="hstack gap-2 justify-content-end">
                  <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success" id="add-btn">Update</button>
               </div>
            </div>
         </form>
      </div>
   </div>
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

<script>
   $.ajaxSetup({
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
   });


   $(document).on('click', '.delete', function(e) {
     let id = $(this).attr('data-id');
     Swal.fire({
         title: 'Are you sure?',
         text: "It Will Permanently Deleted!",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Yes, delete it!'
     }).then((result) => {
         if (result.isConfirmed) {
             $.ajax({
                 type: "delete",
                 url: "{{ route('admin.product.delete', ['_id']) }}".replace('_id', id),
                 dataType: "json",
                 success: function(response) {
                  toastr.success(response.message, 'Success');
                  setTimeout(function(){
                      window.location.href = "{{ route('admin.product.index') }}";
                  }, 3000);
              },
             });
         }
     })
   });
 
   $('#postform').submit(function(event) {
    event.preventDefault();
    var name = $('#name').val();
    if (!name) {
        toastr.error('Please enter your name.', 'Error');
        return;
    }
   
    var sku = $('#sku').val();
    if (!sku) {
        toastr.error('Please enter your sku.', 'Error');
        return;
    }
    var price = $('#price').val().trim();
    if (!price) {
        toastr.error('Please enter your price.', 'Error');
        return;
    }
    if (!/^\d+(\.\d{1,2})?$/.test(price)) {
        toastr.error('Please enter a valid number (e.g., 123 or 123.45).', 'Error');
        return;
    }
      var quantity = $('#quantity').val().trim();
    if (!quantity) {
        toastr.error('Please enter your price.', 'Error');
        return;
    }
    if (!/^\d+(\.\d{1,2})?$/.test(quantity)) {
        toastr.error('Please enter a valid number (e.g., 123 or 123.45).', 'Error');
        return;
    }
    
   
   
    var formAction = "{{ route('admin.product.store') }}"; 
    $(this).attr('action', formAction);
   
    $.ajax({
        type: $(this).attr('method'),
        url: formAction, 
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function(response) {
            toastr.success(response.message, 'Success');
            setTimeout(function() {
                window.location.href = "{{ route('admin.product.index') }}";
            }, 3000);
        },
        error: function(error) {
            toastr.error('Something went wrong. Please try again later.', 'Error');
        }
    });
   });
   
    
</script>
<script>
$('#postUpdateform').submit(function (e) {
    e.preventDefault();
    var name = $('#update_name').val();
    if (!name) {
        toastr.error('Please enter your name.', 'Error');
        return;
    }
   
    var sku = $('#update_sku').val();
    if (!sku) {
        toastr.error('Please enter your sku.', 'Error');
        return;
    }
    var price = $('#update_price').val().trim();
    if (!price) {
        toastr.error('Please enter your price.', 'Error');
        return;
    }
    if (!/^\d+(\.\d{1,2})?$/.test(price)) {
        toastr.error('Please enter a valid number (e.g., 123 or 123.45).', 'Error');
        return;
    }
      var quantity = $('#update_quantity').val().trim();
    if (!quantity) {
        toastr.error('Please enter your price.', 'Error');
        return;
    }
    if (!/^\d+(\.\d{1,2})?$/.test(quantity)) {
        toastr.error('Please enter a valid number (e.g., 123 or 123.45).', 'Error');
        return;
    }
    
    var contactId = $('#product-id').val();
    var url = "{{ route('admin.product.update', ':id') }}".replace(':id', contactId);
    var formData = new FormData(this); 
    $.ajax({
        url: url,
        type: 'POST',  
        data: formData,
        processData: false, 
        contentType: false, 
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'X-HTTP-Method-Override': 'PUT' 
        },
        success: function (response) {
            if (response.status) { 
                toastr.success(response.message, 'Success');
                setTimeout(function(){
                    location.reload();
                }, 2000);
            }
        },
        error: function (error) {
            console.log("Error:", error);
            toastr.error("Something went wrong!", "Error");
        }
    });
});
$(document).on('click', '.view-item-btn', function () {
    var contactId = $(this).data('id'); 
    var url = "{{ route('admin.product.edit', ':id') }}".replace(':id', contactId); 

    $.ajax({
        url: url,
        type: 'GET',
        success: function (response) {
            if (response.status) {
                $('#product-id').val(response.message.id);
                $('#update_name').val(response.message.name);
                $('#update_sku').val(response.message.sku);
                $('#update_price').val(response.message.price);
                $('#update_quantity').val(response.message.quantity);
                $('#UpdatePost').modal('show');
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        }
    });
});

</script>



@endsection