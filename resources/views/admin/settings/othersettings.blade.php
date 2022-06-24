@extends('layouts.admin.main')

@section('content')  
        <!-- Header-->
        <?php //dd($data['allSettings']['is_maintenance_mode']); ?>
        
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Manage Other Settings</h1>
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
                                    
                                     <a class="nav-link active" id="v-pills-settings-tab"  href="{{ route('other_settings') }}" role="tab" aria-controls="v-pills-settings" aria-selected="false">Other Setting</a>

                                     <a class="nav-link" id="v-pills-settings-tab"  href="{{ route('theme_settings') }}" role="tab" aria-controls="v-pills-settings" aria-selected="false">Theme Setting</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-header">
                                <h4>Other Setting</h4>
                            </div>
                            <div class="card-body">
                                 <form method="post" id="website_setting_section_form" action="{{ route('update_other_settings') }}">
                                    @csrf
                                 
                                    <div class="form-group"><label for="vat" class=" form-control-label">Embed Code</label>
                                        <small>(Put in the <head> tag of the page. Using for Google Analytics, Facebook pixel code etc)</small>
                                            <textarea id="embed_head_javascript" name="embed_head_javascript" style="display: none;">{{ (isset($data['allSettings']['embed_head_javascript'])) ? $data['allSettings']['embed_head_javascript']:'' }}</textarea>
                                            <!-- <div id="code_mirror_embed_head_javascript"></div> -->
                                       <!-- <textarea name="embed_head_javascript" id="embed_head_javascript"  class="form-control">{{ (isset($data['allSettings']['embed_head_javascript'])) ? $data['allSettings']['embed_head_javascript']:'' }}</textarea> -->
                                        Note: Only supports Javascript code

                                    </div>
                                        <div class="form-group"><label for="vat" class=" form-control-label">Embed Code</label>
                                            <small>(Be placed immediately before the closing </body> tag of the page. Using for Chat plugin etc)</small>
                                            <textarea id="embed_javascript" style="display: none;" name="embed_javascript">{{ (isset($data['allSettings']['embed_javascript'])) ? $data['allSettings']['embed_javascript']:'' }}</textarea>
                                            
                                       <!-- <textarea name="embed_head_javascript" id="embed_head_javascript"  class="form-control">{{ (isset($data['allSettings']['embed_head_javascript'])) ? $data['allSettings']['embed_head_javascript']:'' }}</textarea> -->
                                        Note: Only supports Javascript code

                                    </div>
                                                    <div class="form-group"><label for="website_title" class=" form-control-label">Facebook Link</label>
                                                        <input type="text" id="social_facebook_link" name="social_facebook_link" class="form-control" value="{{ (isset($data['allSettings']['social_facebook_link'])) ? $data['allSettings']['social_facebook_link']:'' }}">
                                                        <span class="validation_error" id="social_facebook_link_error"></span>

                                                    </div>

                                                    <div class="form-group"><label for="website_title" class=" form-control-label">Instagram Link</label>
                                                        <input type="text" id="social_instagram_link" name="social_instagram_link" class="form-control" value="{{ (isset($data['allSettings']['social_instagram_link'])) ? $data['allSettings']['social_instagram_link']:'' }}">
                                                        <span class="validation_error" id="social_instagram_link_error"></span>

                                                    </div>

                                                    <div class="form-group"><label for="website_title" class=" form-control-label">Pinterest Link</label>
                                                        <input type="text" id="social_pinterest_link" name="social_pinterest_link" class="form-control" value="{{ (isset($data['allSettings']['social_pinterest_link'])) ? $data['allSettings']['social_pinterest_link']:'' }}">
                                                        <span class="validation_error" id="social_pinterest_link_error"></span>

                                                    </div>

                                                    <div class="form-group"><label for="website_title" class=" form-control-label">Twitter Link</label>
                                                        <input type="text" id="social_twitter_link" name="social_twitter_link" class="form-control" value="{{ (isset($data['allSettings']['social_twitter_link'])) ? $data['allSettings']['social_twitter_link']:'' }}">
                                                        <span class="validation_error" id="social_twitter_link_error"></span>

                                                    </div>

                                                    <div class="form-group"><label for="website_title" class=" form-control-label">Tumbler Link</label>
                                                        <input type="text" id="social_tumblr_link" name="social_tumblr_link" class="form-control" value="{{ (isset($data['allSettings']['social_tumblr_link'])) ? $data['allSettings']['social_tumblr_link']:'' }}">
                                                        <span class="validation_error" id="social_tumblr_link_error"></span>

                                                    </div>

                                                    <div class="form-group"><label for="website_title" class=" form-control-label">Youtube Link</label>
                                                        <input type="text" id="social_youtube_link" name="social_youtube_link" class="form-control" value="{{ (isset($data['allSettings']['social_youtube_link'])) ? $data['allSettings']['social_youtube_link']:'' }}">
                                                        <span class="validation_error" id="social_youtube_link_error"></span>

                                                    </div>

                                                    <div class="form-group"><label for="website_title" class=" form-control-label">Telephone</label>
                                                        <input type="text" id="contact_tel" name="contact_tel" class="form-control" value="{{ (isset($data['allSettings']['contact_tel'])) ? $data['allSettings']['contact_tel']:'' }}">
                                                        <span class="validation_error" id="contact_tel_error"></span>

                                                    </div>

                                                    <div class="form-group"><label for="website_title" class=" form-control-label">Email</label>
                                                        <input type="text" id="contact_email" name="contact_email" class="form-control" value="{{ (isset($data['allSettings']['contact_email'])) ? $data['allSettings']['contact_email']:'' }}">
                                                        <span class="validation_error" id="contact_email_error"></span>

                                                    </div>

                                                    <div class="form-group"><label for="website_title" class=" form-control-label">Company</label>
                                                        <input type="text" id="company_name" name="company_name" class="form-control" value="{{ (isset($data['allSettings']['company_name'])) ? $data['allSettings']['company_name']:'' }}">
                                                        <span class="validation_error" id="company_name_error"></span>

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
      setTimeout(function(){

        var editor = CodeMirror.fromTextArea(document.getElementById("embed_head_javascript"), {
          lineNumbers: true,
          theme: "monokai"
        });

        var editor = CodeMirror.fromTextArea(document.getElementById("embed_javascript"), {
          lineNumbers: true,
          theme: "monokai"
        });

      }, 100);
  </script>
    @endsection