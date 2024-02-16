@extends('theme.layout')

@php




// $categories = [
//     [
//         "title" => "To the Tops", 
//         "image" => asset('theme/assets/images/collection/home10-collection1.jpg'),
//         "button" => "Shop Tops",
//     ],
//     [
//         "title" => "Easy Dressing ",  
//         "image" => asset('theme/assets/images/collection/home10-collection2.jpg'),
//         "button" => "Shop Dresses",
//     ],
//     [
//         "title" => "Summer Special ", 
//         "image" => asset('theme/assets/images/collection/home10-collection3.jpg'),
//         "button" => "Shop All under $70",
//     ],
//     [
//         "title" => "Women Clothes from", 
//         "image" => asset('theme/assets/images/collection/home10-collection4.jpg'),
//         "button" => "View Collection",
//     ],
// ];



@endphp

@section('metatags')
    <title>{{$global_d['blog_meta_tags'] ?? ''}}</title>
    <meta name="description" content="{{$global_d['blog_meta_description'] ?? ''}}">
    <meta name="keywords" content="{{$global_d['blog_keywords'] ?? ''}}">
@endsection
@section('css')


@endsection
@section('content')

<div id="page-content">

            <!-- Home Banner slider -->
            <div class="slideshow slideshow-wrapper pb-section">
                <div class="home-slideshow slideshow--large">
                    <div class="slide slide1 d-block">
                        <div class="slideimg blur-up lazyload">
                            <img class="blur-up lazyload" data-src="{{asset('theme/assets/images/slideshow-banners/home2-banner1.jpg')}}" src="{{asset('theme/assets/images/slideshow-banners/home2-banner1.jpg')}}" alt="Welcome to Diva" title="Welcome to Diva" />
                            <div class="slideshow__text-wrap slideshow__overlay">
                                <div class="slideshow__text-content mt-0 center">
                                    <div class="container">
                                        <div class="wrap-caption left">
                                            <h2 class="h1 mega-title slideshow__title">Welcome to Diva</h2>
                                            <span class="mega-subtitle slideshow__subtitle">We have created a Store  that looks Awesome and performs Brilliantly</span>
                                            <a href="{{URL::to('/shop')}}" class="btn btn--large">Purchase Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="slide slide2 d-block">
                        <div class="slideimg blur-up lazyload">
                            <img class="blur-up lazyload" 
                            data-src="{{asset('theme/assets/images/slideshow-banners/diva-banner2.jpg')}}" 
                            src="{{asset('theme/assets/images/slideshow-banners/diva-banner2.jpg')}}" alt="Beautiful Designs" title="Beautiful Designs" />
                            <div class="slideshow__text-wrap slideshow__overlay">
                                <div class="slideshow__text-content mt-0 center">
                                    <div class="container">
                                        <div class="wrap-caption right">
                                            <h2 class="h1 mega-title slideshow__title">Beautiful Designs</h2>
                                            <span class="mega-subtitle slideshow__subtitle">Looks beautiful and sharp on every device</span>
                                            <a href="{{URL::to('/shop')}}" class="btn btn--large">Top Notch support</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="slide slide3 d-block">
                        <div class="slideimg blur-up lazyload">
                            <img class="blur-up lazyload" 
                            data-src="{{asset('theme/assets/images/slideshow-banners/home6-banner3.jpg')}}" 
                            src="{{asset('theme/assets/images/slideshow-banners/home6-banner3.jpg')}}" alt="Welcome to Diva" title="Welcome to Diva" />
                            <div class="slideshow__text-wrap slideshow__overlay">
                                <div class="slideshow__text-content mt-0 center">
                                    <div class="container">
                                        <div class="wrap-caption left">
                                            <h2 class="h1 mega-title slideshow__title">Welcome to Diva</h2>
                                            <span class="mega-subtitle slideshow__subtitle">The Diva is all you need to build outstanding online shop</span>
                                            <a href="{{URL::to('/shop')}}" class="btn btn--large">Purchase Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

               
                </div>
            </div>
            <!-- End Home Banner slider -->

        <!-- Collection -->
        <div class="collection-box tle-bold section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="section-header text-center">
                            <h2 class="h2">Shop By Category</h2>
                            <p>Browse the collection of our best selling and top interesting products. <br/> You'll definitely find what you are looking for.</p>
                        </div>
                    </div>
                </div>
                <div class="row collection-grids">
                    @foreach ($categories as $item)
                        <div class="col-12 col-sm-6 col-md-4 item">
                            <div class="collection-grid-item">
                                <img class="blur-up lazyload" data-src="{{asset('theme/'.$item['image'])}}" src="{{asset('theme/'.$item['image'])}}" alt="collection" title="" />
                                <a href="{{URL::to('/shop')}}" class="collection-grid-item__title-wrapper">
                                    <div class="title-wrapper">
                                        <h3 class="collection-grid-item__title fw-bold">{{$item['title']}}</h3>
                                        <span class="btn btn--secondary border-btn-1">Shop Now</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- End Collection -->

         <!-- Parallax Section -->
         <div class="section hero-background">
            <div class="hero hero--large bg-size background-parallax" data-stellar-background-ratio="0.08" data-stellar-vertical-offset="0">
                <img class="bg-img blur-up" src="{{asset('theme/assets/images/parallax-banners/home3-parallax-banner.jpg')}}" alt="image" />
                <div class="hero__inner">
                    <div class="container">
                        <div class="wrap-text center text-medium font-bold">
                            <span>Lookbook</span>
                            <h2 class="h1 mega-title text-black">Spring summer 2018</h2>
                            <div class="rte-setting mega-subtitle text-black">We enjoy working on the Services & Products. we provide as much as you need them. This help us in delivering your Goals easily. Browse through the wide range of services we provide.</div>
                            <a href="shop-left-sidebar.html" class="btn border-btn-2">Get Your set Today</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Parallax Section -->



        <!-- Let's Get Personal -->
        <div class="product-rows section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="section-header text-center">
                            <h2 class="h2">Let’s Get Personal</h2>
                            <p>Our favorite pieces handpicked for you.</p>
                        </div>
                    </div>
                </div>

                <!-- Grid Product -->
                <div class="grid-products grid--view-items ">
                    <div class="row">
                        @foreach ($products as $product)
                        
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 item">
                            <div class="product-image">
                                <a href="{{URL::to('/products')}}/{{$product->id}}">
                                    <img class="primary blur-up lazyload" 
                                    data-src="{{asset('/theme/'.$product->image)}}" 
                                    src="{{asset('/theme/'.$product->image)}}" 
                                    alt="image" 
                                    title="product" />
                                    <img class="hover blur-up lazyload" 
                                    data-src="{{asset('/theme/'.$product->hover_image)}}" 
                                    src="{{asset('/theme/'.$product->hover_image)}}" 
                                    alt="image" 
                                    title="product" />
                                    @if($product->is_popular)
                                    <div class="product-labels"><span class="lbl pr-label3">Popular</span></div>
                                    @endif
                                </a>
                                <!-- End Product Image -->

                                <!-- Product Button -->
                                <div class="button-set">
                                    <div class="quickview-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view">
                                        <a href="#open-quickview-popup-{{$product->id}}" 
                                            class="btn quick-view-popup quick-view">
                                            <i class="icon an an-search"></i></a>
                                    </div>
                                    <div class="variants add" data-bs-toggle="tooltip" data-bs-placement="top" title="add to cart">
                                        <form class="addtocart" action="#" method="post">
                                            <a href="#open-addtocart-popup" class="btn cartIcon btn-addto-cart open-addtocart-popup"><i class="icon an an-shopping-bag"></i></a>
                                        </form>
                                    </div>
                                    <div class="wishlist-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="add to wishlist">
                                        <a href="#open-wishlist-popup" class="btn open-wishlist-popup wishlist add-to-wishlist"><i class="icon an an-heart"></i></a>
                                    </div>  
                                </div>
                            </div>
                            <!-- End Product Image -->

                            <!-- Product Details -->
                            <div class="product-details text-center">
                                <div class="product-name">
                                    <a href="{{URL::to('/products')}}/{{$product->id}}">{{$product->title}}</a>
                                </div>
                                <div class="product-price">
                                    <span style="padding-left: 5px;
                                    color: #ed1313 !important;
                                    letter-spacing: normal;" 
                                    class="price">${{$product->price}}</span>
                                </div>
                            </div>
                            @component('theme.components.popupProduct',['product' => $product]) @endcomponent
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- End Let's Get Personal -->



   

    

   




   
     <!-- Instagram -->
     <div class="section home-instagram no-pb-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="section-header text-center">
                        <h2 class="h2">POPULAR BRANDS</h2>
                        <p>Phasellus lorem malesuada ligula pulvinar commodo maecenas suscipit auctom.</p>
                    </div>
                </div>
            </div>

            <!-- Instagram Slider -->
            <div class="instagram-section instagram-slider">
                @foreach($brands as $brand)
                    <div class="instagram-item">
                        <a href="#">
                            <img class="blur-up lazyload" 
                              src="{{asset('theme/'.$brand->image)}}" 
                              data-src="{{asset('theme/'.$brand->image)}}" 
                              alt="image" 
                              title="" />
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="followus text-center mt-3 d-none">
                <a href="#" target="_blank" class="btn">View Gallery</a>
            </div>
        </div>
    </div>
    <!-- End Instagram -->


    <!-- Store Feature -->
    <div class="store-feature style3 mt-2 mb-2">
        <div class="container">
            <div class="row">
                <div class="col-6 col-sm-6 col-md-3 col-lg-3 mb-3 mb-md-0">
                    <div class="store-info px-3 py-3 text-center">
                        <div class="icons mb-3"><i class="icon an an-truck"></i></div>
                        <div class="store-info-text">
                            <h5>Free Worldwide Shipping</h5>
                            <span class="sub-text">Free shipping on all US orders</span>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-3 col-lg-3 mb-3 mb-md-0">
                    <div class="store-info px-3 py-3 text-center">
                        <div class="icons mb-3"><i class="icon an an-money-bill-alt"></i></div>
                        <div class="store-info-text">
                            <h5>Money Guarantee</h5>
                            <span class="sub-text">30 days money back guarantee</span>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-3 col-lg-3 mb-3 mb-md-0">
                    <div class="store-info px-3 py-3 text-center">
                        <div class="icons mb-3"><i class="icon an an-question-circle"></i></div>
                        <div class="store-info-text">
                            <h5>Top Notch Support</h5>
                            <span class="sub-text">We support online 24/7 on day</span>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-3 col-lg-3 mb-3 mb-md-0">
                    <div class="store-info px-3 py-3 text-center">
                        <div class="icons mb-3"><i class="icon an an-lock"></i></div>
                        <div class="store-info-text">
                            <h5>Secure Payments</h5>
                            <span class="sub-text">All payment are Secured, trusted.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Store Feature -->




</div>
@endsection
