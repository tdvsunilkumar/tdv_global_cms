@extends('layouts.admin.main')

@section('content')  
        <!-- Header-->
        <?php //dd($data['allSettings']['is_maintenance_mode']); ?>
        
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Decorate your Page with Inbuilt sections</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                       <!--  <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol> -->
                        {{ Breadcrumbs::render('set_section') }}
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
                                <a  data-toggle="modal" data-target="#largeModal"><button class="btn btn-danger">Add New Section to Page</button></a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Page Name</th>
                                            <th>Section</th>
                                            <th>Sort</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!empty($data['pageSection']))
                                        @foreach($data['pageSection'] as $pagesection)
                                        <tr>
                                            <td>{{ (isset($pagesection['selected_page']['page_name'])?$pagesection['selected_page']['page_name']:'') }}</td>
                                            <td>{{ (isset($pagesection['section']['module_name'])?$pagesection['section']['module_name']:'') }}</td>
                                            <td><input id="update_sort_field_{{ (isset($pagesection['section']['id'])?$pagesection['section']['id']:'') }}" name="update_sort_field" value="{{ (isset($pagesection['sort'])?$pagesection['sort']:'') }}" />&nbsp;<button class="update_sort_{{ (isset($pagesection['section']['id'])?$pagesection['section']['id']:'') }}" data-module_id="{{ (isset($pagesection['id'])?$pagesection['id']:'') }}">Update</button>
                                                <script type="text/javascript">
                                                    $(".update_sort_{{ (isset($pagesection['section']['id'])?$pagesection['section']['id']:'') }}").on('click',function(){
                                                        var moduleId = $(this).data('module_id');
                                                        var sortData = $("#update_sort_field_{{ (isset($pagesection['section']['id'])?$pagesection['section']['id']:'') }}").val();
                                                        $('#update_sort_module_id_field').val(moduleId);
                                                        $('#update_sort_sort_field').val(sortData);
                                                        $('#update_sort_form').submit();
                                                    });
                                                </script>

                                            </td>
                                            <td><!-- <a href="#/" id="delete_section_button"><i class="fa fa-trash"></i></a> -->
                                                <!-- <button id="delete_section_button"><i class="fa fa-trash"></i></button>
                                                <script type="text/javascript">
                                                    $('#delete_section_button').on('click',function(){
                                                        $('#delete_section_form').submit();

                                                    });
                                                </script> -->
                                                <a href="#" data-moduleid="{{ (isset($pagesection['id'])?$pagesection['id']:'') }}" id="delete_section_button_{{ (isset($pagesection['id'])?$pagesection['id']:'') }}"><i class="fa fa-trash"></i></a>
                                                <script type="text/javascript">
                                                    $('#delete_section_button_{{ (isset($pagesection['id'])?$pagesection['id']:'') }}').on('click',function(){
                                                        var id = $(this).data('moduleid');
                                                        $('#delete_destion_id_field').val(id);
                                                        $('#delete_section_form').submit();
                                                        //alert(id);
                                                    });
                                                </script>

                                            </td>
                                        </tr>
                                       @endforeach
                                       @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
<form id="delete_section_form" method="post" action="{{ route('deletesection') }}">
                                                    @csrf
                                                    <input type="hidden" id="delete_destion_id_field" name="id" value="">
                                                    
                                                </form>
<form id="update_sort_form" method="post" action="{{ route('update_sort_field') }}">
                                                    @csrf
                                                    <input type="hidden" id="update_sort_sort_field" name="sort" value="">
                                                    <input type="hidden" id="update_sort_module_id_field" name="page_section_id" value="">
                                                </form>
        </div> <!-- .content -->
        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="largeModalLabel">Add Sections For your Page</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" id="website_setting_section_form" action="{{ route('storesection') }}">
                                    @csrf
                                <input type="hidden" name="page_id" value="{{ (isset($data['page']->id)?$data['page']->id:0)}}">

                                                    <div class="form-group"><label for="website_title" class=" form-control-label">Select Section</label>
                                                        {!! Form::select('section_id',$data['modules'],(isset($data['page']['is_active']))?$data['page']['is_active']:1,['class'=>'form-control']) !!}
                                                        <span class="validation_error" id="is_active_error"></span>

                                                    </div>
                            </div>
                        
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Add</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
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
      url: $(this).attr('action'),
      type:"POST",
      data:data,
      success:function(response){
        hidespinner();
        var newResponse = JSON.parse(response);
        ajaxSuccess(newResponse, '{{ route("setsection",encrypt($data["page"]->id)) }}');

      },
      error: function(response) {
        ajaxError();
      },
      });
    });

    $('#update_sort_form').on('submit',function(e){
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
        ajaxSuccess(newResponse, '{{ route("setsection",encrypt($data["page"]->id)) }}');

      },
      error: function(response) {
        ajaxError();
      },
      });
    });
  </script>
  <script type="text/javascript">
$('#delete_section_form').on('submit',function(e){
    //alert();
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
        ajaxSuccess(newResponse, '{{ route("setsection",encrypt($data["page"]->id)) }}');

      },
      error: function(response) {
        ajaxError();
      },
      });
    });
  </script>
    @endsection