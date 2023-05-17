<!DOCTYPE html>
<html lang="en">
<head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title> @yield('title')</title>
        <!-- adminstyle Start -->
            <link rel="shortcut icon" type="image/png" href="https://wael-toumi.me/images/logo.png">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback'>
            <link rel="stylesheet" href=" {{asset('admin_back/plugins/fontawesome-free/css/all.min.css')}}">
            <link rel="stylesheet" href="{{asset('admin_back/dist/css/adminlte.min.css')}}">
       
            @yield('table_style')
            {{-- @section('table_style')
            <link rel="stylesheet" href="{{asset('admin_back/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
            <link rel="stylesheet" href="{{asset('admin_back/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
            @endsection --}}

            <link rel="stylesheet" href="{{asset('https://waeltoumi28.github.io/backoffice.github.io/admin_back/dist/css/adminlte.min.css')}}">
            
            @yield('style')
            

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
            @include('include.admin.preloader')
            @include('include.admin.adminnavbar')
            @include('include.admin.adminsidebar')
    </div>

        <div class="content-wrapper">
            @yield('con')
            
        </div>
            @include('include.adminfooter')
    
            <script src="{{asset('admin_back/plugins/jquery/jquery.min.js')}}"></script>                
            <script src="{{asset('admin_back/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
            @yield('table_script1')

            {{-- @section('table_script1')
                <script src="{{asset('admin_back/plugins/datatables/jquery.dataTables.min.js')}}"></script>
                <script src="{{asset('admin_back/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
                <script src="{{asset('admin_back/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
                <script src="{{asset('admin_back/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
            @endsection --}}

            <script src="{{asset('admin_back/dist/js/adminlte.js')}}"></script>
            <script src="{{asset('admin_back/dist/js/demo.js')}}"></script>
            <script src="{{asset('admin_back/dist/js/bootbox.min.js')}}"></script>
            @yield('scripteditcategory')
            @yield('dashboardscript')
            @yield('datatablescript')
            @yield('textformatterscript')
            @yield('table_script2')
            
            
</body>
</html>