@extends('saleperson.layouts.app')
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
                     <li class="breadcrumb-item"><a href="javascript: void(0);">EPR</a></li>
                     <li class="breadcrumb-item active">Product</li>
                  </ol>
               </div>
            </div>
         </div>
      </div>
      <!-- end page title -->
      <div class="row mb-3">
         <div class="col-xl-12">
            <div class="row align-items-center gy-3 mb-3">
               <div class="col-sm">
                  <div>
                     <h5 class="fs-14 mb-0">Your Product ({{ $ProductItem ?? '0'}} items)</h5>
                  </div>
               </div>
               <div class="col-sm-auto">
                 
               </div>
            </div>
            @foreach($Product as $p)
            <!-- <input type="hidden" name="product_id" value="{{ $p->id}}"> -->
            <div class="card product">
               <div class="card-body">
                  <div class="row gy-3">
                     <div class="col-sm-auto">
                        <div class="avatar-lg bg-light rounded p-1">
                           <img src="assets/images/products/img-8.png" alt="" class="img-fluid d-block">
                        </div>
                     </div>
                     <div class="col-sm">
                        <h5 class="fs-14 text-truncate"><a href="ecommerce-product-detail.html" class="text-body">{{ $p->name ?? ''}}</a></h5>
                        <ul class="list-inline text-muted">
                           <li class="list-inline-item">SKU : <span class="fw-medium">{{ $p->sku ?? ''}}</span></li>
                           <li class="list-inline-item">Quantity : <span class="fw-medium">{{ $p->quantity ?? ''}}</span></li>
                        </ul>
                       
                     </div>
                     <div class="col-sm-auto">
                        <div class="text-lg-end">
                           <p class="text-muted mb-1">Product Price:</p>
                           <h5 class="fs-14">$<span id="ticket_price" class="product-price">{{ $p->price ?? ''}}.00</span></h5>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- card body -->
               <div class="card-footer">
                  <div class="row align-items-center gy-3">
                     <div class="col-sm">
                        <div class="d-flex flex-wrap my-n1">
                           <div>
                              <a href="#" class="d-block text-body p-1 px-2" data-bs-toggle="modal" data-bs-target="#removeItemModal"><i class="ri-delete-bin-fill text-muted align-bottom me-1"></i> </a>
                           </div>
                           <div>
                              <a href="#" class="d-block text-body p-1 px-2"><i class="ri-star-fill text-muted align-bottom me-1"></i> </a>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-auto">
                        <div class="d-flex align-items-center gap-2 text-muted">
                        <button type="button"
                                class="btn btn-success w-xs add-to-cart-btn"
                                data-product-id="{{ $p->id }}"
                                data-name="{{ $p->name }}"
                                data-price="{{ $p->price }}">
                            Add To Cart
                        </button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
         
           
         </div>
         <!-- end col -->
        
      </div>
      <!-- end row -->
   </div>
</div>
@endsection
@section('js')
<script src="{{ asset('backend/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function () {
    $('.add-to-cart-btn').on('click', function () {
        let productId = $(this).data('product-id');
        let price = $(this).data('price');
        let quantity = 1; 
        let userId = {{ auth('saleperson')->id() }}; 
        $.ajax({
            url: "{{ route('saleperson.cart.add-to-cart') }}",
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                product_id: productId,
                price: price,
                quantity: quantity,
                user_id: userId
            },
           success: function(response) {
         if (response.status) {
            Swal.fire({
                  icon: 'success',
                  title: 'Added to Cart',
                  text: response.message,
                  showConfirmButton: false,
                  timer: 1500
            }).then(() => {
                  // Redirect after success alert closes
                  window.location.href = "{{ route('saleperson.cart.checkout') }}";
            });
         } else {
            Swal.fire('Error', 'Something went wrong!', 'error');
         }
      },
            error: function() {
                Swal.fire('Error', 'Server error!', 'error');
            }
        });
    });
});
</script>

@endsection