@extends('admin_layout.layout')

@section('title')
    Sliders
@endsection


@section('style')
    <link rel="stylesheet" href="backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection

@section('con')

@include('include.admin.admincontentheader')

    {{ Form::hidden('', $increment = 1) }}

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Sliders</h3>
                            </div>
                            @if (Session::has('status'))
                                <div class="alert alert-success">
                                    {{ Session::get('status') }}
                                </div>
                            @endif
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Num.</th>
                                            <th>Picture</th>
                                            <th>Description one</th>
                                            <th>Description Two</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sliders as $slider)
                                            <tr>
                                                <td>{{ $increment }}</td>
                                                <td>
                                                    <img src="/storage/slider_image/{{ $slider->slider_image }}"
                                                        style="height : 50px; width : 50px" class="img-circle elevation-2"
                                                        alt="User Image">
                                                </td>
                                                <td>{{ $slider->description1 }}
                                                </td>
                                                <td>{{ $slider->description2 }}</td>
                                                <td>
                                                    @if ($slider->status != 0)
                                                        <a href="{{ url('/desactiver_slider/' . $slider->id) }}"
                                                            class="btn btn-success">Déactiver</a>
                                                    @else
                                                        <a href="{{ url('/activer_slider/' . $slider->id) }}"
                                                            class="btn btn-warning">Activer</a>
                                                    @endif
                                                    <a href="{{ url('/edit_slider/' . $slider->id) }}"
                                                        class="btn btn-primary"><i class="nav-icon fas fa-edit"></i></a>
                                                    <a href="{{ url('/delete_slider/' . $slider->id) }}" id="delete"
                                                        class="btn btn-danger"><i class="nav-icon fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            {{ Form::hidden('', $increment = $increment + 1) }}
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
