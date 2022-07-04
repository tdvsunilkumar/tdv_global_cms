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
                       {{ Breadcrumbs::render('add_module') }}
                    </div>
                </div>
            </div>
        </div>

       <div class="content mt-3">

         <div class="row">
                   
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <!-- <h4>Module Settings</h4> -->
                                <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#mediumModal">Add Custom Module</button>
                            </div>
                            <div class="card-body">
                                  <div class="animated fadeIn">
                <div class="row">
                   @if(!empty($data['modules']))
                   @foreach($data['modules'] as $module)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header text-center">
                                <strong class="card-title pl-2">{{ $module['module_name'] }}</strong>
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    <img class="mx-auto d-block" src="{{$admin_asset_path. $module['module_image'] }}" alt="Card image cap">
                                    <!-- <h5 class="text-sm-center mt-2 mb-1">Steven Lee</h5>
                                    <div class="location text-sm-center"><i class="fa fa-map-marker"></i> California, United States</div> -->
                                </div>
                                <hr>
                                <div class="card-text text-sm-center">
                                    <form method="post" id="website_setting_section_form" action="{{ route('update_modules') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ encrypt($module['id']) }}">
                                    </form>
                                    <a target="_blank" href="{{ route('custom_modules',encrypt($module['id'])) }}"><button type="button" id="activate_theme" class="btn btn-primary btn-sm">Modify</button></a>

                                    <a data-module_id="{{ $module['id'] }}" data-toggle="modal" data-target="#largeModal" id="set_for_other_page_{{ $module['id'] }}" href="#"><button type="button" id="set_for_other_page" class="btn btn-success btn-sm">Set For Other Page</button></a>
                                    <script type="text/javascript">
                                        $('#set_for_other_page_{{ $module["id"] }}').on('click',function(){
                                            var moduleId = $(this).data('module_id');
                                            $('input[name=set_for_other_page_module_id]').val(moduleId);
                                            //alert(moduleId);
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif

                </div><!-- .row -->


        </div> <!-- .content -->
        <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Add New Module Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post" id="custom_module_form" action="{{ route('save_custom_modules') }}">
                                    @csrf
                            <input type="hidden" name="page_id" value="{{ (isset($data['page']->id))?$data['page']->id:0 }}">        
                            <div class="modal-body">
                               <div class="form-group"><label for="website_title" class=" form-control-label">Module Name</label>
                                
                                <input type="text" name="module_name" id="module_name" class="form-control"  >
                                        <span class="validation_error" id="module_name_error"></span>

                                                    </div>
                                
                                <div class="form-group"><label for="website_title" class=" form-control-label">Module Description</label>
                                
                                <textarea name="module_description" class="form-control"></textarea>
                                        <span class="validation_error" id="module_description_error"></span>

                                                    </div>                    
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="save_custom_module_data" class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="largeModalLabel">Add Section For other Page</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" id="set_section_for_other_page" action="{{ route('set_module_for_other_page') }}">
                                    @csrf
                                <input type="hidden" name="set_for_other_page_module_id" value="">

                                                    <div class="form-group"><label for="website_title" class=" form-control-label">Select Page</label>
                                                        {!! Form::select('page_id',$data['pages'],'',['class'=>'form-control']) !!}
                                                        <span class="validation_error" id="page_id_error"></span>

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
        $('#save_custom_module_data').on('click',function(){
            $('#custom_module_form').submit();
        });
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
        ajaxSuccess(newResponse, '{{ route("currency_settings") }}');
      },
      error: function(response) {
        ajaxError();
      },
      });
    });

   $('#custom_module_form').on('submit',function(e){
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
        ajaxSuccess(newResponse, '{{ route("modules",encrypt($data["page"]->id)) }}');
      },
      error: function(response) {
        ajaxError();
      },
      });
    });

   $('#set_section_for_other_page').on('submit',function(e){
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
        ajaxSuccess(newResponse, '{{ route("modules",encrypt($data["page"]->id)) }}');
      },
      error: function(response) {
        ajaxError();
      },
      });
    });
  </script>
    @endsection
    