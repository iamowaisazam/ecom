@extends('theme.layout')

@php
  //dd($product)
    
@endphp

@section('metatags')
    <title>Shop</title>
    <meta name="description" content="{{$global_d['blog_meta_description'] ?? ''}}">
    <meta name="keywords" content="{{$global_d['blog_keywords'] ?? ''}}">
@endsection
@section('css')
  
@endsection
@section('content')
<div id="page-content" class="template-collection">

   <!-- Bredcrumbs -->
   <div class="bredcrumbWrap bredcrumb-style2">
      <div class="container breadcrumbs">
          <a href="{{URL::to('/')}}" title="Back to the home page">Home</a>
          <span aria-hidden="true">|</span>
          <a href="{{URL::to('/shop')}}" title="Back to the home page">Shop</a>
      </div>
   </div>
  <!-- End Bredcrumbs -->

    <!-- Collection Banner -->
    <div class="collection-header">
      <div class="collection-hero">
          <div class="collection-hero__image blur-up lazyload" 
          style="background-image:url('{{asset('theme/assets/images/collection/women-collection-bnr.jpg')}}');"></div>
          <div class="collection-hero__title-wrapper">
            <h1 class="collection-hero__title page-width">Shop</h1></div>
      </div>
  </div>
  <!-- End Collection Banner -->


  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-3 col-lg-3 sidebar filterbar">
        <div class="closeFilter d-block d-md-block d-lg-none"><i class="icon an an-times"></i></div>
        <div class="sidebar_tags">
            <!-- Categories -->
            <div class="sidebar_widget filterBox categories filter-widget">
                <div class="widget-title"><h2>Categories</h2></div>
                <div class="widget-content">
                    <ul class="sidebar_categories">

                        {{-- <li class="level1 sub-level"><a href="#;" class="site-nav">Clothing</a>
                            <ul class="sublinks" style="display: none;">
                                <li class="level2"><a href="#" class="site-nav">Men</a></li>
                                <li class="level2"><a href="#" class="site-nav">Women</a></li>
                                <li class="level2"><a href="#" class="site-nav">Child</a></li>
                                <li class="level2"><a href="#" class="site-nav">View All Clothing</a></li>
                            </ul>
                        </li>
                        <li class="level1 sub-level"><a href="#;" class="site-nav">Jewellery</a>
                            <ul class="sublinks">
                                <li class="level2"><a href="#" class="site-nav">Ring</a></li>
                                <li class="level2"><a href="#" class="site-nav">Neckalses</a></li>
                                <li class="level2"><a href="#" class="site-nav">Eaarings</a></li>
                                <li class="level2"><a href="#" class="site-nav">View All Jewellery</a></li>
                            </ul>
                        </li>
                        <li class="lvl-1"><a href="#" class="site-nav">Shoes</a></li>
                        <li class="lvl-1"><a href="#" class="site-nav">Accessories</a></li>
                        <li class="lvl-1"><a href="#" class="site-nav">Collections</a></li>
                        <li class="lvl-1"><a href="#" class="site-nav">Sale</a></li>
                        <li class="lvl-1"><a href="#" class="site-nav">Page</a></li> --}}

                        @foreach($categories as $category)
                        <?php 
                          $subcats = $category->children;
                        ?>

                           <li class="level1 {{count($subcats) ? 'sub-level' : '' }}">
                            <a href="#;" class="site-nav"> {{ $category->title }} </a>

                                @if(count($subcats))
                                    <ul class="sublinks">
                                        @foreach($subcats as $child)
                                            <li class="level2" >
                                              <a href="#" class="site-nav"> {{ $child->title }} </a>
                                                @if(count($child->children))
                                                    <ul>
                                                        @foreach($child->children as $subchild)
                                                            <li>{{ $subchild->title }}</li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>

                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- End Categories -->

            <!-- Price Filter -->
            <div class="sidebar_widget filterBox filter-widget">
                <div class="widget-title">
                    <h2>Price</h2>
                </div>
                <form action="#" method="post" class="price-filter widget-content">
                    <div id="slider-range" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                        <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p class="no-margin"><input id="amount" type="text" /></p>
                        </div>
                        <div class="col-6 text-end margin-25px-top">
                            <button class="btn btn-secondary btn--small">filter</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- End Price Filter -->

            <!-- Size Swatches -->
            <div class="sidebar_widget filterBox filter-widget size-swacthes">
                <div class="widget-title"><h2>Size</h2></div>
                <div class="filter-color swacth-list widget-content clearfix">
                    <span class="swacth-btn x checked" data-bs-toggle="tooltip" data-bs-placement="top" title="X">X</span>
                    <span class="swacth-btn xl" data-bs-toggle="tooltip" data-bs-placement="top" title="XL">XL</span>
                    <span class="swacth-btn xxl" data-bs-toggle="tooltip" data-bs-placement="top" title="XLL">XLL</span>
                    <span class="swacth-btn m" data-bs-toggle="tooltip" data-bs-placement="top" title="M">M</span>
                    <span class="swacth-btn l" data-bs-toggle="tooltip" data-bs-placement="top" title="L">L</span>
                    <span class="swacth-btn s" data-bs-toggle="tooltip" data-bs-placement="top" title="S">S</span>
                    <span class="swacth-btn xxxl" data-bs-toggle="tooltip" data-bs-placement="top" title="XXXL">XXXL</span>
                    <span class="swacth-btn xxl" data-bs-toggle="tooltip" data-bs-placement="top" title="XXL">XXL</span>
                    <span class="swacth-btn xs" data-bs-toggle="tooltip" data-bs-placement="top" title="XS">XS</span>
                </div>
            </div>
            <!-- End Size Swatches -->

            <!-- Color Swatches -->
            <div class="sidebar_widget filterBox filter-widget">
                <div class="widget-title"><h2>Color</h2></div>
                <div class="filter-color swacth-list widget-content clearfix">
                    <span class="swacth-btn black" data-bs-toggle="tooltip" data-bs-placement="top" title="black"></span>
                    <span class="swacth-btn white checked" data-bs-toggle="tooltip" data-bs-placement="top" title="white"></span>
                    <span class="swacth-btn red" data-bs-toggle="tooltip" data-bs-placement="top" title="Red"></span>
                    <span class="swacth-btn blue" data-bs-toggle="tooltip" data-bs-placement="top" title="Blue"></span>
                    <span class="swacth-btn pink" data-bs-toggle="tooltip" data-bs-placement="top" title="Pink"></span>
                    <span class="swacth-btn gray" data-bs-toggle="tooltip" data-bs-placement="top" title="Gray"></span>
                    <span class="swacth-btn green" data-bs-toggle="tooltip" data-bs-placement="top" title="Green"></span>
                    <span class="swacth-btn orange" data-bs-toggle="tooltip" data-bs-placement="top" title="Orange"></span>
                    <span class="swacth-btn yellow" data-bs-toggle="tooltip" data-bs-placement="top" title="Yellow"></span>
                    <span class="swacth-btn blueviolet" data-bs-toggle="tooltip" data-bs-placement="top" title="Blue Violet"></span>
                    <span class="swacth-btn brown" data-bs-toggle="tooltip" data-bs-placement="top" title="Brown"></span>
                    <span class="swacth-btn darkGoldenRod" data-bs-toggle="tooltip" data-bs-placement="top" title="Dark Golden Rod"></span> 
                    <span class="swacth-btn tops-maroon" data-bs-toggle="tooltip" data-bs-placement="top" title="Tops/Maroon"></span> 
                    <span class="swacth-btn shirt-lightPink" data-bs-toggle="tooltip" data-bs-placement="top" title="Shirt/Light Pink"></span> 
                    <span class="swacth-btn shirt-blueViolet" data-bs-toggle="tooltip" data-bs-placement="top" title="Shirt/Blue Violet"></span> 
                    <span class="swacth-btn jacket-khaki" data-bs-toggle="tooltip" data-bs-placement="top" title="Jacket/Khaki"></span> 
                    <span class="swacth-btn bag-green" data-bs-toggle="tooltip" data-bs-placement="top" title="Bag/Green"></span> 
                    <span class="swacth-btn shirt-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Shirt/Light"></span> 
                </div>
            </div>
            <!-- End Color Swatches -->

            <!-- Vendors -->
            <div class="sidebar_widget filterBox filter-widget">
                <div class="widget-title"><h2>Vendors</h2></div>
                <div class="widget-content">
                    <ul class="widget-vendors">
                        <li>
                            <input type="checkbox" value="allen-vela" id="1532947863384-0" />
                            <label for="1532947863384-0"><span><span></span></span>Allen Vela</label>
                        </li>
                        <li>
                            <input type="checkbox" value="famiza" id="1532947863384-2" />
                            <label for="1532947863384-2"><span><span></span></span>Famiza</label>
                        </li>
                        <li>
                            <input type="checkbox" value="oxymat" id="1532947863384-4" />
                            <label for="1532947863384-4"><span><span></span></span>Oxymat</label>
                        </li>
                        <li>
                            <input type="checkbox" value="vanelas" id="1532947863384-6" />
                            <label for="1532947863384-6"><span><span></span></span>Vanelas</label>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- End Vendors -->

            <!-- Banner -->
            <div class="sidebar_widget static-banner">
                <a href="collection-4columns.html"><img class="blur-up lazyload" data-src="{{asset('theme/assets/images/side-banner-2.jpg')}}" src="{{asset('theme/assets/images/side-banner-2.jpg')}}" alt="image" /></a>
            </div>
            <!-- End Banner -->

            <!-- Product Tags -->
            <div class="sidebar_widget">
                <div class="widget-title">
                    <h2>Product Tags</h2>
                </div>
                <div class="widget-content">
                    <ul class="product-tags">
                        <li><a href="#" title="Show products matching tag Under $100">Under $100</a></li>
                        <li><a href="#" title="Show products matching tag $100 - $200">$100 - $200</a></li>
                        <li><a href="#" title="Show products matching tag $200 - $400">$200 - $400</a></li>
                        <li><a href="#" title="Show products matching tag $400 - $600">$400 - $600</a></li>
                        <li><a href="#" title="Show products matching tag $600 - $1000">$600 - $1000</a></li>
                        <li><a href="#" title="Show products matching tag Allen Vela">Allen Vela</a></li>
                        <li><a href="#" title="Show products matching tag Black">Black</a></li>
                        <li><a href="#" title="Show products matching tag Blue">Blue</a></li>
                        <li><a href="#" title="Show products matching tag Cantitate">Cantitate</a></li>
                        <li><a href="#" title="Show products matching tag Famiza">Famiza</a></li>
                        <li><a href="#" title="Show products matching tag Gray">Gray</a></li>
                        <li><a href="#" title="Show products matching tag Green">Green</a></li>
                        <li><a href="#" title="Show products matching tag Hot">Hot</a></li>
                        <li><a href="#" title="Show products matching tag jean shop">jean shop</a></li>
                        <li><a href="#" title="Show products matching tag jesse kamm">jesse kamm</a></li>
                        <li><a href="#" title="Show products matching tag L">L</a></li>
                        <li><a href="#" title="Show products matching tag Lardini">Lardini</a></li>
                        <li><a href="#" title="Show products matching tag lareida">lareida</a></li>
                        <li><a href="#" title="Show products matching tag Lirisla">Lirisla</a></li>
                        <li><a href="#" title="Show products matching tag M">M</a></li>
                        <li><a href="#" title="Show products matching tag mini-dress">mini-dress</a></li>
                        <li><a href="#" title="Show products matching tag Monark">Monark</a></li>
                        <li><a href="#" title="Show products matching tag Navy">Navy</a></li>
                        <li><a href="#" title="Show products matching tag new">new</a></li>
                        <li><a href="#" title="Show products matching tag new arrivals">new arrivals</a></li>
                        <li><a href="#" title="Show products matching tag Orange">Orange</a></li>
                        <li><a href="#" title="Show products matching tag oxford">oxford</a></li>
                        <li><a href="#" title="Show products matching tag Oxymat">Oxymat</a></li>
                    </ul>
                    <span class="btn btn--small btnview">View all</span> </div>
            </div>
            <!-- End Product Tags -->
        </div>
    </div>
    <!-- End Sidebar -->

     <div class="col-12 col-sm-12 col-md-12 col-lg-9 main-col">
      <div class="productList">
        <!-- Toolbar -->
        <div class="toolbar">
            <div class="filters-toolbar-wrapper">
                <div class="row">
                    <div class="col-4 col-md-4 col-lg-4 filters-toolbar__item collection-view-as d-flex justify-content-Start align-items-center">
                        <button type="button" class="btn-filter d-block d-md-block d-lg-none icon an an-sliders-h" data-bs-toggle="tooltip" data-bs-placement="top" title="Filters"></button>
                        <a href="shop-left-sidebar.html" class="change-view change-view--active" data-bs-toggle="tooltip" data-bs-placement="top" title="Grid View">
                            <i class="icon an an-table"></i>
                        </a>
                        <a href="shop-listview.html" class="change-view" data-bs-toggle="tooltip" data-bs-placement="top" title="List View">
                            <i class="icon an an-th-list"></i>
                        </a>
                    </div>
                    <div class="col-4 col-md-4 col-lg-4 text-center filters-toolbar__item filters-toolbar__item--count d-flex justify-content-center align-items-center">
                        <span class="filters-toolbar__product-count">Showing: 22</span>
                    </div>
                    <div class="col-4 col-md-4 col-lg-4 d-flex justify-content-end align-items-center text-end">
                        <div class="filters-toolbar__item">
                            <label for="SortBy" class="hidden">Sort</label>
                            <select name="SortBy" id="SortBy" class="filters-toolbar__input filters-toolbar__input--sort">
                                <option value="title-ascending" selected="selected">Sort</option>
                                <option>Best Selling</option>
                                <option>Alphabetically, A-Z</option>
                                <option>Alphabetically, Z-A</option>
                                <option>Price, low to high</option>
                                <option>Price, high to low</option>
                                <option>Date, new to old</option>
                                <option>Date, old to new</option>
                            </select>
                            <input class="collection-header__default-sort" type="hidden" value="manual">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Toolbar -->

        <div class="grid-products grid--view-items product-three-load-more">
          <div class="row">
            @foreach ($data as $item)    
              <div class="col-6 col-sm-6 col-md-4 col-lg-4 item">
                  <div class="product-image">
                      <a href="{{URL::to('/products')}}/{{$item->id}}">
                          <img class="primary blur-up lazyload" data-src="{{asset('/theme/'.$item->image)}}" src="{{asset('/theme/'.$item->image)}}" alt="image" title="product" />
                          <img class="hover blur-up lazyload" data-src="{{asset('/theme/'.$item->hover_image)}}" src="{{asset('/theme/'.$item->hover_image)}}" alt="image" title="product" />
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
                          <a href="{{URL::to('/products')}}/{{$item->id}}">{{$item->title}}</a>
                      </div>
                      <div class="product-price">
                          <span class="old-price">${{$item->old_price}}</span>
                          <span class="price">${{$item->price}}</span>
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
        </div>
      </div>
        
      
      
      
      <!-- Infinit Pagination -->
         <div class="infinitpaginOuter">
          <div class="infinitpagin-three">	
              <a href="#" class="btn loadMoreThree">Load More</a>
          </div>
        </div>
      <!-- End Infinit Pagination -->


            
              



      </div>
    </div>
  
  

    </div>
  </div>




</div>
@endsection
@section('js')



@endsection