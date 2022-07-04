<!DOCTYPE html>
<html lang="en">
  <head>
    <title>{{ (isset($data['page']['page_title'])?$data['page']['page_title']: config('app.name', 'Laravel') )}}</title>
    <meta charset="utf-8">
    <meta name="description" content="{{ (isset($data['page']->page_description)?$data['page']->page_description: 'description' )}}">
    <meta name="keywords" content="{{ (isset($data['page']->page_keywords)?$data['page']->page_keywords: 'keywords' )}}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="{{$image_asset_path.(isset($globalSettings['website_logo'])?$globalSettings['website_favicon']:'')}}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700" rel="stylesheet">

    <link rel="stylesheet" href="{{$frontend_asset_path}}Themes/dentcare/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="{{$frontend_asset_path}}Themes/dentcare/css/animate.css">
    
    <link rel="stylesheet" href="{{$frontend_asset_path}}Themes/dentcare/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{$frontend_asset_path}}Themes/dentcare/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{$frontend_asset_path}}Themes/dentcare/css/magnific-popup.css">

    <link rel="stylesheet" href="{{$frontend_asset_path}}Themes/dentcare/css/aos.css">

    <link rel="stylesheet" href="{{$frontend_asset_path}}Themes/dentcare/css/ionicons.min.css">

    <link rel="stylesheet" href="{{$frontend_asset_path}}Themes/dentcare/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{$frontend_asset_path}}Themes/dentcare/css/jquery.timepicker.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="{{$frontend_asset_path}}Themes/dentcare/css/flaticon.css">
    <link rel="stylesheet" href="{{$frontend_asset_path}}Themes/dentcare/css/icomoon.css">
    <link rel="stylesheet" href="{{$frontend_asset_path}}Themes/dentcare/css/style.css">
    <script src="{{$frontend_asset_path}}Themes/dentcare/js/jquery.min.js"></script>
  </head>
  <body>
    
      <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
          <a href="{{ route('home') }}"><img src="{{$image_asset_path.(isset($globalSettings['website_logo'])?$globalSettings['website_logo']:'')}}" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
          </button>

          <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
            @if(isset($globalSettings['menues']['Header']) && !empty($globalSettings['menues']['Header']))
                                            @foreach($globalSettings['menues']['Header'] as $item)
                                            @if($item->deleted != 1)
                                            <li class="nav-item"><a class="nav-link" href="{{ ($item->slug == 'home')?route('home'):route('slug_url',$item->slug) }}">{{ ucfirst($item->name)}}</a>
                                                @if(isset( $item->children) && !empty($item->children) )
                                            <ul>
                                                @foreach($item->children as $child)
                                                <li class="{{ (isset( $child->children))?'dropdown':'' }}"><a class="nav-link" href="{{ ($child->slug == 'home')?route('home'):route('slug_url',$child->slug) }}">{{ ucfirst($child->name) }}</a>
                                                    @if(isset( $child->children) && !empty($child->children) )
                                                    <ul>
                                                        @foreach($child->children as $subchild)
                                                        <li class="{{ (isset( $subchild->children))?'dropdown':'' }}"><a class="nav-link" href="{{ ($subchild->slug == 'home')?route('home'):route('slug_url',$subchild->slug) }}">{{ ucfirst($subchild->name) }}</a>
                                                        @if(isset($subchild->children) && !empty($subchild->children))
                                                        <ul>
                                                            @foreach($subchild->children as $subchildren)
                                                            <li><a class="nav-link" href="{{ ($subchildren->slug == 'home')?route('home'):route('slug_url',$subchildren->slug) }}">{{ ucfirst($subchildren->name) }}</a>
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
      </nav>
    <!-- END nav -->
    <!-- Content Part Goes Here -->
         @yield('content')
        <!-- Content Part Goes Here -->

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-4">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2"><a href="{{ route('home') }}"><img src="{{$image_asset_path.(isset($globalSettings['website_logo_white'])?$globalSettings['website_logo_white']:'')}}" alt=""></a></h2>
              <p>{{ (isset($globalSettings['website_desc'])?$globalSettings['website_desc']: '' )}}</p>
            </div>
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft ">
                @if(isset($globalSettings['socialLinks']) && !empty($globalSettings['socialLinks']))
                                @foreach($globalSettings['socialLinks'] as $icon => $link)
                                @if($link != '')
                                <li class="ftco-animate"><a href="{{ $link }}"><span class="fa {{ $icon }}"></span></a></li>
                                @endif
                                @endforeach
                                @endif
              
            </ul>
          </div>
          <div class="col-md-4">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Quick Links</h2>
              <ul class="list-unstyled">
                 @if(isset($globalSettings['menues']['Footer']) && !empty($globalSettings['menues']['Footer']))
                                            @foreach($globalSettings['menues']['Footer'] as $item)
                                            @if($item->deleted != 1)
                                            <li ><a class="py-2 d-block" href="{{ ($item->slug == 'home')?route('home'):route('slug_url',$item->slug) }}">{{ ucfirst($item->name)}}</a>
                                                @if(isset( $item->children) && !empty($item->children) )
                                            <ul>
                                                @foreach($item->children as $child)
                                                <li ><a class="py-2 d-block" href="{{ ($child->slug == 'home')?route('home'):route('slug_url',$child->slug) }}">{{ ucfirst($child->name) }}</a>
                                                    @if(isset( $child->children) && !empty($child->children) )
                                                    <ul>
                                                        @foreach($child->children as $subchild)
                                                        <li ><a class="py-2 d-block" href="{{ ($subchild->slug == 'home')?route('home'):route('slug_url',$subchild->slug) }}">{{ ucfirst($subchild->name) }}</a>
                                                        @if(isset($subchild->children) && !empty($subchild->children))
                                                        <ul>
                                                            @foreach($subchild->children as $subchildren)
                                                            <li><a class="py-2 d-block" href="{{ ($subchildren->slug == 'home')?route('home'):route('slug_url',$subchildren->slug) }}">{{ ucfirst($subchildren->name) }}</a>
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
          
          <div class="col-md-4">
            <div class="ftco-footer-widget mb-4">
                <h2 class="ftco-heading-2">Office</h2>
                <div class="block-23 mb-3">
                  <ul>
                    <li><span class="icon icon-map-marker"></span><span class="text">{{ (isset($globalSettings['company_name'])?$globalSettings['company_name']: 'Address' )}}</span></li>
                    <li><a href="#"><span class="icon icon-phone"></span><span class="text">{{ (isset($globalSettings['contact_tel'])?$globalSettings['contact_tel']: '+91 9999999999' )}}</span></a></li>
                    <li><a href="#"><span class="icon icon-envelope"></span><span class="text">{{ (isset($globalSettings['contact_email'])?$globalSettings['contact_email']: 'test@test.com' )}}</span></a></li>
                  </ul>
                </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved 
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <!-- Modal -->
  <div class="modal fade" id="modalRequest" tabindex="-1" role="dialog" aria-labelledby="modalRequestLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalRequestLabel">Make an Appointment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="#">
            <div class="form-group">
              <!-- <label for="appointment_name" class="text-black">Full Name</label> -->
              <input type="text" class="form-control" id="appointment_name" placeholder="Full Name">
            </div>
            <div class="form-group">
              <!-- <label for="appointment_email" class="text-black">Email</label> -->
              <input type="text" class="form-control" id="appointment_email" placeholder="Email">
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <!-- <label for="appointment_date" class="text-black">Date</label> -->
                  <input type="text" class="form-control appointment_date" placeholder="Date">
                </div>    
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <!-- <label for="appointment_time" class="text-black">Time</label> -->
                  <input type="text" class="form-control appointment_time" placeholder="Time">
                </div>
              </div>
            </div>
            

            <div class="form-group">
              <!-- <label for="appointment_message" class="text-black">Message</label> -->
              <textarea name="" id="appointment_message" class="form-control" cols="30" rows="10" placeholder="Message"></textarea>
            </div>
            <div class="form-group">
              <input type="submit" value="Make an Appointment" class="btn btn-primary">
            </div>
          </form>
        </div>
        
      </div>
    </div>
  </div>


  @yield('script')
  <script src="{{$frontend_asset_path}}Themes/dentcare/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="{{$frontend_asset_path}}Themes/dentcare/js/popper.min.js"></script>
  <script src="{{$frontend_asset_path}}Themes/dentcare/js/bootstrap.min.js"></script>
  <script src="{{$frontend_asset_path}}Themes/dentcare/js/jquery.easing.1.3.js"></script>
  <script src="{{$frontend_asset_path}}Themes/dentcare/js/jquery.waypoints.min.js"></script>
  <script src="{{$frontend_asset_path}}Themes/dentcare/js/jquery.stellar.min.js"></script>
  <script src="{{$frontend_asset_path}}Themes/dentcare/js/owl.carousel.min.js"></script>
  <script src="{{$frontend_asset_path}}Themes/dentcare/js/jquery.magnific-popup.min.js"></script>
  <script src="{{$frontend_asset_path}}Themes/dentcare/js/aos.js"></script>
  <script src="{{$frontend_asset_path}}Themes/dentcare/js/jquery.animateNumber.min.js"></script>
  <script src="{{$frontend_asset_path}}Themes/dentcare/js/bootstrap-datepicker.js"></script>
  <script src="{{$frontend_asset_path}}Themes/dentcare/js/jquery.timepicker.min.js"></script>
  <script src="{{$frontend_asset_path}}Themes/dentcare/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{$frontend_asset_path}}Themes/dentcare/js/google-map.js"></script>
  <script src="{{$frontend_asset_path}}Themes/dentcare/js/main.js"></script>
    
  </body>
</html>