@extends('admin_layout.layout')
@section('title')
Admin & Journalist List
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
                                
                                <table id="example1" class="table table-bordered table-striped">
                                 
                                
                                  <thead>

                                    <a class="btn btn-primary" id="add" href='{{url('/register_journalist')}}'>Add User Member </a> <br><br>
                                  <tr>
                                    <th>Num.</th>
                                    <th>Picture</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($admin as $admin)
                                    
                                        <tr>
                                          <td>{{ $increment }}</td>
                                          <td> 
                                              
                                          </td>
                                          <td>  
                                            {{ $admin -> name }}
                                          </td>
                                          <td> {{ $admin -> email }} </td>
                                          <td> {{ $admin -> role }}  </td>
                                          <td>
                                           
                                            <a href="{{url('/edit_profile_admin/'.$admin->id)}}" class="btn btn-primary"><i class="nav-icon fas fa-edit"></i></a>
                                           
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