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

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                        <div class="card">
                            <h5 class="card-header">Create a  new Category</h5>
                            <div class="card-body">
    {!!Form::open(['method'=>'POST' , 'action'=>'AdminCategoriesController@store' , 'files' => true])!!}
                    
                        {{ csrf_field() }}
                                            <div class="form-group">
                                                <label for="inputText3" class="col-form-label">name</label>
                                <input id="inputText3" type="text" class="form-control" name = "name">
                                
                                        @if($errors->has('name'))
                                        <div class="help-info text-danger">{{ $errors->first('name') }}</div>
                                        @endif
                                           
                                            </div><br>
                            <button type="submit" class="btn btn-outline-primary btn-lg">Submit The New Post</button>
                                        
                                      {!!Form::close()!!}
                    </div>
                </div>
            </div>
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                        <div class="card">
                            <h5 class="card-header">Basic Table</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                               
                                                
                                                <th>name</th>
                                              
                                                <th>Created</th>
                                               
                                                  <th>Action</th>
                                            </tr>
                                            @if($categories)
                                            @foreach($categories as $cat)
                                             <tr>
                                                <td>{{$cat->id}}</td>
                                                <td>{{$cat->name}}</td>
                                                

                                               
            <td>{{$cat->created_at != null ? $cat->created_at->diffForHumans() : 'Null'}}
                                                </td>
    <td>
                            <a href="{{route('categories.edit',$cat->id)}}" 
                                               type="button" class="btn bg-green waves-effect">
                                                <i class="material-icons">edit</i>
                                            </a>
                                <button onclick = "deleteProduct({{$cat ->id}})" type="button" class="btn btn-danger waves-effect">
                                                <i class="material-icons">delete</i>
                                            </button>
                                        </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                            
                                        </thead>
                                        <tbody>
                                           
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                   
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    @endsection
    @section('script')

   
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="/assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
     <script src="/assets/vendor/datatables/js/data-table.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
     <script src="sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

    
@endsection