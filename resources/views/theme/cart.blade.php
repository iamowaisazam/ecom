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
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
                <form action="#" method="post" class="cart style2">
                    <table class="my_cart_form_table" >
                        <thead class="cart__row cart__header">
                            <tr>
                                <th colspan="2" class="text-center">Product</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Total</th>
                                <th class="action">&nbsp;</th>
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
                                       Continue shopping</a>
                                </td>
                                <td colspan="3" class="text-end">
                                    <a href="{{URL::to('/cart/cart_clear')}}"  class="btn btn--link btn--small small--hide"><i class="icon an an-times"></i> Clear Shoping Cart</a>
                                   
                                    {{-- <button type="submit" name="update" class="btn btn--link btn--small cart-continue ml-2"><i class="icon an an-sync"></i> Update Cart</button> --}}
                                </td>
                            </tr>
                        </tfoot>
                    </table> 
                </form>                   
            </div>


            <div class="container mt-4">
                <div class="row">
                    <div class=" col-12 col-sm-12 col-md-6 col-lg-4 mb-4 cart-col">
                        
                    </div>
                    <div class=" col-12 col-sm-12 col-md-6 col-lg-4 mb-4 cart-col">
                      
                    </div>

                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 cart__footer">
                        <div class="solid-border">	
                            {{-- <div class="row border-bottom pb-2">
                                <span class="col-12 col-sm-6 cart__subtotal-title">Subtotal</span>
                                <span class="col-12 col-sm-6 text-right"><span class="money">$735.00</span></span>
                            </div>
                            <div class="row border-bottom pb-2 pt-2">
                                <span class="col-12 col-sm-6 cart__subtotal-title">Tax</span>
                                <span class="col-12 col-sm-6 text-right">$10.00</span>
                            </div>
                            <div class="row border-bottom pb-2 pt-2">
                                <span class="col-12 col-sm-6 cart__subtotal-title">Shipping</span>
                                <span class="col-12 col-sm-6 text-right">Free shipping</span>
                            </div> --}}
                            <div class="row border-bottom pb-2 pt-2">
                                <span class="col-12 col-sm-6 cart__subtotal-title">
                                    <strong>Grand Total</strong>
                                </span>
                                <span class="col-12 col-sm-6 cart__subtotal-title cart__subtotal text-right">
                                    <span class="money grand_total_amount ">PKR 0</span>
                                </span>
                            </div>
                            {{-- <div class="cart__shipping">Shipping &amp; taxes calculated at checkout</div> --}}
                            {{-- <div class="customCheckbox cart_tearm">
                                <input type="checkbox" value="allen-vela" id="1532947863384-0">
                                <label for="1532947863384-0">I agree with the terms and conditions</label>
                            </div> --}}
                            <a href="#" id="cartCheckout" class="btn btn--small-wide checkout">Proceed To Checkout</a>
                            <div class="paymnet-img"><img src="{{asset('theme/assets/images/payment-img.jpg')}}" alt="Payment" /></div>
                            {{-- <p class="mt-2"><a href="#">Checkout with Multiple Addresses</a></p> --}}
                        </div>
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