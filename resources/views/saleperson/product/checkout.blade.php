@extends('saleperson.layouts.app')
@section('title', 'Checkout')
@section('css')
@endsection
@section('content')
<div class="page-content">
   <div class="container-fluid">
      <!-- start page title -->
      <div class="row">
         <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
               <h4 class="mb-sm-0">Shopping Cart</h4>
               <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                     <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                     <li class="breadcrumb-item active">Shopping Cart</li>
                  </ol>
               </div>
            </div>
         </div>
      </div>
      <!-- end page title -->
      <div class="row mb-3">
         <div class="col-xl-8">
            <div class="row align-items-center gy-3 mb-3">
               <div class="col-sm">
                  <div>
                     <h5 class="fs-14 mb-0">Your Cart ({{ $CartTotal ?? '0'}} items)</h5>
                  </div>
               </div>
               <div class="col-sm-auto">
               </div>
            </div>
            @php
            $subTotal = 0;
            @endphp
            @if(count($Cart) > 0)
            @foreach($Cart as $c)
            <div class="card product">
               <div class="card-body">
                  <div class="row gy-3">
                     <div class="col-sm-auto">
                        <div class="avatar-lg bg-light rounded p-1">
                           <img src="assets/images/products/img-8.png" alt="" class="img-fluid d-block">
                        </div>
                     </div>
                     <div class="col-sm">
                        <h5 class="fs-14 text-truncate"><a href="ecommerce-product-detail.html" class="text-body">{{ $c->product->name }}</a></h5>
                        <ul class="list-inline text-muted">
                           <li class="list-inline-item">SKU : <span class="fw-medium">{{ $c->product->sku }}</span></li>
                        </ul>
                        <div class="input-step">
                           <button type="button" class="minus material-shadow" data-cart-id="{{ $c->id }}">–</button>
                           <input type="number" class="product-quantity" value="{{ $c->quantity }}" min="1" max="100" data-cart-id="{{ $c->id }}">
                           <button type="button" class="plus material-shadow" data-cart-id="{{ $c->id }}">+</button>
                        </div>
                     </div>
                     <div class="col-sm-auto">
                        <div class="text-lg-end">
                           <p class="text-muted mb-1">Item Price:</p>
                           <h5 class="fs-14">$<span id="ticket_price" class="product-price">{{ $c->price}}</span></h5>
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
                              <a href="javascript:void(0);" class="d-block text-body p-1 px-2 remove-item-btn" data-cart-id="{{ $c->id }}">
                              <i class="ri-delete-bin-fill text-muted align-bottom me-1"></i> Remove
                              </a>
                           </div>
                           <div>
                           </div>
                        </div>
                     </div>
                     @php
                     $lineTotal = $c->quantity * $c->price;
                     @endphp
                     <div class="col-sm-auto">
                        <div class="d-flex align-items-center gap-2 text-muted">
                           <div>Total :</div>
                           <h5 class="fs-14 mb-0">$<span class="product-line-price">{{ number_format($lineTotal, 2) }}</span></h5>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- end card footer -->
            </div>
            @php
            $lineTotal = $c->quantity * $c->price;
            $subTotal += $lineTotal;
            @endphp
            @endforeach
            @else
            <p class="text-muted">Your cart is empty.</p>
            @endif
        
            <!--  -->
               <form id="orderForm" method="POST" action="{{ route('saleperson.order.order-now') }}">
               @csrf
               <!-- Your existing cart HTML (the code you pasted above) goes here -->
               <input type="hidden" name="total" value="{{ $subTotal }}">
               <div class="text-end mb-4">
                  <button type="submit" class="btn btn-success btn-label right ms-auto" id="orderNowBtn">
                  <i class="ri-arrow-right-line label-icon align-bottom fs-16 ms-2"></i>
                  Order Now
                  </button>
               </div>
            </form>
            <!--  -->
         </div>
         <!-- end col -->
         <div class="col-xl-4">
            <div class="sticky-side-div">
               <div class="card">
                  <div class="card-header border-bottom-dashed">
                     <h5 class="card-title mb-0">Order Summary</h5>
                  </div>
                  <div class="card-body pt-2">
                     <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                           <tbody>
                              <tr>
                                 <td>Sub Total :</td>
                                 <td class="text-end" id="cart-subtotal">$ {{ number_format($subTotal, 2) }}</td>
                              </tr>
                              <tr class="table-active">
                                 <th>Total (USD) :</th>
                                 <td class="text-end">
                                    <span class="fw-semibold" id="cart-total">
                                    ${{ number_format($subTotal, 2) }}
                                    </span>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                     <!-- end table-responsive -->
                  </div>
               </div>
            </div>
            <!-- end stickey -->
         </div>
      </div>
      <!-- end row -->
   </div>
</div>
@endsection
@section('js')
<script src="{{ asset('backend/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Toastr CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
   $(document).on('change', '.product-quantity', function () {
       let quantity = $(this).val();
       let cartId = $(this).closest('.card.product').find('.cart-id').val();
   
       $.ajax({
           url: "{{ route('saleperson.cart.cart-update') }}",
           method: 'POST',
           data: {
               _token: '{{ csrf_token() }}',
               cart_id: cartId,
               quantity: quantity
           },
           success: function (response) {
               if (response.status) {
                   toastr.success(response.message);
               } else {
                   toastr.error('Something went wrong.');
               }
           },
           error: function () {
               toastr.error('Update failed. Try again.');
           }
       });
   });
</script>
<script>
   $(document).ready(function () {
   function updateQuantity(cartId, newQuantity) {
       $.ajax({
           url: "{{ route('saleperson.cart.cart-update') }}", 
           method: "POST",
           data: {
               _token: "{{ csrf_token() }}",
               cart_id: cartId,
               quantity: newQuantity
           },
           success: function (response) {
               if (response.status) {
                   toastr.success(response.message);
                   location.reload(); 
               } else {
                   toastr.error("Failed to update quantity.");
               }
           },
           error: function (xhr) {
               toastr.error("Something went wrong!");
           }
       });
   }
   
   $(".plus").click(function () {
       const input = $(this).siblings(".product-quantity");
       let quantity = parseInt(input.val());
       let cartId = $(this).data("cart-id");
       if (quantity < 100) {
           quantity += 1;
           input.val(quantity);
           updateQuantity(cartId, quantity);
       }
   });
   
   $(".minus").click(function () {
       const input = $(this).siblings(".product-quantity");
       let quantity = parseInt(input.val());
       let cartId = $(this).data("cart-id");
       if (quantity > 1) {
           quantity -= 1;
           input.val(quantity);
           updateQuantity(cartId, quantity);
       }
   });
   });
</script>
<script>
   $(document).ready(function () {
       $(".remove-item-btn").click(function () {
           let cartId = $(this).data("cart-id");
   
           if (confirm("Are you sure you want to remove this item?")) {
               $.ajax({
                   url: "{{ route('saleperson.cart.cart-remove') }}", 
                   method: "POST",
                   data: {
                       _token: "{{ csrf_token() }}",
                       cart_id: cartId
                   },
                   success: function (response) {
                       if (response.status) {
                           toastr.success(response.message);
                           location.reload(); 
                       } else {
                           toastr.error("Failed to remove item.");
                       }
                   },
                   error: function () {
                       toastr.error("An error occurred while removing the item.");
                   }
               });
           }
       });
   });
</script>
<script>
document.getElementById('orderForm').addEventListener('submit', function(e) {
    e.preventDefault();

    let form = this;
    let formData = new FormData(form);

    fetch(form.action, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': formData.get('_token')
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if(data.success){
            toastr.success('Order placed successfully!');
            setTimeout(() => {
                window.location.href = "{{ route('saleperson.order.single-order') }}";
            }, 1500);
        } else {
            toastr.error(data.message || 'Order failed.');
        }
    })
    .catch(error => {
        console.error(error);
        toastr.error('Something went wrong.');
    });
});
</script>

@endsection