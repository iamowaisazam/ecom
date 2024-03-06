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

    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
                <form action="#" method="post" class="cart style2">
                    <table>
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
                          @foreach ($carts as $item)
                          <?php $subtotal = $item['price'] * $item['quantity'];  ?>
                            <tr class="cart__row border-bottom line1 cart-flex border-top">
                                <td class="cart__image-wrapper cart-flex-item">
                                    <a href="{{URL::to('/products')}}">
                                        <img class="cart__image blur-up lazyload" 
                                          data-src="{{asset($item['image'])}}" />
                                    </a>
                                </td>
                                <td class="cart__meta small--text-left cart-flex-item">
                                    <div class="list-view-item__title">
                                        <a href="{{URL::to('/products')}}/{{$item['slug']}}">{{$item['title']}} - {{$item['sku']}}</a>
                                    </div>
                                    <div class="cart__meta-text">
                                        @foreach ($item['attributes'] as $att)
                                        {{$att['attribute_title']}}: {{$att['values_title']}}<br>    
                                        @endforeach
                                      
                                    </div>
                                </td>
                                <td class="cart__price-wrapper cart-flex-item text-center">
                                    <span class="money">${{$item['price']}}</span>
                                </td>
                                <td class="cart__update-wrapper cart-flex-item text-center">
                                    <div class="cart__qty text-center">
                                        <div class="qtyField">
                                            <a class="qtyBtn minus" href="javascript:void(0);">
                                                <i class="icon an an-minus"></i>
                                            </a>

                                            <input class="cart__qty-input qty" type="text" name="updates[]" value="{{$item['quantity']}}" pattern="[0-9]*" />
                                            
                                            <a class="qtyBtn plus" href="javascript:void(0);">
                                                <i class="icon an an-plus"></i></a>
                                        </div>
                                    </div>
                                </td>
                                <td class="small--hide cart-price text-center">
                                    <span class="money">${{number_format($subtotal,2)}}</span>
                                </td>
                                <td class="text-center small--hide">
                                    <a href="#" 
                                      class="btn btn--secondary cart__remove" 
                                      data-bs-toggle="tooltip" 
                                      data-bs-placement="top" 
                                       title="Remove item">
                                    <i class="icon an an-times"></i></a>
                                </td>
                            </tr>
                            <?php $total += $subtotal;  ?>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-start">
                                    <a href="{{URL::to('/')}}" 
                                      class="btn btn--link btn--small cart-continue">
                                      <i class="icon an an-chevron-circle-left"></i> 
                                       Continue shopping</a>
                                </td>
                                <td colspan="3" class="text-end">
                                    {{-- <button type="submit" name="clear" class="btn btn--link btn--small small--hide"><i class="icon an an-times"></i> Clear Shoping Cart</button> --}}
                                    <button type="submit" name="update" class="btn btn--link btn--small cart-continue ml-2"><i class="icon an an-sync"></i> Update Cart</button>
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
                            <div class="row border-bottom pb-2">
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
                            </div>
                            <div class="row border-bottom pb-2 pt-2">
                                <span class="col-12 col-sm-6 cart__subtotal-title"><strong>Grand Total</strong></span>
                                <span class="col-12 col-sm-6 cart__subtotal-title cart__subtotal text-right"><span class="money">$1001.00</span></span>
                            </div>
                            <div class="cart__shipping">Shipping &amp; taxes calculated at checkout</div>
                            <div class="customCheckbox cart_tearm">
                                <input type="checkbox" value="allen-vela" id="1532947863384-0">
                                <label for="1532947863384-0">I agree with the terms and conditions</label>
                            </div>
                            <a href="checkout.html" id="cartCheckout" class="btn btn--small-wide checkout">Proceed To Checkout</a>
                            <div class="paymnet-img"><img src="{{asset('theme/assets/images/payment-img.jpg')}}" alt="Payment" /></div>
                            <p class="mt-2"><a href="#">Checkout with Multiple Addresses</a></p>
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