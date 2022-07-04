<?php 

$themeName = (isset($globalSettings['themeData']['theme_name']))?$globalSettings['themeData']['theme_name']:'';

$view = "frontent.themes.".$themeName.".Modules.";
$blogTags = (isset($data['blog']['blog_tags']))?$data['blog']['blog_tags']:'';
$blogTags = explode(",",$blogTags);
?>
@extends('frontent.themes.'.$themeName.'.layouts.main')
@section('content')
<section class="home-slider owl-carousel">
      <div class="slider-item bread-item" style="background-image: url('{{ $frontend_asset_path.'Themes/'.$themeName }}/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container" data-scrollax-parent="true">
          <div class="row slider-text align-items-end">
            <div class="col-md-7 col-sm-12 ftco-animate mb-5">
              <p class="breadcrumbs" data-scrollax=" properties: { translateY: '70%', opacity: 1.6}"><span class="mr-2"><a href="{{ route('home') }}">Home</a></span> <span>{{ (isset($data['blog']['blog_name']) )?ucfirst($data['blog']['blog_name']):'Page Name'}}</span></p>
              <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">{{ (isset($data['blog']['blog_name']) )?ucfirst($data['blog']['blog_name']):'Page Name'}}</h1>
            </div>
          </div>
        </div>
      </div>
    </section>
<section class="ftco-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 ftco-animate">
                        {!! (isset($data['blog']->blog_content))?$data['blog']->blog_content:'' !!}
            <div class="tag-widget post-tag-container mb-5 mt-5">
              <div class="tagcloud">
                @foreach($blogTags as $tag)
                                               <a href="#" class="tag-cloud-link">{{ $tag }}</a>
                                            @endforeach
                
              </div>
            </div>

            

          </div> <!-- .col-md-8 -->
                    <div class="col-md-4 sidebar ftco-animate">
            

            <div class="sidebar-box ftco-animate">
              <h3>Recent Blog</h3>
              
           @if(isset($data['featuredBlog']) && !empty($data['featuredBlog']))
                            @foreach($data['featuredBlog'] as $blog)
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

            <div class="sidebar-box ftco-animate">
              <h3>Tag Cloud</h3>
              <div class="tagcloud">
                 @foreach($blogTags as $tag)
                                               <a class="tag-cloud-link" href="#">{{ $tag }}</a>
                                            @endforeach
                
              </div>
            </div>

           
          </div>
                </div>
            </div>
        </section>
    @endsection