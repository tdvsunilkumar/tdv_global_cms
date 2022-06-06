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
                        {{ Breadcrumbs::render('modules') }}
                    </div>
                </div>
            </div>
        </div>

       <div class="content mt-3">

         <div class="row">
                   
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Module Settings</h4>
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
                                    
                                    <a href="#"><button type="button" id="activate_theme" class="btn btn-primary btn-sm">Modify</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif

                </div><!-- .row -->


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
        ajaxSuccess(newResponse, '{{ route("currency_settings") }}');
      },
      error: function(response) {
        ajaxError();
      },
      });
    });
  </script>
    @endsection