<?php 
$themeName = (isset($globalSettings['themeData']['theme_name']))?$globalSettings['themeData']['theme_name']:'';

$view = "frontent.Themes.".$themeName.".Modules.";
?>
@extends('frontent.themes.'.$themeName.'.layouts.main')
@section('content')
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
@if(isset($data['page']['pagesections']) && !empty($data['page']['pagesections']))
 @foreach($data['page']['pagesections'] as $section)
@if(isset($section['section']['value']['value']))
<?php 
    $viewData = (array)json_decode($section['section']['value']['value']);
    echo $viewData['gjs-html'];
?>
<style type="text/css"><?php echo $viewData['gjs-css'] ?></style>
@endif
@endforeach 
@endif
@endsection