@extends('layouts.admin.main')

@section('content')  
        <!-- Header-->
        <?php //dd($globalSettings['theme_id']); ?>
        
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
                        {{ Breadcrumbs::render('add_page') }}
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
                                <h4>Add New Page</h4>
                            </div>
                            <div class="card-body">
                                   <form method="post" id="website_setting_section_form" action="{{ route('store_page') }}">
                                    @csrf
                                   <input type="hidden" name="theme_id" value="{{ isset($globalSettings['theme_id'])?$globalSettings['theme_id']:0 }}">
                                   <input type="hidden" name="id" value="{{ (isset($data['page']['id'])) ? $data['page']['id']:'' }}">
                                   <div class="form-group"><label for="vat" class=" form-control-label">Page Name</label>
                                        <input type="text" name="page_name" id="page_name" class="form-control" value="{{ (isset($data['page']['page_name'])) ? $data['page']['page_name']:'' }}" >
                                        <span class="validation_error" id="page_name_error"></span>
                                    </div>

                                    <div class="form-group"><label for="vat" class=" form-control-label">Page Title</label>
                                        <input type="text" name="page_title" id="page_title" class="form-control" value="{{ (isset($data['page']['page_title'])) ? $data['page']['page_title']:'' }}" >
                                        <span class="validation_error" id="page_title_error"></span>

                                    </div>
                                    
                                        <div class="form-group"><label for="page_description" class=" form-control-label">Page Description</label>
                                            <textarea name="page_description" id="page_description"  class="form-control">{{ (isset($data['page']['page_description'])) ? $data['page']['page_description']:'' }}</textarea>
                                            <span class="validation_error" id="page_description_error"></span>


                                        </div>
                                            <div class="form-group"><label for="website_keywords" class=" form-control-label">Page Keywords</label>
                                                <textarea name="page_keywords" id="page_keywords" class="form-control">{{ (isset($data['page']['page_keywords'])) ? $data['page']['page_keywords']:'' }}</textarea>
                                                <span class="validation_error" id="page_keywords_error"></span>

                                            </div>
                                                    <div class="form-group"><label for="website_title" class=" form-control-label">Page Slug</label>
                                                        <input type="text" id="page_slug" name="page_slug" class="form-control" value="{{ (isset($data['page']['page_slug'])) ? $data['page']['page_slug']:'' }}">
                                                        <span class="validation_error" id="page_slug_error"></span>

                                                    </div>

                                                    <div class="form-group"><label for="website_title" class=" form-control-label">Page Status</label>
                                                        {!! Form::select('is_active',['1'=>'Active','0'=>'Deactive'],(isset($data['page']['is_active']))?$data['page']['is_active']:1,['class'=>'form-control']) !!}
                                                        <span class="validation_error" id="is_active_error"></span>

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
function convertToSlug(Text) {
  return Text.toLowerCase()
             .replace(/ /g, '-')
             .replace(/[^\w-]+/g, '');
}
    $('#page_title').on('input', function() {
    var res = convertToSlug($(this).val());
    $('#page_slug').val(res);

});
</script>
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
        ajaxSuccess(newResponse, '{{ route("pages") }}');
      },
      error: function(response) {
        ajaxError();
      },
      });
    });
  </script>

    @endsection