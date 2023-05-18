@extends('admin_layout.layout')
@section('title')
        News
@endsection


{{-- @yield('table_style') --}}

@section('table_style')

  <link rel="stylesheet" href="{{asset('admin_back/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin_back/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">

@endsection

@section('con')

  {{Form::hidden('' , $increment =  1 ) }}

        
                @include('include.admin.admincontentheader')
                <div class="container-fluid">
                        <div class="row">
                          <div class="col-12">
                            <div class="card">
                              <div class="card-header">
                                <h3 class="card-title">All News</h3>
                              </div><br><br>

                              @if (Session::has('status'))
                                        <div class="col-md text-center alert alert-success">
                                          {{Session::get('status')}}
                                        </div>
                              @endif


                              <!-- /.card-header -->
                              <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                  <thead>
                                  <tr>
                                    <th>Num.</th>
                                    <th>Picture</th>
                                    <th>Auteur</th>
                                    <th>Title</th>
                                    <th>Contenue</th>
                                    <th>Actions</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($news as $news)
                                    
                                      <tr>
                                        <td>{{ $increment }}</td>
                                        <td> 
                                            <img src="/storage/news_images/{{$news -> news_image}}" style="height : 50px; width : 50px" class="img-circle elevation-2" alt="User Image">
                                        </td>
                                        <td>  
                                          {{ $news -> auteur }}
                                        </td>
                                        <td> {{ $news -> news_title }} </td>
                                        <td> {{ $news -> news_content }} </td>
                                        <td>
                                          <a href="#" class="btn btn-success">Unactivate</a>
                                          <a href="{{url('/edit_news/'.$news->id)}}" class="btn btn-primary"><i class="nav-icon fas fa-edit"></i></a>
                                          <a href="{{url('/delete_news/'.$news->id)}}" id="delete" class="btn btn-danger" ><i class="nav-icon fas fa-trash"></i></a>
                                        </td>
                                      </tr>
                                    {{Form::hidden('' , $increment = $increment + 1 ) }}
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
@endsection

{{-- @yield('table_script1') --}}

@section('table_script1')
                    <script src="{{asset('admin_back/plugins/datatables/jquery.dataTables.min.js')}}"></script>
                    <script src="{{asset('admin_back/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
                    <script src="{{asset('admin_back/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
                    <script src="{{asset('admin_back/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
@endsection


{{-- @yield('table_script2') --}}
@section('table_script2')
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

{{-- @section('table_script1')

  <script src="{{asset('admin_back/plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('admin_back/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('admin_back/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('admin_back/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
 
@endsection

@section('table_script2')
                       

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
@endsection --}}