<?php 
$themeName = (isset($globalSettings['themeData']['theme_name']))?$globalSettings['themeData']['theme_name']:'';

$view = "frontent.themes.".$themeName.".Modules.";
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
    //echo $viewData['gjs-html'];
    echo str_replace($globalSettings['oldimgbaseurl'],$globalSettings['newimgbaseurl'],$viewData['gjs-html']);
?>
<style type="text/css"><?php echo str_replace($globalSettings['oldimgbaseurl'],$globalSettings['newimgbaseurl'],$viewData['gjs-css']) ?></style>
@endif
@endforeach 
@endif
@endsection
@section('script')

<script type="text/javascript">
$('#contact-form').on('submit',function(e){
	var websiteUrl = "{{$globalSettings['site_url']}}";
	e.preventDefault();
    $('.validation_error').html('');
    
    var data = $(this).serialize();
    console.log(data);
    $.ajax({
      url: '{{ route("contact_us_send_email") }}',
      type:"POST",
      data:data,
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token()}}'
    },
      success:function(response){
        $('.alert').remove();
        var newResponse = JSON.parse(response);
        if(newResponse.status == 'validation_error'){
            $.each(newResponse.data, function (key, val) {
            	$('input[name='+key+']').after("<span class='validation_error' style='color:red;'>"+val[0]+"</span>");
                    });
        }
        if(newResponse.status == 'success'){
          $('#contact-form')[0].reset();
        	var msgView = '<div class="alert alert-success"><strong>Success!</strong> '+newResponse.msg+'</div>';
          $('#contact-form').after(msgView);
        }
        if(newResponse.status == 'error'){
          var msgView = '<div class="alert alert-danger"><strong>Error!</strong> '+newResponse.msg+'</div>';
          $('#contact-form').after(msgView);
        }
      },
      error: function(response) {
        alert('Server Error, Please Try Again');
      },
      });
    });
  </script>
@endsection