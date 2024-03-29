
<!-- Quick View popup -->
 <div id="open-quickview-popup-{{$product->id}}" class="quickview-popup magnific-popup mfp-hide">
    <div class="product-template__container prstyle1">
        <div class="product-singles">
            <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="quickview-details mb-3 mb-md-0">

                        <!-- Thumbnails Single -->
                        <div class="quickview-details-img quickview-thumbnails-single">
                            @foreach ($product->get_gallery() as $img) 
                            <div class="item">
                                <img src="{{asset($img->path)}}" 
                                data-src="{{asset($img->path)}}" 
                                alt="image" />
                            </div>
                            @endforeach
                        </div>
                        <!-- End Thumbnails Single -->

                        <!-- Thumbnail Lists -->
                        <div class="product-thumb-lists quickview-thumbnail-items">
            
                            @foreach ($product->get_gallery() as $img)   
                                <div class="item">
                                    <img class="blur-up lazyload" 
                                    src="{{asset($img->path)}}" 
                                    data-src="{{asset($img->path)}}" alt="image" />
                                </div>
                            @endforeach
                        </div>
                        <!-- End Thumbnail Lists -->
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="product-single__meta">
                        <h2 class="product-single__title">{{$product->title}}</h2>
                        <div class="prInfoRow">
                            <div class="product-stock"> <span class="instock ">In Stock</span> <span class="outstock hide">Unavailable</span> </div>
                            <div class="product-sku">SKU: <span class="variant-sku">{{$product->sku}}</span></div>
                        </div>
                        <p class="product-single__price product-single__price-product-template">
                            <span class="visually-hidden">Regular price</span>
                            <s id="ComparePrice-product-template"><span class="money">${{$product->price}}</span></s>
                            <span class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
                                <span id="ProductPrice-product-template"><span class="money">${{$product->price}}</span></span>
                            </span>
                        </p>
                        <div class="product-single__description rte">
                            {{$product->short_des}}
                        </div>
                        <form method="post" action="/cart/add" id="product_form_1" accept-charset="UTF-8" class="product-form product-form-product-template hidedropdown" enctype="multipart/form-data">
                            <div class="swatch clearfix swatch-0 option1" data-option-index="0">
                                <div class="product-form__item">
                                    <label class="header">Size: <span class="slVariant">XS</span></label>
                                    <div data-value="XS" class="swatch-element xs available" data-bs-toggle="tooltip" data-bs-placement="top" title="XS">
                                        <input class="swatchInput" id="swatch-1-xs" type="radio" name="option-1" value="XS" />
                                        <label class="swatchLbl medium" for="swatch-1-xs">XS</label>
                                    </div>
                                    <div data-value="S" class="swatch-element s available" data-bs-toggle="tooltip" data-bs-placement="top" title="S">
                                        <input class="swatchInput" id="swatch-1-s" type="radio" name="option-1" value="S" />
                                        <label class="swatchLbl medium" for="swatch-1-s">S</label>
                                    </div>
                                    <div data-value="M" class="swatch-element m available" data-bs-toggle="tooltip" data-bs-placement="top" title="M">
                                        <input class="swatchInput" id="swatch-1-m" type="radio" name="option-1" value="M" />
                                        <label class="swatchLbl medium" for="swatch-1-m">M</label>
                                    </div>
                                    <div data-value="L" class="swatch-element l available" data-bs-toggle="tooltip" data-bs-placement="top" title="L">
                                        <input class="swatchInput" id="swatch-1-l" type="radio" name="option-1" value="L" />
                                        <label class="swatchLbl medium" for="swatch-1-l">L</label>
                                    </div>
                                </div>
                            </div>
                            <div class="swatch clearfix swatch-1 option2" data-option-index="1">
                                <div class="product-form__item">
                                    <label class="header">Color: <span class="slVariant">Red</span></label>
                                    <div data-value="Red" class="swatch-element color red available" data-bs-toggle="tooltip" data-bs-placement="top" title="Red">
                                        <input class="swatchInput" id="swatch-0-red" type="radio" name="option-0" value="Red" />
                                        <label class="swatchLbl color medium" for="swatch-0-red" style="background-image:url('{{asset('theme/assets/images/product-detail-page/tops-1-1.jpg')}}');"></label>
                                    </div>
                                    <div data-value="Blue" class="swatch-element color blue available" data-bs-toggle="tooltip" data-bs-placement="top" title="Blue">
                                        <input class="swatchInput" id="swatch-0-blue" type="radio" name="option-0" value="Blue" />
                                        <label class="swatchLbl color medium" for="swatch-0-blue" style="background-image:url('{{asset('theme/assets/images/product-detail-page/tops-1-2.jpg')}}');"></label>
                                    </div>
                                    <div data-value="Green" class="swatch-element color green available" data-bs-toggle="tooltip" data-bs-placement="top" title="Green">
                                        <input class="swatchInput" id="swatch-0-green" type="radio" name="option-0" value="Green" />
                                        <label class="swatchLbl color medium" for="swatch-0-green" style="background-image:url('{{asset('theme/assets/images/product-detail-page/tops-1-3.jpg')}}');"></label>
                                    </div>
                                    <div data-value="Gray" class="swatch-element color gray available" data-bs-toggle="tooltip" data-bs-placement="top" title="Gray">
                                        <input class="swatchInput" id="swatch-0-gray" type="radio" name="option-0" value="Gray" />
                                        <label class="swatchLbl color medium" for="swatch-0-gray" style="background-image:url('{{asset('theme/assets/images/product-detail-page/tops-1-4.jpg')}}');"></label>
                                    </div>
                                </div>
                            </div>
                            <!-- Product Action -->
                            <div class="product-action clearfix">
                                <div class="product-form__item--quantity">
                                    <div class="wrapQtyBtn">
                                        <div class="qtyField">
                                            <a class="qtyBtn minus" href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Minus"><i class="an an-minus" aria-hidden="true"></i></a>
                                            <input type="text" id="Quantity" name="quantity" value="1" class="product-form__input qty" />
                                            <a class="qtyBtn plus" href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" title="Plus"><i class="an an-plus" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-form__item--submit">
                                    <button type="button" name="add" class="btn product-form__cart-submit">
                                        <span>Add to cart</span>
                                    </button>
                                    <div class="wishlist-btn">
                                        <a class="wishlist add-to-wishlist" href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Wishlist"><i class="icon an an-heart" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Product Action -->
                        </form>
                        <div class="display-table shareRow">
                            <div class="display-table-cell">
                                <div class="social-sharing">
                                    <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-facebook" data-bs-toggle="tooltip" data-bs-placement="top" title="Share on Facebook">
                                        <i class="an an-facebook" aria-hidden="true"></i><span class="share-title align-middle" aria-hidden="true">Share</span>
                                    </a>
                                    <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-twitter" data-bs-toggle="tooltip" data-bs-placement="top" title="Tweet on Twitter">
                                        <i class="an an-twitter" aria-hidden="true"></i><span class="share-title align-middle" aria-hidden="true">Tweet</span>
                                    </a>
                                    <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-google" data-bs-toggle="tooltip" data-bs-placement="top" title="Share on google+">
                                        <i class="an an-google-plus-g" aria-hidden="true"></i><span class="share-title align-middle" aria-hidden="true">Google+</span>
                                    </a>
                                    <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-pinterest" data-bs-toggle="tooltip" data-bs-placement="top" title="Pin on Pinterest">
                                        <i class="an an-pinterest-p" aria-hidden="true"></i><span class="share-title align-middle" aria-hidden="true">Pin it</span>
                                    </a>
                                    <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-email" data-bs-toggle="tooltip" data-bs-placement="top" title="Share by Email">
                                        <i class="an an-envelope" aria-hidden="true"></i><span class="share-title align-middle" aria-hidden="true">Email</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End-product-single-->
        </div>
    </div>
</div>
<!-- End Quick View Popup -->