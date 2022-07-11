<?php 
$themeName = (isset($globalSettings['themeData']['theme_name']))?$globalSettings['themeData']['theme_name']:'';

$view = "frontent.themes.".$themeName.".Modules.";
?>
@extends('frontent.themes.'.$themeName.'.layouts.main')
@section('content')
 <div class="breadcrumb-agile">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb m-0">
        <li class="breadcrumb-item">
         <span class="mr-2"><a href="{{ route('home') }}">Home</a></span> <span>{{ (isset($data['page']['page_name']) )?ucfirst($data['page']['page_name']):'Page Name'}}</span></p>
             <!--  <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">{{ (isset($data['page']['page_name']) )?ucfirst($data['page']['page_name']):'Page Name'}}</h1> -->
        </li>
       <!--  <li class="breadcrumb-item active" aria-current="page">About Us</li> -->
      </ol>
    </nav>
  </div>

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
  //alert();
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