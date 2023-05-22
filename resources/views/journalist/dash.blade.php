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
            <link rel="stylesheet" href="{{asset('https://waeltoumi28.github.io/backoffice.github.io/admin_back/dist/css/adminlte.min.css')}}">
 
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
<aside class="main-sidebar sidebar-dark-danger elevation-4">
    
      
    <nav class="mt-2  nav-flat nav-compact nav-child-indent ">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
   

        <!-- News -->
        <li class="nav-item has-treeview menu-open">
            <a href="" class="nav-link {{request()->is('newss','addnews','textformatter') ? 'active' : ''}}">
            <i class="nav-icon fas fa-folder"></i>
            <p>
                News
                <i class="fas fa-angle-left right"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{url('/addnews')}}" class="nav-link {{request()->is('addnews') ? 'active' : ''}}">
                <i class="far fa-file nav-icon"></i>
                <p>Add News</p>
                </a>
            </li>
            </ul>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{url('/newss')}}" class="nav-link {{request()->is('newss') ? 'active' : ''}}">
                <i class="far fa-file nav-icon"></i>
                <p>News</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{url('/textformatter')}}" class="nav-link {{request()->is('textformatter') ? 'active' : ''}}">
                <i class="far fa-file nav-icon"></i>
                <p>Text Formatter</p>
                </a>
            </li>
            </ul>
        </li>
        <!-- End News-->

       
       
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

</aside>
</div>

<script src="{{asset('admin_back/dist/js/adminlte.js')}}"></script>
<script src="{{asset('admin_back/dist/js/demo.js')}}"></script>
<script src="{{asset('admin_back/dist/js/bootbox.min.js')}}"></script>
</body>

</html>
