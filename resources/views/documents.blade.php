<?php 
//dd($globalSettings);
$themeName = (isset($globalSettings['themeData']['theme_name']))?$globalSettings['themeData']['theme_name']:'';

$view = "frontent.themes.".$themeName.".Modules.";
?>
@extends('frontent.themes.'.$themeName.'.layouts.main')
@section('content')
@if(isset($data['pagename']) && $data['pagename'] == 'Privacy Policy')
<h1>Privacy Policy</h1>
@if(isset($globalSettings['policy_content']))
{!! $globalSettings['policy_content'] !!}
@endif
@endif
@endsection