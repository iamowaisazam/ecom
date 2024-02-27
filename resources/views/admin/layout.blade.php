<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('admin/assets/images/favicon.png')}}">
    <title>Elite Admin Template - The Ultimate</title>

    <!-- ============================================================== -->
    <!-- Plugins -->
    <!-- ============================================================== -->
    <link href="{{asset('admin/assets/node_modules/morrisjs/morris.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/node_modules/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/css/style.css')}}" rel="stylesheet">
    <style>
        .menu-button:hover{
            color: #03a9f3;
        }
    </style>    
    @yield('css')
  
</head>
<body class="skin-blue fixed-layout">
    
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Elite admin</p>
        </div>
    </div>
    
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="{{asset('admin/assets/images/logo-icon.png')}}" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="{{asset('admin/assets/images/logo-light-icon.png')}}" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         <!-- dark Logo text -->
                         <img src="{{asset('admin/assets/images/logo-text.png')}}" alt="homepage" class="dark-logo" />
                         <!-- Light Logo text -->    
                         <img src="{{asset('admin/assets/images/logo-light-text.png')}}" class="light-logo" alt="homepage" /></span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                
                <div class="navbar-collapse">
                    
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav me-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item">
                            <form class="app-search d-none d-md-block d-lg-block">
                                <input type="text" class="form-control" placeholder="Search & enter">
                            </form>
                        </li>
                    </ul>
                    
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="ti-email"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end mailbox animated bounceInDown">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            <a href="javascript:void(0)">
                                                <div class="btn btn-danger btn-circle text-white"><i class="fa fa-link"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)">
                                                <div class="btn btn-success btn-circle text-white"><i class="ti-calendar"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Event today</h5> <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)">
                                                <div class="btn btn-info btn-circle text-white"><i class="ti-settings"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Settings</h5> <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)">
                                                <div class="btn btn-primary btn-circle"><i class="ti-user"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center link" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->


        
                      
                      
                       


                        <!-- ============================================================== -->
                        <!-- User Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <img src="{{asset('admin/assets/images/users/1.jpg')}}" alt="user" class=""> 
                              <span class="hidden-md-down">Mark &nbsp;<i class="fa fa-angle-down"></i></span> 
                            </a>
                            <div class="dropdown-menu dropdown-menu-end animated flipInY">
                                <a href="javascript:void(0)" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="ti-wallet"></i> Change Password</a>
                                
                                <a href="javascript:void(0)" class="right-side-toggle dropdown-item"><i class="ti-settings"></i> Settings</a>
                              
                                <a href="{{URL::to('/admin/logout')}}" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End User Profile -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
      


        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">

                        <li><a class=" waves-effect waves-dark" href="{{URL::to('admin/dashboard')}}" 
                            aria-expanded="false"><i class="icon-speedometer"></i>
                            <span class="hide-menu">Dashboard</span></a>
                        </li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-user"></i>
                            <span class="hide-menu"> Users </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{URL::to('admin/users/create')}}">Add New User</a></li>
                                <li><a href="{{URL::to('admin/users/index')}}">All Users</a></li>
                            </ul>
                        </li>
                        
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-puzzle"></i>
                            <span class="hide-menu"> Roles </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{URL::to('admin/roles/create')}}">Add New Role</a></li>
                                <li><a href="{{URL::to('admin/roles/index')}}">All Roles</a></li>
                            </ul>
                        </li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-user"></i>
                            <span class="hide-menu"> Category </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{URL::to('admin/categories/create')}}">Add New Category</a></li>
                                <li><a href="{{URL::to('admin/categories/index')}}">All Category</a></li>
                            </ul>
                        </li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-user"></i>
                            <span class="hide-menu"> Products </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li> 
                                    <div class="button-box">
                                    <button style="padding: 7px 35px 7px 15px;background: transparent;
                                    border: none;" type="button" class="menu-button" data-bs-toggle="modal" data-bs-target="#exampleModal" data-whatever="@mdo">Add New Product</button>
                                </div>
                                </li>
                                <li><a href="{{URL::to('admin/products/index')}}">All Products</a></li>
                            </ul>
                        </li>

             

                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-puzzle"></i>
                            <span class="hide-menu"> Filemanager </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{URL::to('admin/filemanager/create')}}">Add New File</a></li>
                                <li><a href="{{URL::to('admin/filemanager')}}">All Files</a></li>
                            </ul>
                        </li>

                        
                        {{-- <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-doc"></i>
                            <span class="hide-menu">Pages</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="index.html">Add New Page</a></li>
                                <li><a href="index2.html">All Pages</a></li>
                            </ul>
                        </li> --}}

                        {{-- <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class=" icon-book-open"></i>
                            <span class="hide-menu">Blog Category</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{URL::to('admin/blogcategories/create')}}">Add New Category</a></li>
                                <li><a href="{{URL::to('admin/blogcategories/index')}}">All Category</a></li>
                            </ul>
                        </li> --}}

                        {{-- <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class=" icon-book-open"></i>
                            <span class="hide-menu">Blogs</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{URL::to('admin/blogs/create')}}">Add New Blog</a></li>
                                <li><a href="{{URL::to('admin/blogs/index')}}">All Blogs</a></li>
                            </ul>
                        </li> --}}
                        
                        {{-- <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-settings"></i>
                            <span class="hide-menu">Settings</span></a>
                            <ul aria-expanded="false" class="collapse">
                               @foreach (explode(',',$global_d['grouping']) as $item)
                                <li><a href="{{URL::to('admin/settings/edit')}}?group={{$item}}">
                                  {{ ucwords(str_ireplace("_", " ",$item))}}</a></li>  
                               @endforeach
                            </ul>
                        </li> --}}

                    </ul>
                </nav>
            </div>
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">

              @yield('content')

            <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="post" action="{{URL::to('/admin/products/store')}}">
                            @csrf
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel1">Add New Product</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                        </div>
                        <div class="modal-body">
                           
                                <div class="form-group">
                                    <label for="recipient-name" class="form-label">Title:</label>
                                    <input name="title" required type="text" class="form-control" id="recipient-name1">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="form-label">Product Type :</label>
                                    <select required class="form-control" name="type">
                                        <option value="single">Single</option>
                                        <option value="variation">Variation</option>
                                    </select>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary text-white">Submit</button>
                        </div>
                       </form>
                    </div>
                </div>
            </div>
            <!-- /.modal -->


            
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Theme Settings <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-skin="skin-default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-red" class="red-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-blue" class="blue-theme working">4</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-megna" class="megna-theme">6</a></li>
                                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                                <li><a href="javascript:void(0)" data-skin="skin-default-dark" class="default-dark-theme ">7</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-megna-dark" class="megna-dark-theme ">12</a></li>
                            </ul>
                      
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->


            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
      
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
      
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            © 2021 Eliteadmin by themedesigner.in
            <a href="https://www.wrappixel.com/">WrapPixel</a>
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
   
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->



    <!-- ============================================================== -->
    <!-- This Gloab JS -->
    <!-- ============================================================== -->
    <script src="{{asset('admin/assets/node_modules/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('admin/assets/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('admin/assets/node_modules/raphael/raphael-min.js')}}"></script>
    <script src="{{asset('admin/assets/node_modules/morrisjs/morris.min.js')}}"></script>
    <script src="{{asset('admin/assets/node_modules/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('admin/assets/node_modules/toast-master/js/jquery.toast.js')}}"></script>
    <script src="{{asset('admin/assets/js/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/waves.js')}}"></script>
    <script src="{{asset('admin/assets/js/custom.js')}}"></script>

  
 


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


    <!-- ============================================================== -->
    <!-- Pages JS -->
    <!-- ============================================================== -->
    @yield('js')
    
 </body>
</html>