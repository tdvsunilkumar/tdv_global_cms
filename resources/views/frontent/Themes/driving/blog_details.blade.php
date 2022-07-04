<?php 

$themeName = (isset($globalSettings['themeData']['theme_name']))?$globalSettings['themeData']['theme_name']:'';

$view = "frontent.themes.".$themeName.".Modules.";
$blogTags = (isset($data['blog']['blog_tags']))?$data['blog']['blog_tags']:'';
$blogTags = explode(",",$blogTags);
?>
@extends('frontent.themes.'.$themeName.'.layouts.main')
@section('content')
<section class="page-title" style="background-image: url({{ $frontend_asset_path.'Themes/'.$themeName }}/assets/images/background/bg-8.jpg);">
        <div class="auto-container">
            <div class="content-box">
                <div class="content-wrapper">
                    <div class="title">
                        <h1>{{ (isset($data['blog']['blog_name']) )?ucfirst($data['blog']['blog_name']):'Page Name'}}</h1>
                    </div>
                    <ul class="bread-crumb">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('slug_url','blogs') }}">Blogs</a></li>
                        <li>Full Blog</li>
                    </ul>
                </div>                    
            </div>
        </div>
    </section>
<section class="sidebar-page-container">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-8 content-side">
                    <div class="news-block style-two blog-single-post">
                        <div class="inner-box">
                            <div class="image"><img src="{{ $image_asset_path.$data['blog']->blog_image }}" alt=""></div>
                            <div class="lower-content">
                                <div class="post-meta-info">
                                    
                                    <div class="date"><i class="far fa-calendar-alt"></i> {{ date("M d, Y",strtotime($data['blog']->created_at)) }}</div>
                                    <!-- <div class="comment"><i class="far fa-comments"></i>46</div>
                                    <div class="like"><i class="far fa-heart"></i>256</div>
                                    <div class="share">
                                        <i class="far fa-share-alt"></i>Share This
                                        <ul class="social-links">
                                            <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                            <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                            <li><a href="#"><span class="fab fa-skype"></span></a></li>
                                        </ul>
                                    </div> -->
                                </div>
                                <h4>{{ (isset($data['blog']->blog_name))?$data['blog']->blog_name:'' }}</h4>
                                <div class="text">
                                    {!! (isset($data['blog']->blog_content))?$data['blog']->blog_content:'' !!}
                                </div>
                                
                                <div class="post-share-info">
                                    <div class="left-column">
                                        <div class="tag">
                                            <span><i class="fas fa-tags"></i>Tags:</span>
                                            @foreach($blogTags as $tag)
                                               <a href="#">{{ $tag }}</a>
                                            @endforeach
                                          
                                        </div>
                                    </div>
                                   <!--  <div class="right-column">
                                        <ul class="social-links">
                                            <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                            <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                            <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                                            <li><a href="#"><span class="fab fa-google-plus-g"></span></a></li>
                                        </ul>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="comments-area">
                        <div class="comments-title">
                            <h4>Post Comments</h4>
                        </div>
                        <div class="comment-box">
                            <div class="comment">
                                <div class="author-thumb">
                                    <figure class="thumb"><img src="assets/images/resource/author-4.jpg" alt=""></figure>
                                </div>
                                <div class="info-wrap">
                                    <div class="info">
                                        <div class="name">James Hayden</div>
                                        <div class="comment-date">OCT 5, 2020 at 2:40pm</div>
                                    </div>
                                    <div class="text">Nulla sed viveraut lorem tetur diam nunc bibendum imperdiets. Lorem ipsum dolor  tur adipisicing elit, sed do eiusmod tempor incididunt labore.</div>
                                    <div class="reply-btn"><a class="theme-btn btn-style-three" href="#"><span class="btn-title">Reply</span></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="comment-box">
                            <div class="comment">
                                <div class="author-thumb">
                                    <figure class="thumb"><img src="assets/images/resource/author-5.jpg" alt=""></figure>
                                </div> 
                                <div class="info-wrap">
                                    <div class="info">
                                        <div class="name">Tanya Benson</div>
                                        <div class="comment-date">OCT 5, 2020 at 2:40pm</div>
                                    </div>
                                    <div class="text">Nulla sed viveraut lorem tetur diam nunc bibendum imperdiets. Lorem ipsum dolor  tur adipisicing elit, sed do eiusmod tempor incididunt labore.</div>
                                    <div class="reply-btn"><a class="theme-btn btn-style-three" href="#"><span class="btn-title">Reply</span></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="comment-box">
                            <div class="comment">
                                <div class="author-thumb">
                                    <figure class="thumb"><img src="assets/images/resource/author-6.jpg" alt=""></figure>
                                </div> 
                                <div class="info-wrap">
                                    <div class="info">
                                        <div class="name">Mark Tyson</div>
                                        <div class="comment-date">OCT 5, 2020 at 2:40pm</div>
                                    </div>
                                    <div class="text">Nulla sed viveraut lorem tetur diam nunc bibendum imperdiets. Lorem ipsum dolor  tur adipisicing elit, sed do eiusmod tempor incididunt labore.</div>
                                    <div class="reply-btn"><a class="theme-btn btn-style-three" href="#"><span class="btn-title">Reply</span></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                     -->
                </div>
                <aside class="col-lg-4 sidebar">
                    <div class="blog-sidebar sidebar-style-two">
                        <div class="widget widget_popular_post">
                            <h3 class="widget-title">Popular Posts</h3>
                            @if(isset($data['featuredBlog']) && !empty($data['featuredBlog']))
                            @foreach($data['featuredBlog'] as $blog)
                            <article class="post">
                                <figure class="post-thumb"><a href="{{ route('full_blog',$blog->blog_slug) }}"><img src="{{ $image_asset_path.$blog->blog_image }}" alt=""></a></figure>
                                <div class="content">
                                    <h5><a href="{{ route('full_blog',$blog->blog_slug) }}">{{ isset($blog->blog_title)?$blog->blog_title:''}}</a></h5>
                                    <div class="post-info"><i class="far fa-calendar-alt"></i> {{ isset($blog->created_at)?date("M d, Y",strtotime($blog->created_at)):''}}</div>
                                </div>
                            </article>
                            @endforeach
                            @endif
                           
                        </div>
                        <!-- Download Widget -->
                        <!-- <div class="widget widget_download">
                            <h3 class="widget-title">Useful Downloads</h3>
                            <div class="download-pdf">
                                <div class="icon"><img src="assets/images/icons/icon-26.png" alt=""></div>
                                <div class="content">
                                    <h4>Our Driving Brochure</h4>
                                    <p>Last Update: 7 Sep 2020</p>
                                </div>
                            </div>
                            <div class="download-pdf">
                                <div class="icon"><img src="assets/images/icons/icon-26.png" alt=""></div>
                                <div class="content">
                                    <h4>Exam Preparation Guide</h4>
                                    <p>Last Update: 19 Sep 2020</p>
                                </div>
                            </div>
                        </div> -->
                        <!-- Tag-cloud Widget -->
                        <div class="widget widget_tag_cloud">
                            <h3 class="widget-title">Blog Tags</h3>

                            <ul class="clearfix">
                                @foreach($blogTags as $tag)
                                               <li><a href="#">{{ $tag }}</a></li>
                                            @endforeach
                            </ul>
                        </div>
                        
                    </div>
                </aside>
            </div>
        </div>
    </section>
    @endsection