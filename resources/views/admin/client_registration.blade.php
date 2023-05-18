@extends('admin_layout.layout')
@section('title')
        Client Registration
@endsection

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
                                <h3 class="card-title">@yield('title')</h3>
                              </div>

                              @if (Session::has('status'))
                              <div class="row align-items-center justify-content-center">
                                <div class="container-fluid ">
                                    <div class="col-md-12 text-center alert alert-success ">
                                      {{Session::get('status')}}
                                    </div>
                                </div>
                              </div>
                              @endif


                            
                              <div class="card-body">
                                <a class="btn btn-primary" id="add" href='{{url('/register_client')}}'>Add User</a> <br><br>
                                <table id="example1" class="table table-bordered table-striped">
                                  <thead>

                                  <tr>
                                    <th>Num.</th>
                                    
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                   
                                    <th>Actions</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($client as $client)
                                    
                                        <tr>
                                          <td>{{ $increment }}</td>
                                         
                                          <td>  
                                            {{ $client -> name }}
                                          </td>
                                          <td> {{ $client -> email }} </td>
                                          <td> {{ $client -> created_at }}  </td>
                                          <td> {{ $client -> updated_at }}  </td>
                                          
                                         
                                          <td>
                                           
                                            <a href="{{url('/edit_profile_client/'.$client-> id)}}" class="btn btn-primary"><i class="nav-icon fas fa-edit"></i></a>
                                            <a href="#" id="delete" class="btn btn-danger" ><i class="nav-icon fas fa-trash"></i></a>
                                            
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
@section('table_script1')
  {{-- <script src="{{asset('admin_back/plugins/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('admin_back/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script> --}}
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
    bootbox.confirm("You really want to delete this element ?", function(confirmed){
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