@extends('layouts.admin.main')

@section('content')  
        <!-- Header-->
        <?php //dd($data['allSettings']['is_maintenance_mode']); ?>
        
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                       <!--  <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol> -->
                        {{ Breadcrumbs::render('pages') }}
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
                                <a href="{{ route('add_page') }}"><button>Add New</button></a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Page Name</th>
                                            <th>Page Title</th>
                                            <th>Page Slug</th>
                                            <th>Page Active</th>
                                            <th>Action</th>
                                            <th>Set Section</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data['pages'] as $page)
                                        <tr>
                                            <td>{{ $page['page_name'] }}</td>
                                            <td>{{ $page['page_title'] }}</td>
                                            <td>{{ $page['page_slug'] }}</td>
                                            <td>{{ ($page['is_active'] == 1)?'Active':'Deactive' }}</td>
                                            <td><a href="{{ route('add_page',encrypt($page['id'])) }}"><i class="fa fa-edit"></i></a> 

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
                                            <td><a href="{{ route('setsection',encrypt($page['id'])) }}"><button>Section Settings</button></a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->

<form id="delete_page_form" method="post" action="{{ route('deletepage') }}">
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
        ajaxSuccess(newResponse, '{{ route("pages") }}');
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
    //alert('ashdiah');
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