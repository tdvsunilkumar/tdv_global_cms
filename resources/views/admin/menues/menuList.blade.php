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
                        {{ Breadcrumbs::render('pages') }}
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
                                <a href="{{ route('menues') }}"><button>Add New</button></a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Menu Name</th>
                                            <th>Menu Location</th>
                                            <th>Action</th>
                                            <th>Set Menu Items</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data['menues'] as $page)
                                        <tr>
                                            <td>{{ $page['menu_name'] }}</td>
                                            <td>{{ $page['menu_location'] }}</td>
                                            
                                            <td><a href="{{ route('menues',encrypt($page['id'])) }}"><i class="fa fa-edit"></i></a> <a href=""><i class="fa fa-trash"></i></a></td>
                                            <td><a target="_blank" href="{{ route('setmenuitem',encrypt($page['id'])) }}"><button>Set</button></a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->


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