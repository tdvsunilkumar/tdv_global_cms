<?php 
$themeName = (isset($globalSettings['themeData']['theme_name']))?$globalSettings['themeData']['theme_name']:'';

$view = "frontent.Themes.".$themeName.".Modules.";
?>
@extends('frontent.themes.'.$themeName.'.layouts.main')
@section('content')
<section class="error-section">
        <div class="auto-container">
            <div class="content">
                <h1>404</h1>
                <h2>Oops! That page can’t be found</h2>
                <div class="text">Sorry, but the page you are looking for does not existing</div>
                <a href="{{ route('home') }}" class="theme-btn btn-style-one"><span> Go to home page</span></a>
            </div>
        </div>
    </section>
@endsection