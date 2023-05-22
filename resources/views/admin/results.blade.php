@extends('admin_layout.layout')

@section('title')
  result
@endsection


@section('style')
<link rel="stylesheet" href="backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection
@section('con')
@include('include.admin.admincontentheader')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Products</h3>
                    </div>
                    @if (Session::has('status'))
                    <div class="alert alert-success">
                         {{Session::get('status') }}
                    </div>
                    @endif
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>team 1</th>
                                    <th>Picture</th>
                                    <th>team 2</th>
                                    <th>Picture</th>
                                    <th>result</th>
                                    <th>datedematch</th>
                                    <th>heure</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($results as $result)

                                <tr>
                                    <td>{{$increment}}</td>
                                    <td>
                                        <img src="/storage/logo1_images/{{$result->equipe1_logo}}" style="height : 50px; width : 50px" class="img-circle elevation-2" alt="User Image"> 
                                    </td>
                                    <td>{{$result->equipe1_logo}}</td>
                                    <td>
                                        <img src="/storage/logo2_images/{{$result->equipe1_logo}}" style="height : 50px; width : 50px" class="img-circle elevation-2" alt="User Image"> 
                                    </td>
                                    <td>{{$result->Result}}</td>
                                    <td>{{$result->datematch}}</td>
                                    <td>{{$result->heure}}</td>

                                   
                                    <td>
                                        <a href="#" class="btn btn-success">Unactivate</a>
                                        <a href="#" class="btn btn-primary"><i class="nav-icon fas fa-edit"></i></a>
                                        <a href="#" id="delete" class="btn btn-danger"><i
                                                class="nav-icon fas fa-trash"></i></a>
                                    </td>
                                </tr>
                               @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>team 1</th>
                                    <th>Picture</th>
                                    <th>team 2</th>
                                    <th>Picture</th>
                                    <th>result</th>
                                    <th>datedematch</th>
                                    <th>hseure</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
@endsection
@section('scripts')
   <!-- DataTables -->
<script src="backend/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="backend/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>


<script src="backend/dist/js/bootbox.min.js"></script>
<!-- page script -->

<script>
  $(document).on("click", "#delete", function(e){
  e.preventDefault();
  var link = $(this).attr("href");
  bootbox.confirm("Do you really want to delete this element ?", function(confirmed){
    if (confirmed){
        window.location.href = link;
      };
    });
  });
</script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection
