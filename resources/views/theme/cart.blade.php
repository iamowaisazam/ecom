@extends('theme.layout')

@php
  //dd($product)
    
@endphp

@section('metatags')
    <title>Cart</title>
    <meta name="description" content="{{$global_d['blog_meta_description'] ?? ''}}">
    <meta name="keywords" content="{{$global_d['blog_keywords'] ?? ''}}">
@endsection
@section('css')
  
@endsection
@section('content')

<?php 
//dd($carts);
?>
<div id="page-content" class="template-collection">

    <div class="page section-header text-center">
        <div class="page-title">
            <div class="wrapper"><h1 class="page-title">Cart Item List </h1></div>
        </div>
    </div>

    <div class="my_cart_form container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-12 col-sm-12 col-md-12 col-lg-8 main-col">
                <form action="#" method="post" class="cart style2">
                    <table class="my_cart_form_table" >
                        <thead class="cart__row cart__header">
                            <tr>
                                <th colspan="2" class="text-center">Product</th>
                                <th class="d-none d-md-table-cell text-center">Price</th>
                                <th class="d-none d-md-table-cell text-center">Quantity</th>
                                <th class="d-none d-md-table-cell text-center">Total</th>
                                <th class="d-none d-md-table-cell action">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0; ?>
                    
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-start">
                                    <a href="{{URL::to('/shop')}}" 
                                      class="btn btn--link btn--small cart-continue">
                                      <i class="icon an an-chevron-circle-left"></i> 
                                       Continue Shopping</a>
                                </td>
                                <td colspan="3" class="text-end">
                                    <a href="{{URL::to('/cart/cart_clear')}}"  class="btn btn--link btn--small small--hide"><i class="icon an an-times"></i> Clear Shopping Cart</a>
                                </td>
                            </tr>
                        </tfoot>
                    </table> 
                </form>                   
            </div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-4 cart__footer">
                <div class="solid-border">	
                    <div class="row border-bottom pb-2 pt-2">
                        <span class="col-12 col-sm-6 cart__subtotal-title text-center text-sm-end">
                            <strong>Grand Total</strong>
                        </span>
                        <span class="text-center text-sm-start col-12 col-sm-6 cart__subtotal-title cart__subtotal ">
                            <span class="money grand_total_amount ">PKR 0</span>
                        </span>
                    </div>
                    <a href="{{URL::to('/checkout')}}" id="cartCheckout" class="btn btn--small-wide checkout">
                        Proceed To Checkout
                    </a>
                    <div class="paymnet-img">
                        <img src="{{asset('public/theme/assets/images/payment-img.jpg')}}"/>
                    </div>
                </div>
            </div>


            <div class="container mt-4">
                <div class="row">
                    <div class=" col-12 col-sm-12 col-md-6 col-lg-4 mb-4 cart-col">
                        
                    </div>
                    <div class=" col-12 col-sm-12 col-md-6 col-lg-4 mb-4 cart-col">
                      
                    </div>

                    
                </div>
            </div>
            <!-- End Main Content -->
        </div>
    </div>

  




</div>
@endsection
@section('js')



@endsection