<?php 

$themeName = (isset($globalSettings['themeData']['theme_name']))?$globalSettings['themeData']['theme_name']:'';

$view = "frontent.themes.".$themeName.".Modules.";
?>
@extends('frontent.themes.'.$themeName.'.layouts.main')
@section('content')

<!-- Page Title -->
    <section class="home-slider owl-carousel">
      <div class="slider-item bread-item" style="background-image: url('{{ $frontend_asset_path.'Themes/'.$themeName }}/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container" data-scrollax-parent="true">
          <div class="row slider-text align-items-end">
            <div class="col-md-7 col-sm-12 ftco-animate mb-5">
              <p class="breadcrumbs" data-scrollax=" properties: { translateY: '70%', opacity: 1.6}"><span class="mr-2"><a href="{{ route('home') }}">Home</a></span> <span>{{ (isset($data['page']['page_name']) )?ucfirst($data['page']['page_name']):'Page Name'}}</span></p>
              <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">{{ (isset($data['page']['page_name']) )?ucfirst($data['page']['page_name']):'Page Name'}}</h1>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Blog Section -->
    <section class="ftco-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            @if(isset($data['blogs']) && !empty($data['blogs']))
                @foreach($data['blogs'] as $blog)
                            <div class="col-md-12 ftco-animate">
                    <div class="blog-entry">
                      <a href="{{ route('full_blog',$blog->blog_slug) }}" class="block-20" style="background-image: url('{{ $image_asset_path.str_replace('\\','/',$blog->blog_image) }}');">
                      </a>
                      <div class="text d-flex py-4">
                        <div class="meta mb-3">
                          <div><a href="#">{{ date("M d, Y",strtotime($blog->created_at)) }}</a></div>
                          <div><a href="#">Admin</a></div>
                         
                        </div>
                        <div class="desc pl-sm-3 pl-md-5">
                            <h3 class="heading"><a href="{{ route('full_blog',$blog->blog_slug) }}">{{ (isset($blog->blog_name))?$blog->blog_name:''}}</a></h3>
                            <p>{{ substr(strip_tags((isset($blog->blog_content))?$blog->blog_content:''),0,425) }}...</p>
                            <p><a href="{{ route('full_blog',$blog->blog_slug) }}" class="btn btn-primary btn-outline-primary">Read more</a></p>
                          </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
             @endif
                        </div>
                        <div class="row mt-5">
                  <div class="col">
                    <div class="block-27">
                      {{ $data['blogs']->links() }}
                    </div>
                  </div>
                </div>
                    </div> <!-- END: col-md-8 -->
                    <div class="col-md-4 sidebar ftco-animate">
            
            

            <div class="sidebar-box ftco-animate">
              <h3>Recent Blog</h3>
              @if(isset($data['recentBlogs']) && !empty($data['recentBlogs']))
                            @foreach($data['recentBlogs'] as $blog)
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url('{{ $image_asset_path.str_replace('\\','/',$blog->blog_image) }}');"></a>
                <div class="text">
                  <h3 class="heading"><a href="{{ route('full_blog',$blog->blog_slug) }}">{{ isset($blog->blog_title)?$blog->blog_title:''}}</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> {{ isset($blog->created_at)?date("M d, Y",strtotime($blog->created_at)):''}}</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    
                  </div>
                </div>
              </div>
               @endforeach
                            @endif
            </div>

          </div>
                </div>
            </div>
        </section>
@endsection