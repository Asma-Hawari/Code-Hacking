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
                                                <th>image</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th>Created</th>
                                                <th>Update</th>
                                                  <th>Action</th>
                                            </tr>
                                            @if($users)
                                            @foreach($users as $user)
                                             <tr>
                                                <td>{{$user->id}}</td>
        <td><img height = "50" src="{{$user->photo_id ?$user->photo->path:'/images/no-photo.png'}}">
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>

                            <td>{{$user->role_id != null ? $user->role->name :'No Role'}}</td>
                            <td>{{$user->is_active == 1 ? 'Active' :'Not Active'}}</td>
                                               
            <td>{{$user->created_at != null ? $user->created_at->diffForHumans() : 'Null'}}
                                                </td>

    <td>{{$user->updated_at != null ? $user->updated_at->diffForHumans():'Null'}}</td>
    <td>
                                            <a href="{{url('/admin/users/'.$user->id.'/edit')}}" 
                                               type="button" class="btn bg-green waves-effect">
                                                <i class="material-icons">edit</i>
                                            </a>
                                <button onclick = "deleteProduct({{$user ->id}})" type="button" class="btn btn-danger waves-effect">
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

       <script type="text/javascript">
    function deleteProduct(id) {
    Swal.fire({
    title: "Confirmation",
    text: "Are you sure you want to delete the Product?",
    showCancelButton: true,
           
    }).then(function (input) {
    if (input.value){
    $.ajax({
   type: "delete",
                url: "{{url('admin/users/')}}",
                data: {id:id},
            success: function (data) {
            $('#user' + id).fadeOut();
            swal("Deleted successfuly!");
            }
    });
    }
    });
    }
</script>

    
@endsection