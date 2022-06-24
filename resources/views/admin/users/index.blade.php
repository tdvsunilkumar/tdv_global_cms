@extends('layouts.admin.main')

@section('content')  
        <!-- Header-->
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Update User Details</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                       <!--  <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol> -->
                        {{ Breadcrumbs::render('edit_user') }}
                    </div>
                </div>
            </div>
        </div>

       <div class="content mt-3">

            <div class="row">
                    
                    <!-- /# column -->
                    <div class="col-lg-12">
                       <div class="login-content">
               
                <div class="login-form">
                    <form id="update_user_data_form" method="post" action="{{ route('update_user') }}">
                        @csrf
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" value="{{ (isset($data['user']->name))?$data['user']->name:'' }}" name="name" class="form-control" placeholder="User Name">
                            <span class="validation_error" id="name_error"></span>
                        </div>
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" value="{{ (isset($data['user']->email))?$data['user']->email:'' }}" name="email" class="form-control" placeholder="Email">
                                <span class="validation_error" id="email_error"></span>
                        </div>

                        <div class="form-group">
                                <label>Old Password</label>
                                <input type="password" name="old_password" class="form-control" placeholder="Old Password" autocomplete="off">
                                <span class="validation_error" id="old_password_error"></span>
                        </div>

                        <div class="form-group">
                                <label>New Password</label>
                                <input type="password" name="new_password" class="form-control" placeholder="New Password" autocomplete="off">
                                <span class="validation_error" id="new_password_error"></span>
                        </div>
                        <div class="form-group">
                                <label>Confirm New Password</label>
                                <input type="password" name="confirm_password" class="form-control" placeholder="New Password" autocomplete="off">
                                <span class="validation_error" id="confirm_password_error"></span>
                        </div>
                                
                                    
                                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Update</button>
                                    <div class="social-login-content"> 
                                    </div>
                                   
                    </form>
                </div>
            </div>
                    </div>
                </div>


        </div> <!-- .content -->
         
    @endsection
    @section('script')
    <script type="text/javascript">
$('#update_user_data_form').on('submit',function(e){
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
        ajaxSuccess(newResponse, '{{ route("edit_user_profile") }}');
      },
      error: function(response) {
        ajaxError();
      },
      });
    });
  </script>

    @endsection