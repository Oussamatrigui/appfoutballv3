@extends('admin_layout.layout')
@section('title')
    Dashboard ||| ADMIN
@endsection

@section('style')

        <link rel="stylesheet" href="{{asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="{{asset('admin_back/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{asset('admin_back/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
        <!-- JQVMap -->
        <link rel="stylesheet" href="{{asset('admin_back/plugins/jqvmap/jqvmap.min.css')}}">
        
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{asset('admin_back/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{asset('admin_back/plugins/daterangepicker/daterangepicker.css')}}">
        <!-- summernote -->
        <link rel="stylesheet" href="{{asset('admin_back/plugins/summernote/summernote-bs4.min.css')}}">
@endsection

@section('con')
                  
                    
                        
                    @include('include.admin.admincontentheader')

            <div class="container-fluid">
                <div class="row">
 
                    @include('include.admin.adminorders')

                    @include('include.admin.adminbouncerate')
                                 

                    @include('include.admin.adminuserregistration')


                    @include('include.admin.userslist')
                               
                                    
                </div>
            </div>
                       
            <div class="container-fluid">
                <div class="row">
                               
                    <section class="col-lg-9 connectedSortable">
                        <div class="container container-fluid">
                            <h4>Demande d'inscription des journalistes :</h4><br>
                        
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if (session('session'))
                                <div class="alert alert-warning">
                                    {{ session('session') }}
                                </div>
                            @endif
                        
                    
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                        <th>Status actuel</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($journalists as $journalist)
                                        <tr>
                                            <td>{{ $journalist->name }}</td>
                                            <td>{{ $journalist->email }}</td>
                                            <td>{{ $journalist->role }}</td>
                                        <td>
                                            
                                                
                                                        @if ( $journalist->is_confirmed)
                                                        <form action="{{ route('journalist.desactiver', $journalist->id) }}" method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit" class="btn btn-warning"> Desactiver </button>
                                                        </form>
                                                        @else
                                                        <form action="{{ route('journalist.confirm', $journalist->id) }}" method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit" class="btn btn-success"> Activer </button>
                                                        </form>
                                                        @endif
                                           
                                        </td>
                                        <td>
                                                @if ( $journalist->is_confirmed)
                                                    <div class="progress-bar bg-info"> Approuvé</div>
                                                @else
                                                <div class="progress-bar bg-danger"> Desactiver</div>
                                                    
                                                @endif
                                                
                                            </td>
                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{-- <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                        <th>Status actuel</th>
                                    </tr>
                                </thead>
                                <h4>Liste des administrateur:</h4>
                                <tbody>
                                    @foreach ($admins as $admin)
                                        <tr>
                                            <td>{{ $admin->name }}</td>
                                            <td>{{ $admin->email }}</td>
                                            <td>{{ $admin->role }}</td>
                                        <td>
                                            <div class="row space-between">
                                                <form action="{{ route('journalist.confirm', $journalist->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="col-xs-6 text-left">
                                                        <div class="previous">
                                                            <button type="submit" class="btn btn-success">Activer
                                                              <i class="bi bi-check"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <form action="{{ route('journalist.desactiver', $journalist->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="col-xs-6 text-right">   
                                                        <div class="next">
                                                            <button type="submit" class="btn btn-warning"> Desactiver
                                                              <i class="glyphicon glyphicon-chevron-right"></i>
                                                          </button>
                                                        </div>
                                                    </div>
                                                    
                                                </form>
                                            </div>
                                        </td>
                                        <td>
                                                @if ( $journalist->is_confirmed)
                                                    <div class="progress-bar bg-info"> Approuvé</div>
                                                @else
                                                <div class="progress-bar bg-danger"> Desactiver</div>
                                                    
                                                @endif
                                                
                                            </td>
                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table> --}}

                            
                        </div>            
                    </section>
                                
                    <section class="col-lg-3 connectedSortable">

                        @include('include.admin.adminchat')
                                            
                    </section>
                                
                </div>
            </div>
@endsection
        @section('dashboardscript')
            
            <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
                <script src="{{asset('admin_back/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
                <script src="{{asset('admin_back/dist/js/pages/dashboard.js')}}"></script>
            
            <!-- ChartJS -->
                <script src="{{asset('admin_back/plugins/chart.js/Chart.min.js')}}"></script>
            <!-- Sparkline -->
                <script src="{{asset('admin_back/plugins/sparklines/sparkline.js')}}"></script>
            <!-- JQVMap -->
                <script src="{{asset('admin_back/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
                <script src="{{asset('admin_back/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
            <!-- jQuery Knob Chart -->
                <script src="{{asset('admin_back/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
            <!-- daterangepicker -->
                <script src="{{asset('admin_back/plugins/moment/moment.min.js')}}"></script>
                <script src="{{asset('admin_back/plugins/daterangepicker/daterangepicker.js')}}"></script>
            <!-- Tempusdominus Bootstrap 4 -->
                <script src="{{asset('admin_back/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
            <!-- Summernote -->
                <script src="{{asset('admin_back/plugins/summernote/summernote-bs4.min.js')}}"></script>
            <!-- overlayScrollbars -->
                <script src="{{asset('admin_back/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
        @endsection


