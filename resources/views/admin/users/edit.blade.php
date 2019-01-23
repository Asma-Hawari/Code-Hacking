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
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        <div> <h1> {{$user->name}}</h1></div>
                        <div style="border: double 10px ;">
                <img height = "300" width="250" src="{{$user->photo_id !=0 ?$user->photo->path : '/images/no-photo.png'}}"></div>
             </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                          
                                <div class="card">
                                    <h5 class="card-header">Edit User </h5>
                                    <div class="card-body">
             {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT','files'=>true]) !!}
                        {{ csrf_field() }}
                                            <div class="form-group">
                                                <label for="inputText3" class="col-form-label">Name</label>
                                <input id="inputText3" type="text" class="form-control" name = "name" value="{{old('name',$user->name)}}">
                                
                                        @if($errors->has('name'))
                                        <div class="help-info text-danger">{{ $errors->first('name') }}</div>
                                        @endif
                                           
                                            </div><br>
                                            <div class="form-group">
                                                <label for="inputEmail">Email address</label>
                                                <input id="inputEmail" type="email" placeholder="name@example.com" class="form-control" name="email" value="{{old('email',$user->email)}}">
                                               @if($errors->has('email'))
                                        <div class="help-info text-danger">{{ $errors->first('email') }}</div>
                                        @endif
                                            </div><br>
           <div class="form-group">                               
<label>Attach your profile photo</label><br>
         
              <input type="file" name="photo_id" value="{{old('photo',$user->photo_id !=0? $user->photo->path : null)}}">
                         </div>


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
                                        
                                       {!!Form::close()!!}
                                    </div>
                           
                   
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
   
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  
    <script src="/assets/vendor/multi-select/js/jquery.multi-select.js"></script>

    
@endsection