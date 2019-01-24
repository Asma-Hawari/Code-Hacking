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
                            <h5 class="card-header">Basic Table</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Owner</th>
                                                <th>Category</th>
                                                <th>Photo</th>
                                                
                                                <th>title</th>
                                                <th>body</th>
                                                <th>Created</th>
                                                <th>Update</th>
                                                  <th>Action</th>
                                            </tr>
                                            @if($posts)
                                            @foreach($posts as $post)
                                             <tr>
                                                <td>{{$post->id}}</td>
                                                <td>{{$post->user->name}}</td>
                                                <td>{{$post->category->name}}</td>

        <td><img height = "50" src="{{$post->photo_id ?$post->photo->path:'/images/no-photo.png'}}">
                            <td>{{$post->title}}</td>
                            <td>{{$post->body}}</td>
                                               
            <td>{{$post->created_at != null ? $post->created_at->diffForHumans() : 'Null'}}
                                                </td>

    <td>{{$post->updated_at != null ? $post->updated_at->diffForHumans():'Null'}}</td>
    <td>
                                            <a href="{{route('posts.edit',$post->id)}}" 
                                               type="button" class="btn bg-green waves-effect">
                                                <i class="material-icons">edit</i>
                                            </a>
                                <button onclick = "deleteProduct({{$post ->id}})" type="button" class="btn btn-danger waves-effect">
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