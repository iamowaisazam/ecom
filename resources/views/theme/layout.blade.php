
<?php 

   $main_menu = $global_d['menus']->where('slug','main-menu')->first();
//    dd($main_menu); 

   $footer_menu1 = $global_d['menus']->where('slug','footer-menu-1')->first();
   $footer_menu2 = $global_d['menus']->where('slug','footer-menu-2')->first();

?>


<!DOCTYPE html>
<html lang="en">
<head>

    @yield('metatags')

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    
    <!-- Plugins CSS -->
       <link rel="shortcut icon" href="{{asset($global_d['logo'] ? 'public/'.$global_d['logo']->path : '')}}">
       <link rel="stylesheet" href="{{asset('public/theme/assets/css/plugins.css')}}" />
       <link href="{{asset('public/admin/assets/node_modules/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
       <link rel="stylesheet" href="{{asset('public/theme/assets/css/style.css')}}" />
       <link rel="stylesheet" href="{{asset('public/theme/assets/css/responsive.css')}}" />
       <link href="{{asset('public/admin/assets/node_modules/toast-master/css/jquery.toast.css')}}" rel="stylesheet">

    @yield('css')
</head>
<body class="template-index diva home8-simple">
  
  <!-- Page Loader -->
  <div id="pre-loader">
     <img src="{{asset('public/theme/assets/images/loader.gif')}}" />
   </div>
  <!-- End Page Loader -->

  <!-- Page Wrapper -->
  <div class="pageWrapper">

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

            <div class="top-header d-block ">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-10 col-sm-8 col-md-7 col-lg-4">
                            <p class="phone-no float-start"><i class="icon an an-phone me-1"></i>
                                <a href="tel:+4400(111)044833">{{$global_d['phone_number']}}</a></p>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4 d-none d-md-none d-lg-block">
                            <div class="text-center">
                                <p class="top-header_middle-text">{{$global_d['topbar_title']}}</p>
                            </div>
                        </div>
                        <div class="col-2 col-sm-4 col-md-5 col-lg-4 text-end d-none d-sm-block d-md-block d-lg-block">
                            <div class="header-social">
                                <ul class="justify-content-end list--inline social-icons">
                                    @if($global_d['facebook_link'])
                                    <li>
                                        <a class="social-icons__link" 
                                            href="{{$global_d['facebook_link']}}" 
                                            target="_blank" 
                                            data-bs-toggle="tooltip" 
                                            data-bs-placement="bottom" 
                                            title="Facebook"><i class="icon an an-facebook"></i> 
                                            <span class="icon__fallback-text">Facebook</span>
                                        </a>
                                    </li>
                                    @endif

                                    @if($global_d['twitter_link'])
                                    <li><a class="social-icons__link" href="{{$global_d['twitter_link']}}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Twitter"><i class="icon an an-twitter"></i><span class="icon__fallback-text">Twitter</span></a></li>
                                    @endif


                                    @if($global_d['facebook_link'])
                                    <li><a class="social-icons__link" href="{{$global_d['facebook_link']}}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Instagram"><i class="icon an an-instagram"></i> <span class="icon__fallback-text">Instagram</span></a></li>
                                    @endif

                                    @if($global_d['youtube_link'])
                                    <li><a class="social-icons__link" href="{{$global_d['youtube_link']}}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="bottom" title="YouTube"><i class="icon icon an an-youtube"></i> <span class="icon__fallback-text">YouTube</span></a></li>
                                    @endif

                                </ul>
                            </div>
                        </div>
                        <div class="col-2 col-sm-4 col-md-5 col-lg-4 text-end d-block d-sm-none d-md-none d-lg-none">
                            <!-- Mobile User Links -->
                            <div class="user-menu-dropdown">
                                <a href="{{URL::to('/login')}}">
                                    <span class="user-menu"><i class="an an-user-alt"></i></span>
                                </a>
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
                            <a href="{{URL::to('/')}}">
                                <img 
                                   src="{{asset($global_d['logo'] ? 'public/'.$global_d['logo']->path : '')}}" width="100" 
                                   />
                            </a>
                        </div>
                        <!-- End Desktop Logo -->
                        
                        <!-- Desktop Navigation -->
                        <div class="col-2 col-sm-3 col-md-3 col-lg-7 col-xl-8 d-none d-lg-block">
                            <nav class="grid__item" id="AccessibleNav">
                                <ul id="siteNav" class="d-flex flex-wrap site-nav medium left ms-0 hidearrow">
                                      @if($main_menu)
                                        @foreach ($main_menu->children->where('parent_id',null) as $page)
                                                <li class="lvl1 parent dropdown">
                                                    <a href="{{URL::to($page->link)}} ">{{$page->title}} 
                                                    <i class="an an-angle-down"></i>
                                                    </a>
                                                @if(count($page->children) > 0)
                                                    <ul class="dropdown">
                                                        @foreach ($page->children as $chil_page)
                                                        <li>
                                                            <a href="{{URL::to($chil_page->link)}}" 
                                                            class="site-nav">{{$chil_page->title}}</a>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>  
                                        @endforeach
                                    @endif
                                </ul>
                            </nav>
                        </div>
                        <!-- End Desktop Navigation -->

                        <!-- Right Side -->
                        <div class="col-4 col-sm-4 col-md-5 col-lg-3 col-xl-2">
                            <div class="right-action text-action d-flex-align-center justify-content-end">

                                <div class="item site-user-menu d-none d-sm-inline-block">
                                    <a href="{{URL::to('/login')}}" class="icon-login text-capitalize text-nowrap"><i class="icon an an-user-alt"></i><span class="text align-middle ms-1 d-none d-md-inline-block">Login</span></a>
                                </div>
                              
                                <div class="item site-cart">
                                    <a href="{{URL::to('/cart')}}" class="icon-cart site-header-cart btn-minicart text-capitalize" data-bs-toggle="modal" data-bs-target="#minicart-drawer"><i class="icon an an-shopping-bag"></i><span class="text align-middle ms-1 d-none d-md-inline-block">Cart</span><span id="CartCount" class="site-header__cart-count1 ms-1" data-cart-render="item_count">(0)</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Header -->


    <!-- Mobile Menu -->
    <div class="mobile-nav-wrapper" role="navigation">
        <div class="closemobileMenu"><i class="icon an an-times-circle closemenu"></i> Close Menu</div>
        <ul id="MobileNav" class="mobile-nav">

            @if($main_menu)
                @foreach ($main_menu->children->where('parent_id',null) as $page)
                <li class="lvl1  parent megamenu">
                    <a href="{{URL::to($page->link)}}">{{$page->title}} 
                        @if(count($page->children) > 0) 
                        <i class="an an-plus"></i>
                        @endif 
                    </a>

                    @if(count($page->children) > 0)
                    <ul>
                        @foreach ($page->children as $chil_page)
                        <li><a href="{{URL::to($chil_page->link)}}" class="site-nav">{{$chil_page->title}}</a></li>
                        @endforeach
                    </ul>
                    @endif
                </li>
                @endforeach
            @endif
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
                            <a href="{{URL::to('/')}}">
                                <img src="{{asset($global_d['logo'] ? 'public/'.$global_d['logo']->path : '')}}" class="pb-3" />
                            </a>
                            <p>{{$global_d['site_short_details']}}</p>

                            <div class="item">
                                {{-- <h4 class="h4 mt-4 mt-md-0">Stay Connected</h4> --}}
                                <ul class="list--inline site-footer__social-icons social-icons social-colorfull">
                                    @if($global_d['facebook_link'])
                                    <li><a class="social-icons__link d-inline-block" 
                                        href="{{$global_d['facebook_link']}}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Facebook"><i class="icon an an-facebook"></i></a></li>
                                    @endif
                                    
                                    @if($global_d['twitter_link'])
                                    <li><a class="social-icons__link d-inline-block" href="{{$global_d['twitter_link']}}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Twitter"><i class="icon an an-twitter"></i> <span class="icon__fallback-text">Twitter</span></a></li>
                                    @endif

                                   
                                    @if($global_d['instagram_link'])
                                    <li><a class="social-icons__link d-inline-block" 
                                        href="{{$global_d['instagram_link']}}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Instagram"><i class="icon an an-instagram"></i> <span class="icon__fallback-text">Instagram</span></a>
                                    </li>
                                    @endif

                                    @if($global_d['youtube_link'])
                                    <li><a class="social-icons__link d-inline-block" href="{{$global_d['youtube_link']}}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="YouTube"><i class="icon an an-youtube"></i> <span class="icon__fallback-text">YouTube</span></a></li>
                                    @endif

                                </ul>
                            </div>

                        </div>

                        @if($footer_menu1)
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                            <h4 class="h4">Important Link</h4>
                            <ul>
                                @foreach ($footer_menu1->children as $item)
                                 <li>
                                    <a target="{{$item->target}}" href="{{URL::to($item->link)}}">{{$item->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        @if($footer_menu2)
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                            <h4 class="h4">Help & Policies</h4>
                            <ul>
                                @foreach ($footer_menu2->children as $item)
                                 <li>
                                    <a target="{{$item->target}}" href="{{URL::to($item->link)}}">{{$item->title}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class=" col-12 col-sm-12 col-md-3 col-lg-3 newsletter">
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

                        <div class="d-none col-12 col-sm-12 col-md-3 col-lg-3 socialPayment">
                            <div class="item">
                                <h4 class="h4 mt-4 mt-md-0">Stay Connected</h4>
                                <ul class="list--inline site-footer__social-icons social-icons social-colorfull">
                                    @if($global_d['facebook_link'])
                                    <li><a class="social-icons__link d-inline-block" 
                                        href="{{$global_d['facebook_link']}}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Facebook"><i class="icon an an-facebook"></i></a></li>
                                    @endif
                                    
                                    @if($global_d['twitter_link'])
                                    <li><a class="social-icons__link d-inline-block" href="{{$global_d['twitter_link']}}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Twitter"><i class="icon an an-twitter"></i> <span class="icon__fallback-text">Twitter</span></a></li>
                                    @endif

                                   
                                    @if($global_d['instagram_link'])
                                    <li><a class="social-icons__link d-inline-block" 
                                        href="{{$global_d['instagram_link']}}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Instagram"><i class="icon an an-instagram"></i> <span class="icon__fallback-text">Instagram</span></a>
                                    </li>
                                    @endif

                                    @if($global_d['youtube_link'])
                                    <li><a class="social-icons__link d-inline-block" href="{{$global_d['youtube_link']}}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="YouTube"><i class="icon an an-youtube"></i> <span class="icon__fallback-text">YouTube</span></a></li>
                                    @endif

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
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 copyright text-center">
                            <span>&copy; 2024 Azamsolutions</span> All Rights Reserved.
                        </div>
                        <!-- End Footer Copyright -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
  
    <!-- Scoll Top -->
    <div id="site-scroll"><i class="icon an an-angle-up"></i></div>

    <div class="minicart-right-drawer right modal fade" 
         id="minicart-drawer" 
         tabindex="-1" 
         aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="minicart-header">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="an an-times" aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="left" title="Close"></i>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">Shopping Cart 
                        <strong>0</strong> items
                    </h4>
                </div>
                <div class="minicart-body">
                    <div id="drawer-minicart" class="block block-cart">
                        <ul class="mini-products-list">
                        

                        </ul>
                    </div>
                </div>
                <div class="minicart-footer minicart-action">
                    <div class="total-in">
                        <p class="label"><b>Total:</b>
                            <span class="item product-price">
                                <span class="totals">{{$global_d['site_currency']}} 0</span>
                            </span>
                        </p>
                    </div>
                    <div class="buttonSet d-flex flex-row align-items-center text-center">
                        <a href="{{URL::to('/cart')}}" class="btn btn-secondary w-50 me-3">View Cart</a>
                        <a href="{{URL::to('/checkout')}}" class="btn btn-secondary w-50">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Minicart Drawer -->

   

   

   

</div>
<!-- End Page Wrapper -->





        <!-- Including Javascript -->
        <script src="{{asset('public/theme/assets/js/plugins.js')}}"></script>
        <script src="{{asset('public/theme/assets/js/main.js')}}"></script>
        <script src="{{asset('public/admin/assets/node_modules/toast-master/js/jquery.toast.js')}}"></script>
        <script src="{{asset('public/theme/assets/js/cart.js')}}"></script>
        
        @if(Session::get('success'))
        <script> 
            $.toast({
                    heading: "{{Session::get('success')}}",
                    position: 'top-right',
                    loaderBg: '#ff6849',
                    icon: 'success',
                    hideAfter: 3500,
                    stack: 6,
                });
        </script>
        @endif
    
        @if(Session::get('error'))
        <script> 
            $.toast({
                heading: "{{Session::get('error')}}",
                position: 'top-right',
                loaderBg: '#ff6849',
                icon: 'error',
                hideAfter: 3500,
                stack: 6,
            });
        </script>
        @endif
    


        @yield('js')


        <script>

            let site_url = "{{URL::to('')}}";
                
        </script>
   </body>
  </html>