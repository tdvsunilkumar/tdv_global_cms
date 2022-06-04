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
                                    <a class="nav-link active" id="v-pills-home-tab"  href="{{ route('settings') }}" role="tab" aria-controls="v-pills-home" aria-selected="true">Website Setting</a>

                                    <a class="nav-link" id="v-pills-profile-tab"  href="{{ route('logo_settings') }}" role="tab" aria-controls="v-pills-profile" aria-selected="false">Website Logo</a>

                                    <a class="nav-link" id="v-pills-messages-tab" href="{{route('terms_policy_settings')}}" role="tab" aria-controls="v-pills-messages" aria-selected="false">Terms & Policy Page</a>

                                    <a class="nav-link" id="v-pills-settings-tab"  href="{{ route('currency_settings') }}" role="tab" aria-controls="v-pills-settings" aria-selected="false">Currency Setting</a>

                                    <a class="nav-link" id="v-pills-settings-tab"  href="{{ route('email_settings') }}" role="tab" aria-controls="v-pills-settings" aria-selected="false">Email Setting</a>
                                    
                                     <a class="nav-link" id="v-pills-settings-tab"  href="{{ route('other_settings') }}" role="tab" aria-controls="v-pills-settings" aria-selected="false">Other Setting</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-header">
                                <h4>Website Setting</h4>
                            </div>
                            <div class="card-body">
                                 <form method="post" id="website_setting_section_form" action="{{ route('update_settings') }}">
                                    @csrf
                                 <div class="form-group">
                                    <label for="company" class=" form-control-label">Maintenance mode</label>
                                    <label class="switch switch-3d switch-primary mr-3">
                                        <input type="checkbox" class="switch-input" name="is_maintenance_mode" <?php echo (isset($data['allSettings']) && array_key_exists('is_maintenance_mode',$data['allSettings']) && $data['allSettings']['is_maintenance_mode'] == 1) ? 'checked':''; ?>> 
                                        <span class="switch-label"></span> <span class="switch-handle"></span></label>
                                </div>
                                    <div class="form-group"><label for="vat" class=" form-control-label">Website Name</label>
                                        <input type="text" name="website_name" id="website_name" class="form-control" value="{{ (isset($data['allSettings']['website_name'])) ? $data['allSettings']['website_name']:'' }}" >
                                        <span class="validation_error" id="website_name_error"></span>

                                    </div>
                                        <div class="form-group"><label for="website_desc" class=" form-control-label">Website Description</label>
                                            <textarea name="website_desc" id="street"  class="form-control">{{ (isset($data['allSettings']['website_desc'])) ? $data['allSettings']['website_desc']:'' }}</textarea>
                                            <span class="validation_error" id="website_desc_error"></span>


                                        </div>
                                            <div class="form-group"><label for="website_keywords" class=" form-control-label">Website Keywords</label>
                                                <textarea name="website_keywords" id="website_keywords" class="form-control">{{ (isset($data['allSettings']['website_keywords'])) ? $data['allSettings']['website_keywords']:'' }}</textarea>
                                                <span class="validation_error" id="website_keywords_error"></span>

                                            </div>
                                                    <div class="form-group"><label for="website_title" class=" form-control-label">Website Title</label>
                                                        <input type="text" id="website_title" name="website_title" class="form-control" value="{{ (isset($data['allSettings']['website_title'])) ? $data['allSettings']['website_title']:'' }}">
                                                        <span class="validation_error" id="website_title_error"></span>

                                                    </div>
                                                    <div>
                                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                        <span id="payment-button-amount">Submit</span>
                                                    </button>
                                                </form>
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
        ajaxSuccess(newResponse, '{{ route("settings") }}');
      },
      error: function(response) {
        ajaxError();
      },
      });
    });
  </script>
    @endsection