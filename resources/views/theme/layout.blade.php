<!DOCTYPE html>
<html lang="en">
<head>

    @yield('metatags')

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    
    <!-- Plugins CSS -->
       <link rel="shortcut icon" href="{{asset('web/images/short_icon.png')}}">
       <link rel="stylesheet" href="{{asset('theme/assets/css/plugins.css')}}" />
       <link href="{{asset('admin/assets/node_modules/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
       <link rel="stylesheet" href="{{asset('theme/assets/css/style.css')}}" />
       <link rel="stylesheet" href="{{asset('theme/assets/css/responsive.css')}}" />

    @yield('css')
</head>
<body class="template-index diva home8-simple">

  <!-- Page Loader -->
  <div id="pre-loader"><img src="{{asset('theme/assets/images/loader.gif')}}" alt="Loading..." /></div>
  <!-- End Page Loader -->

  <!-- Page Wrapper -->
  <div class="pageWrapper">

    <!-- Promotion Bar -->
    <div class="notification-bar mobilehide">
        <a href="#" class="notification-bar__message">10% off your very first purchase,
             use promo code: diva 2018</a>
        <span class="close-announcement icon an an-times"></span>
    </div>
    <!-- End Promotion Bar -->

    <!-- Search Form Drawer -->
    <div class="search">
        <div class="search__form">
            <form class="search-bar__form" action="#">
                <button class="go-btn search__button" type="submit"><i class="icon an an-search"></i></button>
                <input class="search__input" type="search" name="q" value="" placeholder="Search entire store..." aria-label="Search" autocomplete="off" />
            </form>
            <button type="button" class="search-trigger close-btn" data-bs-toggle="tooltip" data-bs-placement="left" title="Close"><i class="icon an an-times"></i></button>
        </div>
    </div>
    <!-- End Search Form Drawer -->

    <!-- Main Header -->
    <div class="header-section clearfix animated hdr-sticky">
        <!-- Desktop Header -->
        <div class="header-7">
            <!-- Top Header -->
            <div class="top-header d-block d-lg-none">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-10 col-sm-8 col-md-7 col-lg-4">
                            <p class="phone-no float-start"><i class="icon an an-phone me-1"></i>
                                <a href="tel:+4400(111)044833">+440 0(111) 044 833</a></p>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4 d-none d-md-none d-lg-block">
                            <div class="text-center">
                                <p class="top-header_middle-text">Free Ground Shipping Over $250</p>
                            </div>
                        </div>
                        <div class="col-2 col-sm-4 col-md-5 col-lg-4 text-end d-none d-sm-block d-md-block d-lg-block">
                            <div class="header-social">
                                <ul class="justify-content-end list--inline social-icons">
                                    <li><a class="social-icons__link" href="#" target="_blank" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Facebook"><i class="icon an an-facebook"></i> <span class="icon__fallback-text">Facebook</span></a></li>
                                    <li><a class="social-icons__link" href="#" target="_blank" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Twitter"><i class="icon an an-twitter"></i> <span class="icon__fallback-text">Twitter</span></a></li>
                                    <li><a class="social-icons__link" href="#" target="_blank" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Pinterest"><i class="icon an an-pinterest-p"></i> <span class="icon__fallback-text">Pinterest</span></a></li>
                                    <li><a class="social-icons__link" href="#" target="_blank" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Instagram"><i class="icon an an-instagram"></i> <span class="icon__fallback-text">Instagram</span></a></li>
                                    <li><a class="social-icons__link" href="#" target="_blank" data-bs-toggle="tooltip" data-bs-placement="bottom" title="YouTube"><i class="icon icon an an-youtube"></i> <span class="icon__fallback-text">YouTube</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-2 col-sm-4 col-md-5 col-lg-4 text-end d-block d-sm-none d-md-none d-lg-none">
                            <!-- Mobile User Links -->
                            <div class="user-menu-dropdown">
                                <span class="user-menu"><i class="an an-user-alt"></i></span>
                                <ul class="customer-links list-inline" style="display:none;">
                                    <li class="item"><a href="login.html">Login</a></li>
                                    <li class="item"><a href="register.html">Register</a></li>
                                    <li class="item"><a href="my-account.html">Orders</a></li>
                                    <li class="item"><a href="compare.html">Compare</a></li>
                                </ul>
                            </div>
                            <!-- End Mobile User Links -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Top Header -->

            <!-- Header -->
            <div class="header-wrap d-flex border-bottom">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-4 col-sm-4 col-md-5 col-lg-8 d-block d-lg-none">
                            <button type="button" class="btn--link site-header__menu js-mobile-nav-toggle mobile-nav--open" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Menu"><i class="icon an an-times"></i><i class="icon an an-bars"></i></button>
                        
                            <!-- Mobile Search -->
                            <div class="site-header__search d-block d-lg-none mobile-search-icon">
                                <button type="button" class="search-trigger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Search"><i class="icon an an-search"></i></button>
                            </div>
                            <!-- End Mobile Search -->
                        </div>

                        <!-- Desktop Logo -->
                        <div class="logo col-4 col-sm-4 col-md-2 col-lg-2 align-self-center">
                            <a href="{{URL::to('/')}}"><img src="{{asset('black.png')}}" width="100" alt="theme/assets/images/logo.png" /></a>
                        </div>
                        <!-- End Desktop Logo -->
                        
                        <!-- Desktop Navigation -->
                        <div class="col-2 col-sm-3 col-md-3 col-lg-6 d-none d-lg-block">
                            <!-- Desktop Menu -->
                            <nav class="grid__item" id="AccessibleNav">
                                <ul id="siteNav" class="d-flex flex-wrap site-nav medium left ms-0 hidearrow">
                                   <?php $menus = $global_d['menus']->where('id',1)[0]; ?>
                                      @foreach ($menus->children->where('parent_id',null) as $page)
                                            <li class="lvl1 parent dropdown">
                                                <a href="{{$page->link}} ">{{$page->title}} 
                                                <i class="an an-angle-down"></i>
                                                </a>
                                            @if(count($page->children) > 0)
                                                <ul class="dropdown">
                                                    @foreach ($page->children as $chil_page)
                                                    <li>
                                                        <a href="{{$chil_page->link}}" 
                                                        class="site-nav">{{$chil_page->title}}</a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>  
                                    @endforeach
                                </ul>
                            </nav>
                        </div>
                        <!-- End Desktop Navigation -->

                        <!-- Right Side -->
                        <div class="col-4 col-sm-4 col-md-5 col-lg-4">
                            <div class="right-action text-action d-flex-align-center justify-content-end">
                                <!-- Search -->
                                {{-- <div class="item site-header__search d-none d-lg-inline-block">
                                    <button type="button" class="search-trigger"><i class="icon an an-search"></i><span class="text align-middle ms-1 d-none d-md-inline-block">Search</span></button>
                                </div> --}}
                                <!-- End Search -->
                                <!-- User Links -->
                                <div class="item site-user-menu d-none d-sm-inline-block">
                                    <a href="{{URL::to('/admin/login')}}" class="icon-login text-capitalize text-nowrap"><i class="icon an an-user-alt"></i><span class="text align-middle ms-1 d-none d-md-inline-block">Login</span></a>
                                </div>
                                <!-- End User Links -->
                                <!-- Wishlist -->
                                {{-- <div class="item site-header-wishlist">
                                    <a href="wishlist.html" class="icon-wishlist text-capitalize"><i class="icon an an-heart"></i><span class="text align-middle ms-1 d-none d-md-inline-block">Wishlist</span><span id="WishCount" class="site-header-wish-count1 ms-1" data-cart-render="item_count">(0)</span></a>
                                </div> --}}
                                <!-- End Wishlist -->
                                <!-- Minicart -->
                                <div class="item site-cart">
                                    <a href="cart.html" class="icon-cart site-header-cart btn-minicart text-capitalize" data-bs-toggle="modal" data-bs-target="#minicart-drawer"><i class="icon an an-shopping-bag"></i><span class="text align-middle ms-1 d-none d-md-inline-block">Cart</span><span id="CartCount" class="site-header__cart-count1 ms-1" data-cart-render="item_count">({{count($carts)}})</span></a>
                                </div>
                                <!-- End Minicart -->
                            </div>
                        </div>
                        <!-- End Right Side -->
                    </div>
                </div>
            </div>
            <!-- End Header -->
        </div>
        <!-- End Desktop Header -->
    </div>
    <!-- End Main Header -->
    <?php //dd($menus->children); ?>

    <!-- Mobile Menu -->
    <div class="mobile-nav-wrapper" role="navigation">
        <div class="closemobileMenu"><i class="icon an an-times-circle closemenu"></i> Close Menu</div>
        <ul id="MobileNav" class="mobile-nav">

           
            @foreach ($menus->children->where('parent_id',null) as $page)
            <li class="lvl1  parent megamenu">
                <a href="{{$page->link}}">{{$page->title}} 
                    @if(count($page->children) > 0) 
                     <i class="an an-plus"></i>
                    @endif 
                </a>

                @if(count($page->children) > 0)
                <ul>
                    @foreach ($page->children as $chil_page)
                     <li><a href="{{$chil_page->link}}" class="site-nav">{{$chil_page->title}}</a></li>
                    @endforeach
                </ul>
                @endif
            </li>
            @endforeach
        </ul>
    </div>
    <!-- End Mobile Menu -->


    <!-- Body Content -->
   @yield('content')
    <!-- End Body Content -->

    <!-- Footer -->
    <footer id="footer" class="footer-4">
        <div class="site-footer">
            <div class="footer-top">
                <div class="container">
                    <!-- Footer Links -->
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                            <h4 class="h4">About Store</h4>
                            <ul>
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">Privacy policy</a></li>
                                <li><a href="#">Terms &amp; condition</a></li>
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">Orders and Returns</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                            <h4 class="h4">Help</h4>
                            <ul>
                                <li><a href="#">FAQs</a></li>
                                <li><a href="#">My Orders</a></li>
                                <li><a href="#">Terms And Conditions</a></li>
                                <li><a href="#">Shipping Policy</a></li>
                                <li><a href="#">Returns &amp; Exchange</a></li>
                                <li><a href="#">Ordering &amp; Payment</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 newsletter">
                            <div class="display-table">
                                <div class="display-table-cell footer-newsletter">
                                    <form action="#" method="post">
                                        <label class="h4">Newsletter</label>
                                        <p>sign up for newsletter to know our latest news and offers.</p>
                                        <div class="input-group">
                                            <input type="email" class="input-group__field newsletter__input" name="EMAIL" value="" placeholder="Email address" required />
                                            <span class="input-group__btn">
                                                <button type="submit" class="btn newsletter__submit" name="commit" id="Subscribe"><span class="newsletter__submit-text--large">Sign Up</span></button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 socialPayment">
                            <div class="item">
                                <h4 class="h4 mt-4 mt-md-0">Stay Connected</h4>
                                <ul class="list--inline site-footer__social-icons social-icons social-colorfull">
                                    <li><a class="social-icons__link d-inline-block" href="#" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Facebook"><i class="icon an an-facebook"></i></a></li>
                                    <li><a class="social-icons__link d-inline-block" href="#" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Twitter"><i class="icon an an-twitter"></i> <span class="icon__fallback-text">Twitter</span></a></li>
                                    <li><a class="social-icons__link d-inline-block" href="#" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Pinterest"><i class="icon an an-pinterest-p"></i> <span class="icon__fallback-text">Pinterest</span></a></li>
                                    <li><a class="social-icons__link d-inline-block" href="#" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Instagram"><i class="icon an an-instagram"></i> <span class="icon__fallback-text">Instagram</span></a></li>
                                    <li><a class="social-icons__link d-inline-block" href="#" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="YouTube"><i class="icon an an-youtube"></i> <span class="icon__fallback-text">YouTube</span></a></li>
                                </ul>
                            </div>
                            <div class="item">
                                <h4 class="h4 mt-4 mt-md-4">Payment Options</h4>
                                <ul class="payment-icons list--inline">
                                    <li><i class="icon an an-cc-visa" aria-hidden="true"></i></li>
                                    <li><i class="icon an an-cc-mastercard" aria-hidden="true"></i></li>
                                    <li><i class="icon an an-cc-amex" aria-hidden="true"></i></li>
                                    <li><i class="icon an an-cc-paypal" aria-hidden="true"></i></li>
                                    <li><i class="icon an an-cc-discover" aria-hidden="true"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Footer Links -->
                </div>
            </div>

            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <!-- Footer Copyright -->
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 copyright text-center"><span>&copy; 2021 DIVA.</span> All Rights Reserved.</div>
                        <!-- End Footer Copyright -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- Scoll Top -->
    <div id="site-scroll"><i class="icon an an-angle-up"></i></div>
    <!-- End Scoll Top -->

    <!-- Minicart Drawer -->
    <div class="minicart-right-drawer right modal fade" id="minicart-drawer" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="minicart-header">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i class="an an-times" aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="left" title="Close"></i></button>
                    <h4 class="modal-title" id="myModalLabel2">Shopping Cart <strong>{{count($carts)}}</strong> items</h4>
                </div>
                <div class="minicart-body">

                    <div style="display: {{count($carts) ? 'none' : 'block'}}" class="empty-cart">
                        <p>You have no items in your shopping cart.</p>
                    </div>
                    <div id="drawer-minicart" class="block block-cart">
                        <ul class="mini-products-list">
                            @foreach ($carts as $item)
                                
                            <li class="item">
                                <a class="product-image" href="{{URL::to('/products')}}/{{$item['id']}}">
                                <img src="{{asset('theme/'.$item['image'])}}" alt="Frayed Layered Sleeve" title=""></a>
                                <div class="product-details">
                                    <a href="{{URL::to('/cart/remove')}}/{{$item['variation_id']}}" 
                                    class="remove" 
                                    data-bs-toggle="tooltip" 
                                    data-bs-placement="top" 
                                    title="Remove"><i class="an an-times" aria-hidden="true"></i></a>

                                    <a href="{{URL::to('/cart')}}" 
                                    class="edit-i remove" 
                                    data-bs-toggle="tooltip" 
                                    data-bs-placement="top" 
                                    title="Edit"><i class="an an-edit" aria-hidden="true"></i>
                                    </a>

                                    <a class="pName" 
                                    href="{{URL::to('/products')}}/{{$item['id']}}">{{$item['title']}}
                                    </a>

                                    <div class="variant-cart">SKU:{{$item['sku']}}</div>
                                    <div class="m-0 wrapQtyBtn clearfix">
                                        <span class=" label">Qty:{{$item['quantity']}}</span>
                                    </div>

                                    <div class="m-0 priceRow clearfix">
                                        <div class="product-price">
                                            Price:<span class="money">${{$item['price']}}</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach

                            
                       
                        </ul>
                    </div>
                </div>
                <div class="minicart-footer minicart-action">
                    <div class="total-in">
                        {{-- <p class="label"><b>Subtotal:</b><span class="item product-price"><span class="money">$427.00</span></span></p>
                        <p class="label"><b>Shipping:</b><span class="item product-price"><span class="shipping">$10.00</span></span></p>
                        <p class="label"><b>Tax:</b><span class="item product-price"><span class="tax">$0.00</span></span></p> --}}

                        <p class="label"><b>Total:</b><span class="item product-price"><span class="totals">$0.00</span></span></p>
                    </div>
                    <div class="buttonSet d-flex flex-row align-items-center text-center">
                        <a href="{{URL::to('/cart')}}" class="btn btn-secondary w-50 me-3">View Cart</a>
                        <a href="checkout.html" class="btn btn-secondary w-50">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Minicart Drawer -->

    <!-- Addtocart Added Popup -->
    <div id="open-addtocart-popup" class="addtocart-popup magnific-popup mfp-hide">
        <div class="addtocart-inner text-center clearfix">
            <h4>Added to your shopping cart.</h4>
            <div class="pro-img">
                <img class="img-fluid blur-up lazyload" src="{{asset('theme/assets/images/product-images/addtocart-popup.jpg')}}" data-src="{{asset('theme/assets/images/product-images/addtocart-popup.jpg')}}" alt="image" title="image" />
            </div>
            <div class="pro-details">
                <p class="pro-name mb-0">Floral Lined Jacket</p>
                <p class="pro-cz mb-0">Gray / XL</p>
                <p class="mb-0 qty-tol">1 X $113.88</p>
                <div class="addcart-total">
                    Total: <b class="price">$113.88</b>
                </div>
                <div class="button-action">
                    <button class="btn btn-secondary continue-shopping close-popup">Continue Shopping</button>
                    <a href="cart.html" class="btn btn-primary view-cart">View Cart</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Addtocart Added Popup -->

   

    <!-- Wishlist Added Popup -->
    <div id="open-wishlist-popup" class="wishlist-popup magnific-popup mfp-hide">
        <div class="wishlist-inner text-center clearfix">
            <h4>Successfully added in wishlist</h4>
            <div class="pro-img">
                <img class="img-fluid blur-up lazyload" src="{{asset('theme/assets/images/product-images/addwishlist-popup.jpg')}}" data-src="{{asset('theme/assets/images/product-images/addwishlist-popup.jpg')}}" alt="image" title="image" />
            </div>
            <div class="pro-details">
                <p class="pro-name mb-2">Frayed Layered Sleeve</p>
                <div class="button-action">
                    <button class="btn btn-secondary mb-2 continue-shopping close-popup">Continue Shopping</button>
                    <a href="wishlist.html" class="btn btn-primary view-wishlist">View Wishlist</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Wishlist Added Popup -->

</div>
<!-- End Page Wrapper -->






   

        

        <!-- Including Javascript -->
        <script src="{{asset('theme/assets/js/plugins.js')}}"></script>
        <script src="{{asset('theme/assets/js/main.js')}}"></script>
        <script src="{{asset('admin/assets/node_modules/toast-master/js/jquery.toast.js')}}"></script>

        @if(Session::get('success'))
        <script> 
        $.toast({
                heading: "{{Session::get('success')}}",
                // text: "{{Session::get('success')}}",
                position: 'top-right',
                loaderBg: '#ff6849',
                icon: 'info',
                hideAfter: 3500,
                stack: 6,
            });
        </script>
        @endif
    
        @if(Session::get('error'))
        <script> 
          $.toast({
                heading: "{{Session::get('error')}}",
                // text: "{{Session::get('success')}}",
                position: 'top-right',
                loaderBg: '#ff6849',
                icon: 'error',
                hideAfter: 3500,
                stack: 6,
            });
        </script>
        @endif
    
        @if(Session::get('warning'))
        <script> 
          $.toast({
                heading: "{{Session::get('warning')}}",
                // text: "{{Session::get('success')}}",
                position: 'top-right',
                loaderBg: '#ff6849',
                icon: 'warning',
                hideAfter: 3500,
                stack: 6,
            });
        </script>
        @endif
  
        @yield('js')
   </body>
  </html>