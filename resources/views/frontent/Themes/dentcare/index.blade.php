<?php 
$themeName = (isset($globalSettings['themeData']['theme_name']))?$globalSettings['themeData']['theme_name']:'';

$view = "frontent.themes.".$themeName.".Modules.";
?>
@extends('frontent.themes.'.$themeName.'.layouts.main')
@section('content')

@if(isset($data['page']['pagesections']) && !empty($data['page']['pagesections']))
 @foreach($data['page']['pagesections'] as $section)
@if(isset($section['section']['value']['value']))
<?php 
    $viewData = (array)json_decode($section['section']['value']['value']);
    //echo $viewData['gjs-html'];
    echo str_replace($globalSettings['oldimgbaseurl'],$globalSettings['newimgbaseurl'],$viewData['gjs-html']);
?>
<style type="text/css"><?php echo str_replace($globalSettings['oldimgbaseurl'],$globalSettings['newimgbaseurl'],$viewData['gjs-css']) ?></style>
@endif
@endforeach 
@endif
@endsection