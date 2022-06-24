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
    <link href="{{$frontend_asset_path}}Themes/driving/assets/css/bootstrap.css" rel="stylesheet">
    <link href="{{$frontend_asset_path}}Themes/driving/assets/css/style.css" rel="stylesheet">
<!-- Responsive File -->
    <link href="{{$frontend_asset_path}}Themes/driving/assets/css/responsive.css" rel="stylesheet">
<!-- Color File -->
    <link href="{{$frontend_asset_path}}Themes/driving/assets/css/color.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">

    <!-- Responsive CSS -->

</head>

<body>  

    <div class="page-wrapper">
    <!-- Preloader -->
    <div class="loader-wrap">
        <div class="preloader"><div class="preloader-close">Preloader Close</div></div>
        <div class="layer layer-one"><span class="overlay"></span></div>
        <div class="layer layer-two"><span class="overlay"></span></div>        
        <div class="layer layer-three"><span class="overlay"></span></div>        
    </div>

    <!-- Main Header -->
    <header class="main-header header-style-one">

        <!-- Header Top -->
        <div class="header-top">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="left-column">
                        <ul class="contact-info">
                            <li><a href="mailto:{{ (isset($globalSettings['contact_email'])?$globalSettings['contact_email']: 'test@test.com' )}}"><i class="pe-7s-paper-plane"></i>{{ (isset($globalSettings['company_name'])?$globalSettings['company_name']: '' )}}</a></li>
                            <li><a href="tel:{{ (isset($globalSettings['contact_tel'])?$globalSettings['contact_tel']: '' )}}"><i class="pe-7s-mail-open"></i>{{ (isset($globalSettings['contact_email'])?$globalSettings['contact_email']: 'test@test.com' )}}</a></li>
                           
                        </ul>
                    </div>
                    <div class="right-column">
                        <ul class="social-icon">
                            @if(isset($globalSettings['socialLinks']) && !empty($globalSettings['socialLinks']))
                                @foreach($globalSettings['socialLinks'] as $icon => $link)
                                @if($link != '')
                                <li><a href="{{ $link }}"><i class="fab {{ $icon }}"></i></a></li>
                                @endif
                                @endforeach
                                @endif
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Header Upper -->
        <div class="header-upper">
            <div class="auto-container">
                <div class="inner-container">
                    <!--Logo-->
                    <div class="logo-box">
                        <div class="logo"><a href="{{ route('home') }}"><img src="{{$image_asset_path.(isset($globalSettings['website_logo'])?$globalSettings['website_logo']:'')}}" alt=""></a></div>
                    </div>
                    <div class="right-column">
                        <!--Nav Box-->
                        <div class="nav-outer">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler"><img src="assets/images/icons/icon-bar.png" alt=""></div>

                            <!-- Main Menu -->
                            <nav class="main-menu navbar-expand-md navbar-light">
                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <ul class="navigation">
                                        
                                        @if(isset($globalSettings['menues']['Header']) && !empty($globalSettings['menues']['Header']))
                                            @foreach($globalSettings['menues']['Header'] as $item)
                                            @if($item->deleted != 1)
                                            <li class="{{ (isset( $item->children))?'dropdown':'' }}"><a href="{{ ($item->slug == 'home')?route('home'):route('slug_url',$item->slug) }}">{{ ucfirst($item->name)}}</a>
                                                @if(isset( $item->children) && !empty($item->children) )
                                            <ul>
                                                @foreach($item->children as $child)
                                                <li class="{{ (isset( $child->children))?'dropdown':'' }}"><a href="{{ ($child->slug == 'home')?route('home'):route('slug_url',$child->slug) }}">{{ ucfirst($child->name) }}</a>
                                                    @if(isset( $child->children) && !empty($child->children) )
                                                    <ul>
                                                        @foreach($child->children as $subchild)
                                                        <li class="{{ (isset( $subchild->children))?'dropdown':'' }}"><a href="{{ ($subchild->slug == 'home')?route('home'):route('slug_url',$subchild->slug) }}">{{ ucfirst($subchild->name) }}</a>
                                                        @if(isset($subchild->children) && !empty($subchild->children))
                                                        <ul>
                                                            @foreach($subchild->children as $subchildren)
                                                            <li><a href="{{ ($subchildren->slug == 'home')?route('home'):route('slug_url',$subchildren->slug) }}">{{ ucfirst($subchildren->name) }}</a>
                                                            </li>
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
                                            @endif
                                        </li>
                                            @endif
                                            @endforeach
                                        @endif
                                        
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="navbar-right">
                            <button type="button" class="theme-btn search-toggler"><span class="flaticon-search-1"></span></button>
                            <div class="contact-info">
                                <div class="icon"><span class="fas fa-phone-volume"></span></div>
                                <div class="content">
                                    <h5>Learn To Drive? Call us</h5>
                                    <h4><a href="tel:{{ (isset($globalSettings['contact_tel'])?$globalSettings['contact_tel']: '' )}}">{{ (isset($globalSettings['contact_tel'])?$globalSettings['contact_tel']: '' )}}</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>                        
                </div>
            </div>
        </div>
        <!--End Header Upper-->

        <!-- Sticky Header  -->
        <div class="sticky-header">
            <div class="header-upper">
                <div class="auto-container">
                    <div class="inner-container">
                        <!--Logo-->
                        <div class="logo-box">
                            <div class="logo"><a href="{{ route('home') }}"><img src="{{$image_asset_path.(isset($globalSettings['website_logo'])?$globalSettings['website_logo']:'')}}" alt=""></a></div>
                        </div>
                        <div class="right-column">
                            <!--Nav Box-->
                            <div class="nav-outer">
                                <!--Mobile Navigation Toggler-->
                                <div class="mobile-nav-toggler"><img src="assets/images/icons/icon-bar.png" alt=""></div>
    
                                <!-- Main Menu -->
                                <nav class="main-menu navbar-expand-md navbar-light">
                                </nav>
                            </div>
                            <div class="navbar-right">
                                <button type="button" class="theme-btn search-toggler"><span class="flaticon-search-1"></span></button>
                                <div class="contact-info">
                                    <div class="icon"><span class="fas fa-phone-volume"></span></div>
                                    <div class="content">
                                        <h5>Learn To Drive? Call us</h5>
                                        <h4><a href="tel:{{ (isset($globalSettings['contact_tel'])?$globalSettings['contact_tel']: '' )}}">{{ (isset($globalSettings['contact_tel'])?$globalSettings['contact_tel']: '' )}}</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>                       
                    </div>
                </div>
            </div>
        </div><!-- End Sticky Menu -->

        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="icon flaticon-remove"></span></div>
            
            <nav class="menu-box">
                <div class="nav-logo"><a href="index.html"><img src="assets/images/logo-2.png" alt="" title=""></a></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
                <!--Social Links-->
                <div class="social-links">
                    <ul class="clearfix">
                        <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                        <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
                        <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                        <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                        <li><a href="#"><span class="fab fa-youtube"></span></a></li>
                    </ul>
                </div>
            </nav>
        </div><!-- End Mobile Menu -->

        <div class="nav-overlay">
            <div class="cursor"></div>
            <div class="cursor-follower"></div>
        </div>
    </header>
    <!-- End Main Header -->

    <!--Search Popup-->
    <div id="search-popup" class="search-popup">
        <div class="close-search theme-btn"><span class="flaticon-remove"></span></div>
        <div class="popup-inner">
            <div class="overlay-layer"></div>
            <div class="search-form">
                <form method="post" action="https://demosc.chinaz.net/Files/DownLoad/moban/202105/moban5440/index.html">
                    <div class="form-group">
                        <fieldset>
                            <input type="search" class="form-control" name="search-input" value="" placeholder="Search Here" required >
                            <input type="submit" value="Search Now!" class="theme-btn">
                        </fieldset>
                    </div>
                </form>
            </div>
        </div>
    </div>
        <!-- End Header Style -->

        <!-- Content Part Goes Here -->
         @yield('content')
        <!-- Content Part Goes Here -->

        <!-- Start Footer Area -->
        <footer class="main-footer" style="background-image: url(assets/images/background/bg-1.jpg);">
        <div class="auto-container">
            <!--Widgets Section-->
            <div class="widgets-section">
                <div class="row clearfix">
                    
                    <!--Column-->
                    <div class="column col-lg-4 col-md-6">
                        <div class="widget about-widget">
                            <div class="logo"><a href="{{ route('home') }}"><img src="{{$image_asset_path.(isset($globalSettings['website_logo_white'])?$globalSettings['website_logo_white']:'')}}" alt=""></a></div>
                            <div class="text">{{ (isset($globalSettings['website_desc'])?$globalSettings['website_desc']: '' )}}</div>
                            <ul class="social-links">
                                @if(isset($globalSettings['socialLinks']) && !empty($globalSettings['socialLinks']))
                                @foreach($globalSettings['socialLinks'] as $icon => $link)
                                @if($link != '')
                                <li><a href="{{ $link }}"><i class="fab {{ $icon }}"></i></a></li>
                                @endif
                                @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                    
                    <!--Column-->
                    <!-- <div class="column col-lg-3 col-md-6">
                        <div class="widget newsletter-widget">
                            <h3 class="widget-title">Newsletter Signup</h3>
                            <div class="widget-content">
                                <div class="text">Enter your email address to get latest <br> updates and offers from us.</div>
                                <div class="newsletter-form">
                                    <form class="ajax-sub-form" method="post">
                                        <div class="form-group">
                                            <input type="email" placeholder="Email Address..." id="subscription-email">
                                            <button type="submit" class="theme-btn"><i class="flaticon-long-right-arrow"></i><span></span></button>
                                            <label class="subscription-label" for="subscription-email"></label>
                                        </div>
                                    </form>
                                </div>     
                            </div>
                        </div>
                    </div> -->

                    <!--Column-->
                    <div class="column col-lg-4 col-md-6">
                        <div class="widget links-widget">
                            <h3 class="widget-title">Our Courses</h3>
                            <div class="widget-content">
                                <ul>
                                    @if(isset($globalSettings['menues']['Footer']) && !empty($globalSettings['menues']['Footer']))
                                            @foreach($globalSettings['menues']['Footer'] as $item)
                                            @if($item->deleted != 1)
                                            <li ><a href="{{ ($item->slug == 'home')?route('home'):route('slug_url',$item->slug) }}">{{ ucfirst($item->name)}}</a>
                                                @if(isset( $item->children) && !empty($item->children) )
                                            <ul>
                                                @foreach($item->children as $child)
                                                <li ><a href="{{ ($child->slug == 'home')?route('home'):route('slug_url',$child->slug) }}">{{ ucfirst($child->name) }}</a>
                                                    @if(isset( $child->children) && !empty($child->children) )
                                                    <ul>
                                                        @foreach($child->children as $subchild)
                                                        <li ><a href="{{ ($subchild->slug == 'home')?route('home'):route('slug_url',$subchild->slug) }}">{{ ucfirst($subchild->name) }}</a>
                                                        @if(isset($subchild->children) && !empty($subchild->children))
                                                        <ul>
                                                            @foreach($subchild->children as $subchildren)
                                                            <li><a href="{{ ($subchildren->slug == 'home')?route('home'):route('slug_url',$subchildren->slug) }}">{{ ucfirst($subchildren->name) }}</a>
                                                            </li>
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
                                            @endif
                                        </li>
                                            @endif
                                            @endforeach
                                        @endif
                                </ul>                                        
                            </div>
                        </div>
                    </div>
                    
                    <!--Column-->
                    <div class="column col-lg-4 col-md-6">
                        <div class="widget contact-widget">
                            <h3 class="widget-title">Contact Us</h3>
                            <div class="widget-content">
                                <ul class="contact-info">
                                    <li>
                                        <div class="icon"><span class="fas fa-flag"></span></div>
                                        <div class="text">{{ (isset($globalSettings['company_name'])?$globalSettings['company_name']: 'Address' )}}</div>
                                    </li>
                                    <li>
                                        <div class="icon"><span class="fas fa-phone-volume"></span></div>
                                        <div class="text">
                                            Helpline 24/7 <br>
                                            <a href="tel:+1(700)3330088">{{ (isset($globalSettings['contact_tel'])?$globalSettings['contact_tel']: '+91 9999999999' )}}</a>
                                        </div>
                                    </li>
                                    <li>
                                     
                                        <div class="icon"><span class="fas fa-envelope"></span></div>
                                        <div class="text">
                                            {{ (isset($globalSettings['contact_email'])?$globalSettings['contact_email']: 'test@test.com' )}}
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="auto-container">
                <div class="wrapper-box">
                    <div class="copyright">
                        <div class="text">Copyright &copy; 2022.Company name All rights reserved.</div>
                    </div>
                    <div class="footer-menu">
                        <ul>
                            <li><a href="#">Sitemap </a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="flaticon-right-arrow-4"></span></div>
    <!-- Body main wrapper end -->

    <!-- ::::::::::::::All JS Files here :::::::::::::: -->
    <!-- Global Vendor, plugins JS -->
<script src="{{$frontend_asset_path}}Themes/driving/assets/js/jquery.js"></script>
<script src="{{$frontend_asset_path}}Themes/driving/assets/js/popper.min.js"></script>
<script src="{{$frontend_asset_path}}Themes/driving/assets/js/bootstrap.min.js"></script>
<script src="{{$frontend_asset_path}}Themes/driving/assets/js/bootstrap-select.min.js"></script>
<script src="{{$frontend_asset_path}}Themes/driving/assets/js/jquery.fancybox.js"></script>
<script src="{{$frontend_asset_path}}Themes/driving/assets/js/isotope.js"></script>
<script src="{{$frontend_asset_path}}Themes/driving/assets/js/owl.js"></script>
<script src="{{$frontend_asset_path}}Themes/driving/assets/js/appear.js"></script>
<script src="{{$frontend_asset_path}}Themes/driving/assets/js/wow.js"></script>
<script src="{{$frontend_asset_path}}Themes/driving/assets/js/lazyload.js"></script>
<script src="{{$frontend_asset_path}}Themes/driving/assets/js/scrollbar.js"></script>
<script src="{{$frontend_asset_path}}Themes/driving/assets/js/TweenMax.min.js"></script>
<script src="{{$frontend_asset_path}}Themes/driving/assets/js/swiper.min.js"></script>
<script src="{{$frontend_asset_path}}Themes/driving/assets/js/jquery.polyglot.language.switcher.js"></script>
<script src="{{$frontend_asset_path}}Themes/driving/assets/js/jquery.ajaxchimp.min.js"></script>
<script src="{{$frontend_asset_path}}Themes/driving/assets/js/parallax-scroll.js"></script>

<script src="{{$frontend_asset_path}}Themes/driving/assets/js/script.js"></script>

</body>
</html>