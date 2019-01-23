@extends('app.index')
@section('content')



                        <div class="page-header">
                            <h2 class="pageheader-title">Data Tables</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Tables</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                           
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
               
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                          
                                <div class="card">
                                    <h5 class="card-header">Create A New User </h5>
                                    <div class="card-body">
                    <form method="POST" , action="/admin/users" enctype="multipart/form-data">
                        {{ csrf_field() }}
                                            <div class="form-group">
                                                <label for="inputText3" class="col-form-label">Name</label>
                                <input id="inputText3" type="text" class="form-control" name = "name">
                                
                                        @if($errors->has('name'))
                                        <div class="help-info text-danger">{{ $errors->first('name') }}</div>
                                        @endif
                                           
                                            </div><br>
                                            <div class="form-group">
                                                <label for="inputEmail">Email address</label>
                                                <input id="inputEmail" type="email" placeholder="name@example.com" class="form-control" name="email">
                                               @if($errors->has('email'))
                                        <div class="help-info text-danger">{{ $errors->first('email') }}</div>
                                        @endif
                                            </div><br>
           <div class="form-group">                               
<label>Attach your profile photo</label><br>
         
               {!!Form::file('photo' , null)!!}
                         </div>
                           

                            <div class="form-group">
                                                <label for="inputPassword">Password</label>
                                                <input id="inputPassword" type="password"  name = "password" placeholder="Password" class="form-control">
                                                     @if($errors->has('password'))
                                        <div class="help-info text-danger">{{ $errors->first('password') }}</div>
                                        @endif
                                            </div><br>
                                    <div class="form-group">
                                    <label for="inputPassword">confirm Password</label>
                                    <input id="password-confirm" type="password" name="password_confirmation"  class="form-control">
                                         @if($errors->has('password_confirmation'))
                                        <div class="help-info text-danger">{{ $errors->first('password_confirmation') }}</div>
                                        @endif

                                            </div><br>
                                            <div class="form-group">
                                            <label for="input-select">Select a Role</label>
                                            <select class="form-control" id="input-select" name="role_id">
                                                <option>Choose an option</option>
                                                @foreach($roles as $role)
                                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                                    
                                                    @endforeach
                                                </select>
                                            </div><br>
                                            <div class="form-group">
                                                 <label for="input-switch">Activate The User</label><br>
                                           
                                            <div class="switch-button switch-button-lg">

                        <input type="checkbox" checked="" name="is_active" id="switch15"><span>
                                                    <label for="switch15"></label></span>
                                                    </div>
                                                     </div><br>
                            <button type="submit" class="btn btn-outline-primary btn-lg">Submit The New User</button>
                                        
                                       </form>
                                    </div>
                           
                   
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
   
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  
    <script src="/assets/vendor/multi-select/js/jquery.multi-select.js"></script>

    
@endsection