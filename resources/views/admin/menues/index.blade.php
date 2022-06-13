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
                                <h4>Add New Menu</h4>
                            </div>
                            <div class="card-body">
                                 <form method="post" id="website_setting_section_form" action="{{ route('add_menu') }}">
                                    @csrf
                                   <input type="hidden" name="id" value="{{ (isset($data['menu']['id'])) ? $data['menu']['id']:'' }}">
                                    <div class="form-group"><label for="vat" class=" form-control-label">Menu Name</label>
                                        <input type="text" name="menu_name" id="menu_name" class="form-control" value="{{ (isset($data['menu']['menu_name'])) ? $data['menu']['menu_name']:'' }}" >
                                        <span class="validation_error" id="menu_name_error"></span>

                                    </div>

                                    <div class="form-group"><label for="website_title" class=" form-control-label">Menu Location</label>
                                                        {!! Form::select('menu_location',['Header'=>'Header','Footer'=>'Footer'],(isset($data['menu']['menu_location']))?$data['menu']['menu_location']:'',['class'=>'form-control']) !!}
                                                        <span class="validation_error" id="menu_location_error"></span>

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
        ajaxSuccess(newResponse, '{{ route("menue_list") }}');
      },
      error: function(response) {
        ajaxError();
      },
      });
    });
  </script>

    @endsection