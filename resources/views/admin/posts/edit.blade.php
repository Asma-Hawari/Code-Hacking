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
 {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT','files'=>true]) !!}
                    
                        {{ csrf_field() }}
                                            <div class="form-group">
                                                <label for="inputText3" class="col-form-label">Title</label>
                                <input id="inputText3" type="text" class="form-control" name = "title">
                                
                                        @if($errors->has('title'))
                                        <div class="help-info text-danger">{{ $errors->first('title') }}</div>
                                        @endif
                                           
                                            </div><br>
                                          
           <div class="form-group">                               
<label>Attach your profile photo</label><br>
         
               {!!Form::file('photo' , null)!!}
                         </div><br>
                           

                           
                                            <div class="form-group">
                                            <label for="input-select">Select a Category</label>
                                            <select class="form-control" id="input-select" name="category_id">
                                                <option>Choose an option</option>
                                                @foreach($categories as $cat)
                                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                    @endforeach
                                                   
                                                </select>
                                            </div><br>
                                        <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Description</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" name="body" rows="3"></textarea>
                                            </div>
                            <button type="submit" class="btn btn-outline-primary btn-lg">Submit The New Post</button>
                                        
                                      {!!Form::close()!!}
                                    </div>
                           
                   
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
   
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  
    <script src="/assets/vendor/multi-select/js/jquery.multi-select.js"></script>

    
@endsection