@extends('layouts.admin.main')

@section('content')  
        <!-- Header-->
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add/Update new Blog Details</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                       <!--  <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol> -->
                        {{ Breadcrumbs::render('add_blogs') }}
                    </div>
                </div>
            </div>
        </div>

       <div class="content mt-3">

            <div class="row">
                    
                    <!-- /# column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Add New Blog</h4>
                            </div>
                            <div class="card-body">
                                   <form method="post" id="website_setting_section_form" action="{{ route('store_blog') }}">
                                    @csrf
                                   <input type="hidden" name="theme_id" value="{{ isset($globalSettings['theme_id'])?$globalSettings['theme_id']:0 }}">
                                   <input type="hidden" name="id" value="{{ (isset($data['blog']['id'])) ? $data['blog']['id']:'' }}">
                                   <div class="form-group"><label for="vat" class=" form-control-label">Blog Name</label>
                                        <input type="text" name="blog_name" id="blog_name" class="form-control" value="{{ (isset($data['blog']['blog_name'])) ? $data['blog']['blog_name']:'' }}" >
                                        <span class="validation_error" id="blog_name_error"></span>

                                    </div>

                                    <div class="form-group"><label for="vat" class=" form-control-label">Blog Title</label>
                                        <input type="text" name="blog_title" id="blog_title" class="form-control" value="{{ (isset($data['blog']['blog_title'])) ? $data['blog']['blog_title']:'' }}" >
                                        <span class="validation_error" id="blog_title_error"></span>

                                    </div>
                                    <div class="form-group">
                                    <label class=" form-control-label">Blog Image</label>
                                    <div class="input-group">
                                        
                                        <input class="form-control" id="blog_image" name="blog_image" value="{{ (isset($data['blog']['blog_image'])) ? $data['blog']['blog_image']:'' }}" readonly/>
                                        <div class="input-group-addon"><a href="{{ route('elfinder.ckeditor') }}" class="popup_selector" data-inputid="blog_image"><i class="fa fa-image">
                                            
                                                
                                            </i></a></div>
                                    </div>
                                    
                                </div>
                                        <div class="form-group"><label for="page_description" class=" form-control-label">Blog Description</label>
                                            <textarea name="blog_description" id="blog_description"  class="form-control">{{ (isset($data['blog']['blog_description'])) ? $data['blog']['blog_description']:'' }}</textarea>
                                            <span class="validation_error" id="blog_description_error"></span>


                                        </div>
                                            <div class="form-group"><label for="blog_content" class=" form-control-label">Blog Content</label>
                                            <textarea name="blog_content" id="blog_content"  class="form-control">{{ (isset($data['blog']['blog_content'])) ? $data['blog']['blog_content']:'' }}</textarea>
                                            <span class="validation_error" id="blog_content_error"></span>


                                        </div>
                                        <div class="form-group"><label for="vat" class=" form-control-label">Blog Tags</label>
                                        <input type="text" name="blog_tags" id="blog_tags" class="form-control" value="{{ (isset($data['blog']['blog_tags'])) ? $data['blog']['blog_tags']:'' }}" >
                                        <small>Comma seperated</small>
                                        <span class="validation_error" id="blog_tags_error"></span>

                                    </div>
                                                 

                                                    <div class="form-group"><label for="website_title" class=" form-control-label">Display on Home Page</label>
                                                        {!! Form::select('is_feature',['1'=>'Yes','0'=>'No'],(isset($data['blog']['is_feature']))?$data['blog']['is_feature']:1,['class'=>'form-control']) !!}
                                                        <span class="validation_error" id="is_active_error"></span>

                                                    </div>
                                                     <div class="form-group"><label for="blog_slug" class=" form-control-label">Blog Slug</label>
                                                        <input type="text" id="blog_slug" name="blog_slug" class="form-control" value="{{ (isset($data['blog']['blog_slug'])) ? $data['blog']['blog_slug']:'' }}">
                                                        <span class="validation_error" id="blog_slug_error"></span>

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
          <script type="text/javascript">
                                                    CKEDITOR.replace( 'blog_content' );
        </script> 
    @endsection
    @section('script')
    <script type="text/javascript">
function convertToSlug(Text) {
  return Text.toLowerCase()
             .replace(/ /g, '-')
             .replace(/[^\w-]+/g, '');
}
    $('#blog_title').on('input', function() {
    var res = convertToSlug($(this).val());
    $('#blog_slug').val(res);

});
</script>
    <script type="text/javascript">
$('#website_setting_section_form').on('submit',function(e){
    loadspinner();
    var blog_content = CKEDITOR.instances.blog_content.getData();
    $('.validation_error').html('');
    e.preventDefault();
    var data = $(this).serializeArray();
    data.push({name: "blog_content", value: blog_content});
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

    @endsection