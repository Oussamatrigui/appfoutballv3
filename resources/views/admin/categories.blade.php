@extends('admin_layout.layout')

@section('title')
    Categories
@endsection


@section('style')
    <link rel="stylesheet" href="backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection

@section('con')

@include('include.admin.admincontentheader')
    <!-- Content Wrapper. Contains page content -->
    {{ Form::hidden('', $increment = 1) }}

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All categories</h3>
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
                                            <th>Num.</th>
                                            <th>Category Name</th>
                                            <th>Created at</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{$increment}}</td>
                                                <td>{{ $category->category_name }}</td>
                                                <td>{{ $category->created_at }}</td>
                                                <td>
                                                    <a href="{{url('/edit_category/'.$category->id)}}" class="btn btn-primary"><i
                                                            class="nav-icon fas fa-edit"></i></a>
                                                    <a href="{{url('/delete_category/'.$category->id)}}" id="delete" class="btn btn-danger"><i
                                                            class="nav-icon fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            {{Form::hidden('', $increment = $increment + 1)}}
                                        @endforeach
                                    </tbody>
                                    
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
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('scripts')
    <!-- DataTables -->
    <script src="backend/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="backend/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>


    <script src="backend/dist/js/bootbox.min.js"></script>
    <!-- page script -->

    <script>
        $(document).on("click", "#delete", function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            bootbox.confirm("Do you really want to delete this element ?", function(confirmed) {
                if (confirmed) {
                    window.location.href = link;
                };
            });
        });
    </script>
    <!-- page script -->
    <script>
        $(function() {
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
