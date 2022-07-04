<?php 

$themeName = (isset($globalSettings['themeData']['theme_name']))?$globalSettings['themeData']['theme_name']:'';

$view = "frontent.themes.".$themeName.".Modules.";
?>
@extends('frontent.themes.'.$themeName.'.layouts.main')
@section('content')

<!-- Page Title -->
    <section class="page-title" style="background-image: url({{ $frontend_asset_path.'Themes/'.$themeName }}/assets/images/background/bg-8.jpg);">
        <div class="auto-container">
            <div class="content-box">
                <div class="content-wrapper">
                    <div class="title">
                        <h1>{{ (isset($data['page']['page_name']) )?ucfirst($data['page']['page_name']):'Page Name'}}</h1>
                    </div>
                    <ul class="bread-crumb">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>{{ (isset($data['page']['page_name']) )?ucfirst($data['page']['page_name']):'Page Name'}}</li>
                    </ul>
                </div>                    
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section class="blog-section">
        <div class="auto-container">
            <div class="row">
            	@if(isset($data['blogs']) && !empty($data['blogs']))
            	@foreach($data['blogs'] as $blog)
                <div class="col-lg-4 news-block">
                    <div class="inner-box">
	                        <div class="image"><img src="{{ $image_asset_path.$blog->blog_image }}" alt=""></div>
                        <div class="lower-content">
                            <div class="post-meta-info">
                                <div class="date">{{ date("M d, Y",strtotime($blog->created_at)) }}</div>
                            </div>
                            <h4><a href="{{ route('full_blog',$blog->blog_slug) }}">{{ (isset($blog->blog_name))?$blog->blog_name:''}}</a></h4>
                            <div class="link-btn"><a href="{{ route('full_blog',$blog->blog_slug) }}" class="theme-btn btn-style-one style-three"><span>Read Full Story</span></a></div>
                        </div>
                    </div>
                </div>
                @endforeach
             @endif
            </div>
            <div class="pagination-wrapper text-center">
                {{ $data['blogs']->links() }}
            </div>
        </div>
    </section>
@endsection