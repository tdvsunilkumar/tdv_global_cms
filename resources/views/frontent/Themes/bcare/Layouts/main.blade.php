<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ (isset($data['page']['page_title'])?$data['page']['page_title']: config('app.name', 'Laravel') )}}</title>
    <meta name="description" content="{{ (isset($data['page']->page_description)?$data['page']->page_description: 'description' )}}">
    <meta name="keywords" content="{{ (isset($data['page']->page_keywords)?$data['page']->page_keywords: 'keywords' )}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{$image_asset_path.(isset($globalSettings['website_logo'])?$globalSettings['website_favicon']:'')}}">

    <!-- All css files are included here. -->
    <!-- All Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,400&amp;family=Vollkorn:ital,wght@0,400;0,700;1,400&amp;display=swap" rel="stylesheet">

    <!-- ::::::::::::::All CSS Files here :::::::::::::: -->
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{$frontend_asset_path}}Themes/bcare/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="{{$frontend_asset_path}}Themes/bcare/css/vendor/jquery-ui.min.css">
    <link rel="stylesheet" href="{{$frontend_asset_path}}Themes/bcare/css/vendor/material-design-iconic-font.min.css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="{{$frontend_asset_path}}Themes/bcare/css/plugins/animate-slider.css">
    <link rel="stylesheet" href="{{$frontend_asset_path}}Themes/bcare/css/plugins/animate.css">
    <link rel="stylesheet" href="{{$frontend_asset_path}}Themes/bcare/css/plugins/lightbox.css">
    <link rel="stylesheet" href="{{$frontend_asset_path}}Themes/bcare/css/plugins/magnific-popup.css">
    <link rel="stylesheet" href="{{$frontend_asset_path}}Themes/bcare/css/plugins/meanmenu.css">
    <link rel="stylesheet" href="{{$frontend_asset_path}}Themes/bcare/css/plugins/owl-carousel.css">
    <link rel="stylesheet" href="{{$frontend_asset_path}}Themes/bcare/css/plugins/slick-theme.css">
    <link rel="stylesheet" href="{{$frontend_asset_path}}Themes/bcare/css/plugins/slick.css">
    <link rel="stylesheet" href="{{$frontend_asset_path}}Themes/bcare/css/plugins/slim-10_7.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{$frontend_asset_path}}Themes/bcare/style.css">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{$frontend_asset_path}}Themes/bcare/css/responsive.css">

</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- Start Header Style -->
        <div id="header" class="header">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__menu__wrap bg-white sticky__header d-none d-md-block">
                <div class="mainmenu__menu__inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-12">
                                <div class="logo">
                                    <a href="{{ route('home') }}"><img src="{{$image_asset_path.(isset($globalSettings['website_logo'])?$globalSettings['website_logo']:'')}}" alt="logo"></a>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-10">
                                <!-- Start Mainmenu -->
                                <nav class="mainmenu__nav">
                                    <ul class="main__menu">
                                        <li class="drop"><a href="{{ route('home') }}">home</a>
                                            <ul class="dropdown">
                                                <li><a href="index-animation-text-1.html">animation text 1</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="gallery.html">gallery</a></li>
                                        <li><a href="about.html">about us</a></li>
                                        <li class="drop"><a href="#">pages</a>
                                            <ul class="dropdown">
                                                <li><a href="blog-list.html">blog list</a></li>
                                                <li><a href="blog-details.html">blog details</a></li>
                                                <li><a href="shop-grid.html">shop grid</a></li>
                                                <li><a href="shop-list.html">shop list</a></li>
                                                <li><a href="product-details.html">Product details</a></li>
                                                <li><a href="team.html">team</a></li>
                                                <li><a href="team-details.html">team details</a></li>
                                                <li><a href="service.html">service</a></li>
                                                <li><a href="cart.html">cart</a></li>
                                                <li><a href="wishlist.html">wishlist</a></li>
                                                <li><a href="appoinment.html">appoinment</a></li>
                                            </ul>
                                        </li>
                                        <li class="drop"><a href="product-details.html">shop</a>
                                            <ul class="dropdown">
                                                <li><a href="shop-grid.html">shop grid</a></li>
                                                <li><a href="shop-list.html">shop list</a></li>
                                                <li><a href="product-details.html">Product details</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">contact us</a></li>
                                    </ul>
                                </nav>
                                <!-- End Mainmenu -->
                            </div>
                            <div class="col-lg-1 col-md-2 position-relative">
                                <div class="cart__search">
                                    <ul class="cart__search__list">
                                        <li class="cart__menu"><a href="#"><i class="zmdi zmdi-shopping-cart"></i></a>
                                            <span class="badge--cart">2</span>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Start Shopping basket -->
                                <div class="dropdown__shopping__basket">
                                    <div class="shopping__basket_notices d-flex justify-content-between">
                                        <em class="color main-font">Your Total item (02)</em>
                                        <span class="close icon-clear"><i class="zmdi zmdi-close"></i></span>
                                    </div>
                                    <div class="top-cart-content">
                                        <ul class="mini-products-list">
                                            <li>
                                                <a class="shopping-image" href="single-product.html">
                                                    <img alt="images" src="images/product/sm-img/1.png">
                                                </a>
                                                <div class="shopping-product-details">
                                                    <p class="cartproduct-name">
                                                        <a href="single-product.html">Pellentesque habitant </a>
                                                    </p>
                                                    <strong class="qty">qty:1</strong>
                                                    <span class="sig-price">$222.00</span>                
                                                </div>
                                                <div class="shopping-pro-action">
                                                    <a class="btn-remove" href="#">remove</a>
                                                    <a class="btn-edit" href="#">edit</a>
                                                </div>
                                            </li>
                                            <!-- single item -->
                                            <li>
                                                <a class="shopping-image" href="single-product.html">
                                                    <img alt="images" src="images/product/sm-img/1.png">
                                                </a>
                                                <div class="shopping-product-details">
                                                    <p class="cartproduct-name">
                                                        <a href="single-product.html">Pellentesque habitant </a>
                                                    </p>
                                                    <strong class="qty">qty:1</strong>
                                                    <span class="sig-price">$222.00</span>                
                                                </div>
                                                <div class="shopping-pro-action">
                                                    <a class="btn-remove" href="#">remove</a>
                                                    <a class="btn-edit" href="#">edit</a>
                                                </div>
                                            </li>
                                            <!-- single item -->
                                        </ul>
                                        <div class="top-subtotal">
                                            Subtotal: <span class="sig-price">$444.00</span>
                                        </div>
                                        <div class="cart-actions">
                                            <button class="cart-btn"><span>Checkout</span></button>
                                        </div>
                                    </div>                                            
                                </div>
                                <!-- End Shopping basket -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Mainmenu Area -->
            <!-- Mobile-menu-area start -->
            <div class="mobile-menu-area d-block d-md-none">
                <div class="fluid-container mobile-menu-container">
                    <div class="mobile-logo"><a href="index.html"><img src="images/logo/best-care.png" alt="Mobile logo"></a></div>
                    <div class="mobile-menu clearfix">
                        <nav id="mobile_dropdown">
                            <ul>
                                <li><a href="index.html">home</a>
                                    <ul>
                                        <li><a href="index-animation-text-1.html">animation text 1</a></li>
                                    </ul>
                                </li>
                                <li><a href="about.html">about</a></li>
                                <li><a href="gallery.html">gallery</a></li>
                                <li><a href="#">pages</a>
                                    <ul>
                                        <li><a href="blog-list.html">blog list</a></li>
                                        <li><a href="blog-details.html">blog details</a></li>
                                        <li><a href="shop-grid.html">shop grid</a></li>
                                        <li><a href="shop-list.html">shop list</a></li>
                                        <li><a href="product-details.html">Product details</a></li>
                                        <li><a href="team.html">team</a></li>
                                        <li><a href="team-details.html">team details</a></li>
                                        <li><a href="service.html">service</a></li>
                                        <li><a href="cart.html">cart</a></li>
                                        <li><a href="wishlist.html">wishlist</a></li>
                                        <li><a href="appoinment.html">appoinment</a></li>
                                    </ul>
                                </li>
                                <li><a href="product-details.html">shop</a>
                                    <ul>
                                        <li><a href="shop-grid.html">shop grid</a></li>
                                        <li><a href="shop-list.html">shop list</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">contact us</a></li>
                            </ul>
                        </nav>
                    </div>  
                </div>
            </div>
            <!-- Mobile-menu-area End -->
        </div>
        <!-- End Header Style -->

        <!-- Content Part Goes Here -->
         @yield('content')
        <!-- Content Part Goes Here -->

        <!-- Start Footer Area -->
        <footer id="footer__area" class="footer__area">
            <div class="footer-wrap pt--40 pb--70 ftr-bg bg__cat--1 smptb--60 xsptb--40"> 
                <div class="container">
                    <div class="footer__container">
                        <div class="row mt--40">
                            <!--Start Single Footer wrap -->
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="single__footer__widget">
                                    <h2 class="footer-title">Contact Us</h2>
                                    <div class="footer__details">
                                        <!--Start Single Footer address -->
                                        <div class="single__footer__address">
                                            <div class="footer__icon">
                                                <i class="zmdi zmdi-pin"></i>
                                            </div>
                                            <div class="footer__address">
                                                <p>{{ (isset($globalSettings['company_name'])?$globalSettings['company_name']: 'Address' )}}</p>
                                            </div>
                                        </div>
                                        <!--End Single Footer address -->
                                        <!--Start Single Footer address -->
                                        <div class="single__footer__address">
                                            <div class="footer__icon">
                                                <i class="zmdi zmdi-email"></i>
                                            </div>
                                            <div class="footer__address">
                                                <p><a href="mailto:{{ (isset($globalSettings['contact_email'])?$globalSettings['contact_email']: 'test@test.com' )}}" target="_top">{{ (isset($globalSettings['contact_email'])?$globalSettings['contact_email']: 'test@test.com' )}}</a></p>
                                            </div>
                                        </div>
                                        <!--End Single Footer address -->
                                        <!--Start Single Footer address -->
                                        <div class="single__footer__address">
                                            <div class="footer__icon">
                                                <i class="zmdi zmdi-phone"></i>
                                            </div>
                                            <div class="footer__address">
                                                <p><a href="tel:+66025644424857">{{ (isset($globalSettings['contact_tel'])?$globalSettings['contact_tel']: '+91 9999999999' )}}</a></p>
                                            </div>
                                        </div>
                                        <!--End Single Footer address -->
                                    </div>
                                </div>
                            </div>
                            <!--End Single Footer wrap -->
                            <!--Start Single Footer wrap -->
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="single__footer__widget our--links">
                                    <h2 class="footer-title">Quick links</h2>
                                    <ul class="footer-menu">
                                        <li><a href="#"><i class="zmdi zmdi-caret-right"></i>About Us</a></li>
                                        <li><a href="#"><i class="zmdi zmdi-caret-right"></i>Our History</a></li>
                                        <li><a href="#"><i class="zmdi zmdi-caret-right"></i>Medicine Management</a></li>
                                        <li><a href="#"><i class="zmdi zmdi-caret-right"></i>Doctor’s Forum</a></li>
                                        <li><a href="#"><i class="zmdi zmdi-caret-right"></i>News</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!--End Single Footer wrap -->
                            <!--Start Single Footer wrap -->
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="single__footer__widget useful--links">
                                    <h2 class="footer-title">Useful Links</h2>
                                    <ul class="footer-menu">
                                        <li><a href="#"><i class="zmdi zmdi-caret-right"></i>Special Services</a></li>
                                        <li><a href="#"><i class="zmdi zmdi-caret-right"></i>Sitemap</a></li>
                                        <li><a href="#"><i class="zmdi zmdi-caret-right"></i>Privacy Policy</a></li>
                                        <li><a href="#"><i class="zmdi zmdi-caret-right"></i>Surgery</a></li>
                                        <li><a href="#"><i class="zmdi zmdi-caret-right"></i>Terms of Services</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!--End Single Footer wrap -->
                            <!--Start Single Footer wrap -->
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="single__footer__widget newsletter">
                                    <h2 class="footer-title">Email Newsletters</h2>
                                    <div class="newsletter__area">
                                        <p>Lorem ipsum dolor sit amet, consecttui us adip isicing elit, sed do edunt.</p>
                                        
                                        <div id="mc_embed_signup">
                                            <form action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                                                <div id="mc_embed_signup_scroll">
                                                    <div class="footer__input">
                                                        <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Email Address" required>
                                                    </div>
                                                    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" tabindex="-1" value=""></div>
                                                    <div class="clearfix subscribe__btn"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="bst__btn btn--white__color"></div>
                                                </div>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <!--End Single Footer wrap -->
                        </div>
                    </div>
                </div>
            </div>
            <!--End Footer Area  -->
            <!--Start Footer Botter Area  -->
            <div class="footer__bottom__area bg__cat--2">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="footer__bottom">
                                <div class="ft__btm__inner">
                                    <p>Copyright © 2021 <a href="https://themeforest.net/user/salmonthemes">SalmonThemes</a>All Right Reserved.</p>
                                </div>
                                <ul class="ft__btm__social__icon">
                                    <li><a href="#/"><i class="zmdi zmdi-dribbble"></i></a></li>
                                    <li><a href="#/"><i class="zmdi zmdi-pinterest"></i></a></li>
                                    <li><a href="#/"><i class="zmdi zmdi-twitter"></i></a></li>
                                    <li><a href="#/"><i class="zmdi zmdi-instagram"></i></a></li>
                                    <li><a href="#/"><i class="zmdi zmdi-facebook"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>                
                </div>
            </div>                
        </footer>
        <!-- End Footer Area -->
    </div>
    <!-- Body main wrapper end -->

    <!-- ::::::::::::::All JS Files here :::::::::::::: -->
    <!-- Global Vendor, plugins JS -->
    <script src="{{$frontend_asset_path}}Themes/bcare/js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="{{$frontend_asset_path}}Themes/bcare/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="{{$frontend_asset_path}}Themes/bcare/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <script src="{{$frontend_asset_path}}Themes/bcare/js/vendor/bootstrap.min.js"></script>
    <script src="{{$frontend_asset_path}}Themes/bcare/js/vendor/jquery-ui.min.js"></script>
    
    <!--Plugins JS-->
    <script src="{{$frontend_asset_path}}Themes/bcare/js/plugin/ajax-mail.js"></script>
    <script src="{{$frontend_asset_path}}Themes/bcare/js/plugin/imagesloaded.pkgd.min.js"></script>
    <script src="{{$frontend_asset_path}}Themes/bcare/js/plugin/isotope.pkgd.min.js"></script>
    <script src="{{$frontend_asset_path}}Themes/bcare/js/plugin/waypoints.min.js"></script>
    <script src="{{$frontend_asset_path}}Themes/bcare/js/plugin/jquery.counterup.js"></script>
    <script src="{{$frontend_asset_path}}Themes/bcare/js/plugin/jquery.magnific-popup.min.js"></script>
    <script src="{{$frontend_asset_path}}Themes/bcare/js/plugin/jquery.meanmenu.min.js"></script>
    <script src="{{$frontend_asset_path}}Themes/bcare/js/plugin/owl.carousel.min.js"></script>
    <script src="{{$frontend_asset_path}}Themes/bcare/js/plugin/wow.min.js"></script>
    <script src="{{$frontend_asset_path}}Themes/bcare/js/plugin/scrollup.min.js"></script>
    <script src="{{$frontend_asset_path}}Themes/bcare/js/plugin/animate-text.js"></script>
    <script src="{{$frontend_asset_path}}Themes/bcare/js/plugin/slick.min.js"></script>
    <script src="{{$frontend_asset_path}}Themes/bcare/js/plugin/style-customizer.js"></script>
    
    <!-- Main JS -->
    <script src="{{$frontend_asset_path}}Themes/bcare/js/main.js"></script>

</body>


<!-- Mirrored from template.hasthemes.com/bcare/bcare/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Jun 2022 09:58:16 GMT -->
</html>