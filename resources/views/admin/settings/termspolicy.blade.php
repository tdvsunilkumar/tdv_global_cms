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
                                    <a class="nav-link" id="v-pills-home-tab"  href="{{ route('settings') }}" role="tab" aria-controls="v-pills-home" aria-selected="true">Website Setting</a>

                                    <a class="nav-link" id="v-pills-profile-tab"  href="{{ route('logo_settings') }}" role="tab" aria-controls="v-pills-profile" aria-selected="false">Website Logo</a>

                                    <a class="nav-link active" id="v-pills-messages-tab" href="{{route('terms_policy_settings')}}" role="tab" aria-controls="v-pills-messages" aria-selected="false">Terms & Policy Page</a>

                                    <a class="nav-link" id="v-pills-settings-tab"  href="{{ route('currency_settings') }}" role="tab" aria-controls="v-pills-settings" aria-selected="false">Currency Setting</a>

                                    <a class="nav-link" id="v-pills-settings-tab"  href="{{ route('email_settings') }}" role="tab" aria-controls="v-pills-settings" aria-selected="false">Email Setting</a>
                                    
                                     <a class="nav-link" id="v-pills-settings-tab"  href="{{ route('other_settings') }}" role="tab" aria-controls="v-pills-settings" aria-selected="false">Other Setting</a>

                                     <a class="nav-link" id="v-pills-settings-tab"  href="{{ route('theme_settings') }}" role="tab" aria-controls="v-pills-settings" aria-selected="false">Theme Setting</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-header">
                                <h4>Terms and Policy Page</h4>
                            </div>
                            <div class="card-body">
                                
                                 <form method="post" id="website_setting_section_form" action="{{ route('update_terms_policy') }}">
                                    @csrf

                                    <div class="form-group"><label for="vat" class=" form-control-label">Content of Policy</label>
                                         <textarea  name="policy_content"  id="policy_content">{{ (isset($data['allSettings']['policy_content'])) ? $data['allSettings']['policy_content']:'' }}</textarea>

                                    </div>
                                       <div class="form-group"><label for="vat" class=" form-control-label">Content of Terms</label>
                                         <textarea  name="terms_content"  id="terms_content">{{ (isset($data['allSettings']['terms_content'])) ? $data['allSettings']['terms_content']:'' }}</textarea>

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
        CKEDITOR.replace( 'policy_content' );
        CKEDITOR.replace( 'terms_content' );
$('#website_setting_section_form').on('submit',function(e){
    loadspinner();
    var policyContent = CKEDITOR.instances.policy_content.getData();
    var termsContent = CKEDITOR.instances.terms_content.getData();
    var data = {
        "_token": "{{ csrf_token() }}",
        "policy_content" : policyContent,
        "terms_content"  : termsContent 
    }
    e.preventDefault();
    $.ajax({
      url: $(this).data('url'),
      type:"POST",
      data:data,
      success:function(response){
        hidespinner();
        var newResponse = JSON.parse(response);
        ajaxSuccess(newResponse, '{{ route("terms_policy_settings") }}');
      },
      error: function(response) {
        ajaxError();
      },
      });
    });
  </script>
    @endsection