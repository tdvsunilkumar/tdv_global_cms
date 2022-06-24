@extends('layouts.admin.main')

@section('content')  
        <!-- Header-->
        <?php //dd($data['allSettings']['is_maintenance_mode']); ?>
        
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Manage Theme Settings</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                       <!--  <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol> -->
                        {{ Breadcrumbs::render('settings') }}
                    </div>
                </div>
            </div>
        </div>

       <div class="content mt-3">

            <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                            
                            <div class="card-body">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link" id="v-pills-home-tab"  href="{{ route('settings') }}" role="tab" aria-controls="v-pills-home" aria-selected="true">Website Setting</a>

                                    <a class="nav-link" id="v-pills-profile-tab"  href="{{ route('logo_settings') }}" role="tab" aria-controls="v-pills-profile" aria-selected="false">Website Logo</a>

                                    <a class="nav-link" id="v-pills-messages-tab" href="{{route('terms_policy_settings')}}" role="tab" aria-controls="v-pills-messages" aria-selected="false">Terms & Policy Page</a>

                                    <a class="nav-link" id="v-pills-settings-tab"  href="{{ route('currency_settings') }}" role="tab" aria-controls="v-pills-settings" aria-selected="false">Currency Setting</a>

                                    <a class="nav-link" id="v-pills-settings-tab"  href="{{ route('email_settings') }}" role="tab" aria-controls="v-pills-settings" aria-selected="false">Email Setting</a>
                                    
                                     <a class="nav-link" id="v-pills-settings-tab"  href="{{ route('other_settings') }}" role="tab" aria-controls="v-pills-settings" aria-selected="false">Other Setting</a>

                                     <a class="nav-link active" id="v-pills-settings-tab"  href="{{ route('theme_settings') }}" role="tab" aria-controls="v-pills-settings" aria-selected="false">Theme Setting</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-header">
                                <h4>Theme Setting</h4>
                            </div>
                            <div class="card-body">
                                  <div class="animated fadeIn">
                <div class="row">
                   @if(!empty($data['allThemes']))
                   @foreach($data['allThemes'] as $theme)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header text-center">
                                <strong class="card-title pl-2">{{ $theme['theme_name'] }}</strong>
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    <img class="mx-auto d-block" src="{{ $admin_asset_path.$theme['theme_image'] }}" alt="Card image cap">
                                    <!-- <h5 class="text-sm-center mt-2 mb-1">Steven Lee</h5>
                                    <div class="location text-sm-center"><i class="fa fa-map-marker"></i> California, United States</div> -->
                                </div>
                                <hr>
                                <div class="card-text text-sm-center">
                                   
                                    
                                    <a href="#"><button type="button" id="activate_theme_{{ (isset($theme['id']))?$theme['id']:0 }}" data-theme-id="{{ (isset($theme['id']))?$theme['id']:0 }}" class="btn btn-primary btn-sm" data-action-type="{{ (isset($data['allSettings']['is_theme_active']) && $data['allSettings']['is_theme_active'] == 1)?'deactivate':'activate' }}">{{ (isset($data['allSettings']['is_theme_active']) && $data['allSettings']['is_theme_active'] == 1 && isset($theme['id']) && isset($data['allSettings']['theme_id']) && $data['allSettings']['theme_id'] == $theme['id'])?'Deactivate':'Activate' }}</button></a>
                                    <script type="text/javascript">
                                                    $('#activate_theme_{{ (isset($theme['id']))?$theme['id']:0 }}').on('click',function(){
                                                        var themeId = $(this).data('theme-id');
                                                        var actionType = $(this).data('action-type');
                                                        $('#activate_theme_form_id_field').val(themeId);
                                                        $('#activate_theme_form_action_type_field').val(actionType);
                                                        $('#website_setting_section_form').submit();
                                                        //alert(id);
                                                    });
                                                </script>

                                    <a href="{{ $theme['theme_preview_url'] }}" target="_blank"><button type="button" class="btn btn-primary btn-sm">Preview</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                     <form method="post" id="website_setting_section_form" action="{{ route('update_theme_settings') }}">
                                    @csrf
                                    <input type="hidden" id="activate_theme_form_id_field" name="id" value="{{ encrypt($theme['id']) }}">
                                    <input type="hidden" id="activate_theme_form_action_type_field" name="action_type" value="">
                                    </form>
                    @endforeach
                    @endif

                </div><!-- .row -->
            </div><!-- .animated -->
                                                </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .animated -->
                                    </div><!-- .content -->
                                </div><!-- /#right-panel -->
                                <!-- Right Panel -->

                            </div>
                        </div>
                    </div>
                </div>


        </div> <!-- .content -->
    @endsection
    @section('script')
    <script type="text/javascript">
        $('#activate_theme').on('click',function(e){
            $('#website_setting_section_form').submit();
        });
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
        ajaxSuccess(newResponse, '{{ route("theme_settings") }}');
      },
      error: function(response) {
        ajaxError();
      },
      });
    });
  </script>
    @endsection