@extends('admin_layout.layout')
@section('title')
    Dashboard ||| ADMIN
@endsection

@section('style')
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

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

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
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
                
                    <section class="col-lg-11">
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
                        
                        <div class="table-responsive">
                            <table class="table table-bordered">
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
                        </div>
                            
                                  
                    </section>
               
            </div>
                    <div class="container-fluid">
                        <div class="row">               
                            <section class="col-sm-4 connectedSortable">

                                @include('include.admin.adminchat')
                                                    
                            </section>
                        </div>
                    </div>
                                
                
            
@endsection
        @section('dashboardscript')

                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


                <script src="{{ asset('js/app.js') }}"></script>
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


