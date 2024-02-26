@extends('theme.layout')

@php

@endphp

@section('metatags')
    <title>{{$product->title}}</title>
    <meta name="description" content="{{$global_d['blog_meta_description'] ?? ''}}">
    <meta name="keywords" content="{{$global_d['blog_keywords'] ?? ''}}">
@endsection
@section('css')
  
@endsection
@section('content')
<div id="page-content" class="template-product">

   <!-- Bredcrumbs -->
   <div class="bredcrumbWrap bredcrumb-style2">
      <div class="container breadcrumbs">
          <a href="{{URL::to('/')}}" title="Back to the home page">Home</a>
          <span aria-hidden="true">|</span>
          <a href="{{URL::to('/shop')}}" title="Back to the home page">Shop</a>
          <span aria-hidden="true">|</span>
          <span class="title-bold">{{$product->title}}</span>
      </div>
   </div>
  <!-- End Bredcrumbs -->

  <div class="container">

  

  <div id="ProductSection-product-template" class="product-template__container prstyle2">
   
    <!-- #ProductSection product template -->
    <div class="product-single product-single-1">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="product-details-img product-single__photos bottom">
                  
                  <!-- Product Images -->
                    <div class="zoompro-wrap product-zoom-right pl-20">
                        <div class="zoompro-span">
                            <img class="blur-up lazyload zoompro" 
                            data-zoom-image="{{asset($product->get_thumbnail()->path)}}" 
                            alt="" 
                            src="{{asset($product->get_thumbnail()->path)}}" />               
                        </div>
                        <div class="product-labels"><span class="lbl pr-label1">new</span><span class="lbl on-sale">Exclusive</span></div>
                        <div class="product-buttons">
                            <a href="https://www.youtube.com/watch?v=93A2jOW5Mog" class="btn popup-video" data-bs-toggle="tooltip" data-bs-placement="left" title="Watch Video"><i class="icon an an-play" aria-hidden="true"></i></a>
                            <a href="#" class="btn prlightbox" data-bs-toggle="tooltip" data-bs-placement="left" title="Zoom Image"><i class="icon an an-expand-arrows-alt" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="product-thumb product-thumb-1">
                        <div id="gallery" class="product-dec-slider-1 product-tab-left">
                       

                          @foreach ($product->get_gallery() as $img) 
                            <a data-image="{{asset($img->path)}}" 
                            data-zoom-image="{{asset($img->path)}}" class="slick-slide slick-cloned active" data-slick-index="-4" aria-hidden="true" tabindex="-1">
                                <img class="blur-up lazyload" src="{{asset($img->path)}}"/>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="lightboximages">
                        @foreach ($product->get_gallery() as $img) 
                        <a href="{{asset($img->path)}}" data-size="1462x2048"></a>
                        @endforeach
                    </div>
                    <!-- End Product Images -->


                    <!-- Wishlist - Share -->
                    <div class="display-table shareRow pt-3 pb-0 d-table">
                        <div class="display-table-cell text-center align-top">
                            <div class="social-sharing">
                                <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-facebook" data-bs-toggle="tooltip" data-bs-placement="top" title="Share on Facebook">
                                    <i class="icon an an-facebook" aria-hidden="true"></i><span class="share-title" aria-hidden="true">Facebook</span>
                                </a>
                                <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-twitter" data-bs-toggle="tooltip" data-bs-placement="top" title="Tweet on Twitter">
                                    <i class="icon an an-twitter" aria-hidden="true"></i><span class="share-title" aria-hidden="true">Tweet</span>
                                </a>
                                <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-google" data-bs-toggle="tooltip" data-bs-placement="top" title="Share on google+">
                                    <i class="icon an an-google-plus" aria-hidden="true"></i><span class="share-title" aria-hidden="true">Google+</span>
                                </a>
                                <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-pinterest" data-bs-toggle="tooltip" data-bs-placement="top" title="Pin on Pinterest">
                                    <i class="icon an an-pinterest-p" aria-hidden="true"></i><span class="share-title" aria-hidden="true">Pin it</span>
                                </a>
                                <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-email" data-bs-toggle="tooltip" data-bs-placement="top" title="Share by Email">
                                    <i class="icon an an-envelope" aria-hidden="true"></i><span class="share-title" aria-hidden="true">Email</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Wishlist - Share -->
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <!-- Product Info -->
                <div class="product-single__meta">
                    <h1 class="product-single__title">{{$product->title}}</h1>
                    
                    <!-- Product Reviews -->
                    <div class="prInfoRow d-flex flex-wrap">
                        <div class="product-review">
                            <a class="reviewLink d-flex flex-wrap align-items-center" href="#tab2">
                                <i class="an an-star"></i><i class="an an-star"></i><i class="an an-star"></i><i class="an an-star"></i><i class="an an-star-half-alt"></i>
                                <span class="spr-badge-caption">6 reviews</span>
                            </a>
                        </div>
                    </div>
                    <!-- End Product Reviews -->

                    <!-- Product Price -->
                    <div class="product-single__price product-single__price-product-template">
                        <span class="product-price__price 
                        product-price__price-product-template product-price__sale product-price__sale--single">
                            <span id="ProductPrice-product-template">
                              <span class="money"><span class="r-price" >{{$product->price}}</span></span>
                            </span>
                        </span>
                    </div>
                    <!-- End Product Price -->

                    <!-- Product Description -->
                    <div class="product-single__description rte">
                        <p class="mb-2">{{$product->short_des}}</p>
                    </div>
                    <!-- End Product Description -->

                    <!-- Product Intro -->
                    <div class="product-info">
                      <p class="product-stock">Availability: 
                        <span class="instock">In Stock</span>
                        <span class="outstock hide">Unavailable</span>
                      </p> 
                      <p class="product-sku">SKU: 
                        <span class="variant-sku">.</span>
                      </p>
                    </div>
                   <!-- End Product Intro -->
          
                    <!-- Form -->
                    <form method="post" 
                     action="{{URL::to('/cart/add_to_cart')}}" 
                     id="product_form_10508262282" 
                     accept-charset="UTF-8" 
                     class="product-form product-form-product-template product-form-border hidedropdown" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="product_id" value="{{Crypt::encryptString($product->id)}}" />
                        <input type="hidden" name="sku" />
                        <input type="hidden" name="price" />

                          @foreach ($attributes as $key => $attribute)
                          <?php 
                            $rowKey = 0;
                           ?>
                            <div class="swatch clearfix swatch-1 option2 w-100" data-option-index="1">
                              <div class="product-form__item" data-attribute-id="{{$attribute->id}}">
                                  <label>{{$attribute->title}}: 
                                    {{-- <span class="slVariant">{{$attribute->title}}</span> --}}
                                  </label>
                                  @foreach ($attribute_values as $values)
                                  @if($values->product_attribute_id == $attribute->id)
                                
                                    <div data-value="{{$values->id}}" 
                                         class="swatch-element {{$values->title}} available">
                                         
                                         <input 
                                           class="variation_change swatchInput"
                                           @if($rowKey == 0) checked @endif 
                                           id="variation_id-{{$values->id}}" 
                                           type="radio" 
                                           name="attr[{{$attribute->id}}]" 
                                           value="{{$values->id}}" />
                                            
                                         <label class="swatchLbl medium" 
                                            for="variation_id-{{$values->id}}" 
                                            data-bs-toggle="tooltip" 
                                            data-bs-placement="top" 
                                            title="{{$values->title}}">{{$values->title}}</label>
                                    
                                    </div>
                                    <?php 
                                      $rowKey += 1;
                                    ?>
                                    @endif
                                  @endforeach
                              </div>
                          </div>    
                          @endforeach
                                              
                        <!-- Product Action -->
                        <div class="product-action clearfix">
                            <div class="product-form__item--quantity">
                                <div class="wrapQtyBtn">
                                    <div class="qtyField">
                                        <a class="qtyBtn minus" href="javascript:void(0);"><i class="icon an an-minus" aria-hidden="true"></i></a>
                                        <input type="text" name="quantity" value="1" class="variation_change product-form__input qty" />
                                        <a class="qtyBtn plus" href="javascript:void(0);"><i class="icon an an-plus" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>                                
                            <div class="product-form__item--submit">
                                <button 
                                  name="cart-type"
                                  type="submit" 
                                  value="cart"
                                  class="btn product-form__cart-submit">
                                  <span>Add to cart</span></button>
                            </div>
                            <div class="payment-button" data-shopify="payment-button">
                                <button name="cart-type" value="buy" type="submit" class="payment-button__button payment-button__button--unbranded">Buy it now</button>
                            </div>
                        </div>
                        <!-- End Product Action -->

                        <!-- Wishlist - Compare -->
                        <div class="infolinks d-flex flex-wrap align-items-center px-0 mb-0">
                            <a class="wishlist add-to-wishlist d-flex align-items-center" href="wishlist.html"><i class="icon an an-heart me-1"></i> <span>Add to Wishlist</span></a>
                            <a class="wishlist emaillink d-flex align-items-center" href="#productInquiry"><i class="icon an an-envelope me-1" style="margin-top:-1px;"></i> <span>Enquiry</span></a>
                        </div>

                    </form>
                    <!-- End Form -->


                    <!-- Product Feature -->
                    <div class="safecheckout row my-3">
                        <div class="item col-lg-3 mb-1 mb-sm-0">
                            <div class="icon"><i class="icon an an-truck"></i></div>
                            <div class="content">Free & fast shipping</div>
                        </div>
                        <div class="item col-lg-3 mb-1 mb-sm-0">
                            <div class="icon"><i class="icon an an-certificate"></i></div>
                            <div class="content">Secure checkout</div>
                        </div>
                        <div class="item col-lg-3">
                            <div class="icon"><i class="icon an an-thumbs-up"></i></div>
                            <div class="content">Satisfaction guarantee</div>
                        </div>
                        <div class="item col-lg-3">
                            <div class="icon"><i class="icon an an-lock"></i></div>
                            <div class="content">Privacy protected</div>
                        </div>
                    </div>
                    <!-- End Product Feature -->

                </div>
            </div>
        </div>
        <!-- End Product single -->



        <!-- Product Tabs -->
        <div class="tabs-listing tab-details mt-0 mt-md-4">
           
          <!-- Tabs -->
            <ul class="product-tabs d-none d-md-block">
                <li class="active" rel="tab1"><a class="tablink">Product Details</a></li>
                <li rel="tab2"><a class="tablink">Product Reviews</a></li>
                <li rel="tab3"><a class="tablink">Size Chart</a></li>
                <li rel="tab4"><a class="tablink">Shipping &amp; Returns</a></li>
            </ul>
            <!-- End Tabs -->
          
          
            <!-- Tabs Container -->
            <div class="tab-container pb-0 mb-0">
                <!-- Tabs Content One -->
                <h3 class="acor-ttl active d-block d-md-none" rel="tab1">Product Details</h3>
                <div id="tab1" class="tab-content py-3 py-md-0" style="display:block;">
                    <div class="product-description rte">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                        <ul class="checkmark my-0">
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
                            <li>Sed ut perspiciatis unde omnis iste natus error sit</li>
                            <li>Neque porro quisquam est qui dolorem ipsum quia dolor</li>
                            <li>Lorem Ipsum is not simply random text.</li>
                            <li>Morbi malesuada lacus sed metus luctus pulvinar quis at odio.</li>
                        </ul>
                        <h3>Sed ut perspiciatis unde omnis iste natus error sit voluptatem</h3>
                        <p>Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
                        <div class="rte__table-wrapper">
                            <div class="table-responsive">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td><strong>Shoulder (cm):</strong></td>
                                            <td>XS: 35.5 cm, S: 36.5 cm, M: 37.5 cm, L: 38.5 cm</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Bust (cm):</strong></td>
                                            <td>XS: 87 cm, S: 91 cm, M: 95 cm, L: 99 cm</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Sleeve Length (cm):</strong></td>
                                            <td>XS: 13.5 cm, S: 14.5 cm, M: 15.5 cm, L: 16.5 cm</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Length (cm):</strong></td>
                                            <td>XS: 59 cm, S: 60 cm, M: 61 cm, L: 62 cm</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Size Available:</strong></td>
                                            <td>XS, S, M, L</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Fabric:</strong></td>
                                            <td>Fabric has some stretch</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Season:</strong></td>
                                            <td>Summer</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Cuff (cm):</strong></td>
                                            <td>XS: 28.5 cm, S: 29.5 cm, M: 30.5 cm, L: 31.5 cm</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <h5 class="mt-4 mb-2" style="font-weight:600;">Features:</h5>
                        <ul class="checkmark">
                            <li>high quality fabric, very comfortable to touch and wear. light weight and perfect forlayering</li>
                            <li>This cardigan sweater is cute for no reason,perfect for travel and casual. with dress or t-shirt inside,Perfect match</li>
                            <li>It can tie in front-is forgiving to you belly or tie behind like Bow, you can tie different ways</li>
                            <li>Pictures may slightly vary from actual item due to lighting and monitor.</li>
                        </ul>
                        <h5 class="mt-4 mb-2" style="font-weight:600;">Notes:</h5>
                        <p>Return or exchange within 30 days from the delivered date.</p>
                    </div>
                </div>
                <!-- End Tabs Content One -->
          
                <!-- Tabs Content Two -->
                <h3 class="acor-ttl d-block d-md-none" rel="tab2">Product Reviews</h3>
                <div id="tab2" class="tab-content py-3 py-md-0">
                    <div id="shopify-product-reviews">
                        <div class="spr-container">
                            <div class="spr-header clearfix">
                                <div class="spr-summary text-center d-flex justify-content-start justify-content-sm-between flex-column flex-sm-row">
                                    <span class="product-review justify-content-center"><a class="reviewLink"><i class="an an-star"></i><i class="an an-star"></i><i class="an an-star"></i><i class="an an-star"></i><i class="an an-star-half-alt"></i></a><span class="spr-summary-actions-togglereviews ms-2">Based on 6 reviews 456</span></span>
                                    <span class="spr-summary-actions mt-3 mt-sm-0">
                                        <a href="#" class="spr-summary-actions-newreview write-review-btn btn"><i class="an-1x an an-pencil-alt me-1"></i> Write a review</a>
                                    </span>
                                </div>
                            </div>
                            <div class="spr-content">
                                <div class="product-review-form spr-form clearfix" style="display:none;">
                                    <form method="post" action="#" id="new-review-form" class="new-review-form">
                                        <h3 class="spr-form-title">Write a review</h3>
                                        <fieldset class="spr-form-contact">
                                            <div class="spr-form-contact-name">
                                                <label class="spr-form-label" for="review_author_10508262282">Name</label>
                                                <input class="spr-form-input spr-form-input-text" id="review_author_10508262282" type="text" name="review[author]" value="" placeholder="Enter your name">
                                            </div>
                                            <div class="spr-form-contact-email">
                                                <label class="spr-form-label" for="review_email_10508262282">Email</label>
                                                <input class="spr-form-input spr-form-input-email " id="review_email_10508262282" type="email" name="review[email]" value="" placeholder="john.smith@example.com">
                                            </div>
                                        </fieldset>
                                        <fieldset class="spr-form-review">
                                            <div class="spr-form-review-rating">
                                                <label class="spr-form-label">Rating</label>
                                                <div class="spr-form-input spr-starrating">
                                                    <div class="product-review justify-content-start">
                                                        <a class="reviewLink" href="#"><i class="an an-star"></i><i class="an an-star"></i><i class="an an-star"></i><i class="an an-star"></i><i class="an an-star-half-alt"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="spr-form-review-title">
                                                <label class="spr-form-label" for="review_title_10508262282">Review Title</label>
                                                <input class="spr-form-input spr-form-input-text" id="review_title_10508262282" type="text" name="review[title]" value="" placeholder="Give your review a title">
                                            </div>
                                            <div class="spr-form-review-body">
                                                <label class="spr-form-label" for="review_body_10508262282">Body of Review <span class="spr-form-review-body-charactersremaining">(1500)</span></label>
                                                <div class="spr-form-input">
                                                    <textarea class="spr-form-input spr-form-input-textarea" id="review_body_10508262282" data-product-id="10508262282" name="review[body]" rows="5" placeholder="Write your comments here"></textarea>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset class="spr-form-actions">
                                            <input type="submit" class="spr-button spr-button-primary button button-primary btn btn-primary" value="Submit Review">
                                        </fieldset>
                                    </form>
                                </div>
                                <div class="spr-reviews">
                                    <div class="spr-review">
                                        <div class="spr-review-header">
                                            <span class="product-review spr-starratings spr-review-header-starratings"><span class="reviewLink"><i class="an an-star"></i><i class="an an-star"></i><i class="an an-star"></i><i class="an an-star"></i><i class="an an-star"></i></span></span>
                                            <h3 class="spr-review-header-title">Lorem ipsum dolor sit amet</h3>
                                            <span class="spr-review-header-byline"><strong>dsacc</strong> on <strong>Apr 09, 2019</strong></span>
                                        </div>
                                        <div class="spr-review-content">
                                            <p class="spr-review-content-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                        </div>
                                    </div>
                                    <div class="spr-review">
                                        <div class="spr-review-header">
                                            <span class="product-review spr-starratings spr-review-header-starratings"><span class="reviewLink"><i class="an an-star"></i><i class="an an-star"></i><i class="an an-star"></i><i class="an an-star"></i><i class="an an-star-half-alt"></i></span></span>
                                            <h3 class="spr-review-header-title">Lorem Ipsum is simply dummy text of the printing</h3>
                                            <span class="spr-review-header-byline"><strong>larrydude</strong> on <strong>Dec 30, 2018</strong></span>
                                        </div>
                                        <div class="spr-review-content">
                                            <p class="spr-review-content-body">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Tabs Content Two -->
          
                <!-- Tabs Content Three -->
                <h3 class="acor-ttl d-block d-md-none" rel="tab3">Size Chart</h3>
                <div id="tab3" class="tab-content py-3 py-md-0">
                    <div class="product-description rte">
                        <h4>WOMEN'S BODY SIZING CHART</h4>
                        <div class="table-responsive">
                            <table>
                                <tbody>
                                    <tr>
                                        <th>Size</th>
                                        <th>XS</th>
                                        <th>S</th>
                                        <th>M</th>
                                        <th>L</th>
                                        <th>XL</th>
                                    </tr>
                                    <tr>
                                        <td>Chest</td>
                                        <td>31" - 33"</td>
                                        <td>33" - 35"</td>
                                        <td>35" - 37"</td>
                                        <td>37" - 39"</td>
                                        <td>39" - 42"</td>
                                    </tr>
                                    <tr>
                                        <td>Waist</td>
                                        <td>24" - 26"</td>
                                        <td>26" - 28"</td>
                                        <td>28" - 30"</td>
                                        <td>30" - 32"</td>
                                        <td>32" - 35"</td>
                                    </tr>
                                    <tr>
                                        <td>Hip</td>
                                        <td>34" - 36"</td>
                                        <td>36" - 38"</td>
                                        <td>38" - 40"</td>
                                        <td>40" - 42"</td>
                                        <td>42" - 44"</td>
                                    </tr>
                                    <tr>
                                        <td>Regular inseam</td>
                                        <td>30"</td>
                                        <td>30½"</td>
                                        <td>31"</td>
                                        <td>31½"</td>
                                        <td>32"</td>
                                    </tr>
                                    <tr>
                                        <td>Long (Tall) Inseam</td>
                                        <td>31½"</td>
                                        <td>32"</td>
                                        <td>32½"</td>
                                        <td>33"</td>
                                        <td>33½"</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <h4 class="mt-0 pt-1">MEN'S BODY SIZING CHART</h4>
                        <div class="table-responsive">
                            <table>
                                <tbody>
                                    <tr>
                                        <th>Size</th>
                                        <th>XS</th>
                                        <th>S</th>
                                        <th>M</th>
                                        <th>L</th>
                                        <th>XL</th>
                                        <th>XXL</th>
                                    </tr>
                                    <tr>
                                        <td>Chest</td>
                                        <td>33" - 36"</td>
                                        <td>36" - 39"</td>
                                        <td>39" - 41"</td>
                                        <td>41" - 43"</td>
                                        <td>43" - 46"</td>
                                        <td>46" - 49"</td>
                                    </tr>
                                    <tr>
                                        <td>Waist</td>
                                        <td>27" - 30"</td>
                                        <td>30" - 33"</td>
                                        <td>33" - 35"</td>
                                        <td>36" - 38"</td>
                                        <td>38" - 42"</td>
                                        <td>42" - 45"</td>
                                    </tr>
                                    <tr>
                                        <td>Hip</td>
                                        <td>33" - 36"</td>
                                        <td>36" - 39"</td>
                                        <td>39" - 41"</td>
                                        <td>41" - 43"</td>
                                        <td>43" - 46"</td>
                                        <td>46" - 49"</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center mt-3">
                            <img src="assets/images/size.jpg" alt="" />
                        </div>
                    </div>
                </div>
                <!-- End Tabs Content Three -->
                <!-- Tabs Content Four -->
                <h3 class="acor-ttl d-block d-md-none" rel="tab4">Shipping &amp; Returns</h3>
                <div id="tab4" class="tab-content py-3 py-md-0">
                    <h4>Returns Policy</h4>
                    <p class="mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eros justo, accumsan non dui sit amet. Phasellus semper volutpat mi sed imperdiet. Ut odio lectus, vulputate non ex non, mattis sollicitudin purus. Mauris consequat justo a enim interdum, in consequat dolor accumsan. Nulla iaculis diam purus, ut vehicula leo efficitur at.</p>
                    <p>Interdum et malesuada fames ac ante ipsum primis in faucibus. In blandit nunc enim, sit amet pharetra erat aliquet ac.</p>
                    <h4>Shipping</h4>
                    <p>Pellentesque ultrices ut sem sit amet lacinia. Sed nisi dui, ultrices ut turpis pulvinar. Sed fringilla ex eget lorem consectetur, consectetur blandit lacus varius. Duis vel scelerisque elit, et vestibulum metus.  Integer sit amet tincidunt tortor. Ut lacinia ullamcorper massa, a fermentum arcu vehicula ut. Ut efficitur faucibus dui Nullam tristique dolor eget turpis consequat varius. Quisque a interdum augue. Nam ut nibh mauris.</p>
                </div>
                <!-- End Tabs Content Four -->
            </div>
            <!-- End Tabs Container -->
        </div>
        <!-- End Product Tabs -->

       

    
    </div>
</div>

<!-- End Main Content -->


      <!-- Related Product Slider -->
      <div class="d-none related-product grid-products">
        <header class="section-header">
            <h2 class="section-header__title text-center h2"><span>Related Products</span></h2>
            <p class="sub-heading">You can stop autoplay, increase/decrease aniamtion speed and number of grid to show and products from store admin.</p>
        </header>
        <div class="productPageSlider">
          @foreach (range(1,5) as $item)
              
            <div class="col-12 item">
                <div class="product-image">
                    <a href="product-layout1.html">
                        <img class="primary blur-up lazyload" 
                        data-src="{{asset('theme/assets/images/product-images/product-image1.jpg')}}" 
                        src="{{asset('theme/assets/images/product-images/product-image1.jpg')}}" alt="image" title="product" />
                        <img class="hover blur-up lazyload" 
                        data-src="{{asset('theme/assets/images/product-images/product-image1-1.jpg')}}" 
                        src="{{asset('theme/assets/images/product-images/product-image1-1.jpg')}}" 
                         alt="image" title="product" />
                        <div class="product-labels rectangular"><span class="lbl on-sale">Exclusive</span></div>
                    </a>
                    <div class="button-set">
                        <div class="quickview-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view">
                            <a href="#open-quickview-popup" class="btn quick-view-popup quick-view"><i class="icon an an-search"></i></a>
                        </div>
                        <div class="variants add" data-bs-toggle="tooltip" data-bs-placement="top" title="add to cart">
                            <form class="addtocart" action="#" method="post">
                                <a href="#open-addtocart-popup" class="btn cartIcon btn-addto-cart open-addtocart-popup"><i class="icon an an-shopping-bag"></i></a>
                            </form>
                        </div>
                        <div class="wishlist-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="add to wishlist">
                            <a href="#open-wishlist-popup" class="open-wishlist-popup wishlist add-to-wishlist"><i class="icon an an-heart"></i></a>
                        </div>
                    </div>
                </div>
                <div class="product-details text-center">
                    <div class="product-name">
                        <a href="product-layout1.html">Edna Dress</a>
                    </div>
                    <div class="product-price">
                        <span class="old-price">$500.00</span>
                        <span class="price">$600.00</span>
                    </div>
                    <div class="product-review">
                        <i class="an an-star"></i>
                        <i class="an an-star"></i>
                        <i class="an an-star"></i>
                        <i class="an an-star"></i>
                        <i class="an an-star-half-alt"></i>
                    </div>
                </div>
            </div>
            @endforeach

   
        </div>
      </div>
      <!-- End Related Product Slider -->

</div>




</div>
@endsection
@section('js')

<script> 


   let arrays = [];
   let json  = '<?php echo json_encode($variations);?>';
   const variations = JSON.parse(json);
  


    $(".qtyBtn").on("click", function () {
           
        var qtyField = $(this).parent(".qtyField");
        var oldValue = $(qtyField).find(".qty").val();
        var newVal = 1;

            if ($(this).is(".plus")) {
                newVal = parseInt(oldValue) + 1;
            } else if (oldValue > 1) {
                newVal = parseInt(oldValue) - 1;
            }
            $(qtyField).find(".qty").val(newVal);
            $(qtyField).find(".qty").trigger('change');
    });

</script>

        <!-- Photoswipe Gallery -->
        <script src="{{asset('theme/assets/js/vendor/photoswipe.min.js')}}"></script>
        <script src="{{asset('theme/assets/js/vendor/photoswipe-ui-default.min.js')}}"></script>
        <script>
            $(function () {


                var $pswp = $('.pswp')[0],
                        image = [],
                        getItems = function () {
                            var items = [];
                            $('.lightboximages a').each(function () {
                                var $href = $(this).attr('href'),
                                        $size = $(this).data('size').split('x'),
                                        item = {
                                            src: $href,
                                            w: $size[0],
                                            h: $size[1]
                                        }
                                items.push(item);
                            });
                            return items;
                        }
                var items = getItems();

                $.each(items, function (index, value) {
                    image[index] = new Image();
                    image[index].src = value['src'];
                });
                $('.prlightbox').on('click', function (event) {
                    event.preventDefault();

                    var $index = $(".active-thumb").parent().attr('data-slick-index');
                    $index++;
                    $index = $index - 1;

                    var options = {
                        index: $index,
                        bgOpacity: 0.9,
                        showHideOpacity: true
                    }
                    var lightBox = new PhotoSwipe($pswp, PhotoSwipeUI_Default, items, options);
                    lightBox.init();
                });
            });
        </script>

        <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="pswp__bg"></div>
            <div class="pswp__scroll-wrap"><div class="pswp__container"><div class="pswp__item"></div><div class="pswp__item"></div><div class="pswp__item"></div></div><div class="pswp__ui pswp__ui--hidden"><div class="pswp__top-bar"><div class="pswp__counter"></div><button class="pswp__button pswp__button--close" title="Close (Esc)"></button><button class="pswp__button pswp__button--share" title="Share"></button><button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button><button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button><div class="pswp__preloader"><div class="pswp__preloader__icn"><div class="pswp__preloader__cut"><div class="pswp__preloader__donut"></div></div></div></div></div><div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap"><div class="pswp__share-tooltip"></div></div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button><button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button><div class="pswp__caption"><div class="pswp__caption__center"></div></div></div></div>
        </div>

        <script>
            $(function () {





                $('.variation_change').change(function (e) { 
                   
                   let forms = {
                     qty:$('.qty').val(),
                     variations:[],
                   };
 
                    $('.product-form__item').each(function () {
                        let el = $(this);
                        let attribute_id =  el.attr('data-attribute-id');
                        var selectedValue = $(this).find('input[type="radio"]:checked').val();
                        forms.variations.push({
                            'attribute':attribute_id,
                            'value':selectedValue,
                         });
                    });

                    
                    var groupedBySku = variations.reduce(function (result, obj) {
                        var key = obj.sku;
                        result[key] = result[key] || [];
                        result[key].push(obj);
                        return result;
                    }, {});

                   // console.log(groupedBySku);

            
                    var findSku = false;
                    var selectedAtributes = forms.variations.map(obj =>  Number(obj.value));
                    for (const key in groupedBySku) {

                        if (groupedBySku.hasOwnProperty(key)) {
                          
                            const item = groupedBySku[key];
                            let is_found_sku = [];
                            item.forEach(element => {  
                                
                                if(selectedAtributes.includes(element.value_id)){
                                    is_found_sku.push(1);
                                }else{
                                    is_found_sku.push(0);
                                } 
                            });
                            if(is_found_sku.includes(0) == false){
                                findSku = item.pop();
                            }
                       }
                    }
                

                    
                    if(findSku){

                       
                        $('.variant-sku').text(findSku.sku);
                        $('.r-price').text('$'+findSku.price);
                        $('.instock').text('In Stock');
                        $('.instock').css('color','green');
                        $('.product-form__item--quantity').show();
                        $("[name='price']").val(findSku.price);
                        $("[name='sku']").val(findSku.variation_id);

                        
                    }else{
                        
                        $('.product-form__item--quantity').hide();
                        $('.product-form__item--quantity .qty').val(0);
                        $('.instock').text('Out Of Stock');
                        $('.instock').css('color','red');
                        $('.variant-sku').text('-');
                        $('.r-price').text('-');
                        $("[name='price']").val('');
                        $("[name='sku']").val('');
                    }

                });

                $('.variation_change').trigger('change');

            });
        </script>

@endsection