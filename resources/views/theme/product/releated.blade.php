 <!-- Related Product Slider -->
 <div class=" related-product grid-products">
    <header class="section-header">
        <h2 class="section-header__title text-center h2"><span>Related Products</span></h2>
        <p class="sub-heading">You can stop autoplay, increase/decrease aniamtion speed and number of grid to show and products from store admin.</p>
    </header>
    <div class="productPageSlider">
      @foreach ($releated_products as $rel)
      <?php 
            $thumb = $product->get_thumbnail() ? asset($product->get_thumbnail()->path) : '';
            $img_hover = $product->get_hover_image() ? asset($product->get_hover_image()->path) : '';
        ?>
          
        <div class="col-12 item">
            <div class="product-image">
                <a href="{{URL::to('/products')}}/{{$rel->slug}}">
                    <img class="primary blur-up lazyload" 
                    data-src="{{asset($thumb)}}" 
                    src="{{asset($thumb)}}" alt="image" title="product" />
                    <img class="hover blur-up lazyload" 
                    data-src="{{asset($img_hover)}}" 
                    src="{{asset($img_hover)}}" 
                     alt="image" title="product" />
                  
                </a>
            </div>
            <div class="product-details text-center">
                <div class="product-name">
                    <a href="{{URL::to('/products')}}/{{$rel->slug}}">{{$rel->title}}</a>
                </div>
                
                <div class="product-price">
                    <span class="old-price">${{$rel->selling_price}}</span>
                    <span class="price">${{$rel->price}}</span>
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