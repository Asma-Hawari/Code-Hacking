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
                                              
                                                <th>Photo</th>
                                                
                                           
                                                <th>Created</th>
                                            
                                                  <th>Action</th>
                                            </tr>
                                            @if($photos)
                                            @foreach($photos as $photo)
                                             <tr>
                                                <td>{{$photo->id}}</td>
                                              

        <td><img height = "50" src="{{$photo->id ?$photo->path:'/images/no-photo.png'}}">
                           
                                               
            <td>{{$photo->created_at != null ? $photo->created_at->diffForHumans() : 'Null'}}
                                                </td>
    <td>
                                            <a href="{{route('media.edit',$photo->id)}}" 
                                               type="button" class="btn bg-green waves-effect">
                                                <i class="material-icons">edit</i>
                                            </a>
                                <button onclick = "deleteProduct({{$photo ->id}})" type="button" class="btn btn-danger waves-effect">
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