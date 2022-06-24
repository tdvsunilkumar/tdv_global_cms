@extends('layouts.admin.main')

@section('content')  
        <!-- Header-->
        <?php //dd($data['allSettings']['is_maintenance_mode']); ?>
        
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Mange your Website Blogs</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                       <!--  <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol> -->
                        {{ Breadcrumbs::render('blogs') }}
                    </div>
                </div>
            </div>
        </div>

       <div class="content mt-3">

         <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('create_blog') }}"><button class="btn btn-info">Add New Blog</button></a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Blog Name</th>
                                            <th>Blog Title</th>
                                            <th>Blog Image</th>
                                            <th>Is Featured</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data['blogs'] as $page)
                                        <tr>
                                            <td>{{ $page['blog_name'] }}</td>
                                            <td>{{ $page['blog_title'] }}</td>
                                            <td>{{ $page['blog_image'] }}</td>
                                            <td>{{ ($page['is_feature'] == 1)?'Yes':'No' }}</td>
                                            <td><a href="{{ route('create_blog',encrypt($page['id'])) }}"><i class="fa fa-edit"></i></a> 
                                            <a href="#" data-moduleid="{{ (isset($page['id'])?$page['id']:'') }}" id="delete_page_button_{{ (isset($page['id'])?$page['id']:'') }}"><i class="fa fa-trash"></i></a>
                                          
                                                <script type="text/javascript">
                                                    $('#delete_page_button_{{ (isset($page['id'])?$page['id']:'') }}')
                                                    .on('click',function(){
                                                        //alert('data');
                                                        var id = $(this).data('moduleid');
                                                        $('#delete_destion_id_field').val(id);
                                                        $('#delete_page_form').submit();
                                                        //alert(id);
                                                    });
                                                </script>
                                        </td>
                                            
                                             
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->

<form id="delete_page_form" method="post" action="{{ route('delete_blog') }}">
                                                    @csrf
                                                    <input type="hidden" id="delete_destion_id_field" name="id" value="">
                                                </form>

        </div> <!-- .content -->
    @endsection
    @section('script')
    <script type="text/javascript">
$('#website_setting_section_form').on('submit',function(e){
    loadspinner();
    $('.validation_error').html('');
    e.preventDefault();
    var data = $(this).serialize();
    console.log(data);
    $.ajax({
      url: $(this).data('url'),
      type:"POST",
      data:data,
      success:function(response){
        hidespinner();
        var newResponse = JSON.parse(response);
        ajaxSuccess(newResponse, '{{ route("blogs") }}');
      },
      error: function(response) {
        ajaxError();
      },
      });
    });
  </script>
 <!-- --------------------ADDNEW-------------------------------- -->
  <script type="text/javascript">
$('#delete_page_form').on('submit',function(e){
     var result = window.confirm('Are you sure, you want to delete this record?');
     if(result == false){
        return false;
     }
     loadspinner();
    $('.validation_error').html('');
    e.preventDefault();
    var data = $(this).serialize();
    console.log(data);
    $.ajax({
      url: $(this).attr('action'),
      type:"POST",
      data:data,
      success:function(response){
        hidespinner();
        var newResponse = JSON.parse(response);
        ajaxSuccess(newResponse, '{{ route("blogs") }}');
      },
      error: function(response) {
        ajaxError();
      },
      });
    });
  </script>
  <script type="text/javascript">
$('#clone_page_form').on('submit',function(e){
     var result = window.confirm('Are you sure, you want to clone this page?');
     if(result == false){
        return false;
     }
     loadspinner();
    $('.validation_error').html('');
    e.preventDefault();
    var data = $(this).serialize();
    console.log(data);
    $.ajax({
      url: $(this).attr('action'),
      type:"POST",
      data:data,
      success:function(response){
        hidespinner();
        var newResponse = JSON.parse(response);
        ajaxSuccess(newResponse, '{{ route("pages") }}');
      },
      error: function(response) {
        ajaxError();
      },
      });
    });
  </script>
    @endsection