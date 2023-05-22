
    <aside class="main-sidebar sidebar-dark-danger elevation-4">
        <!-- Brand Logo -->
        

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                    <img src='{{asset('https://static-00.iconduck.com/assets.00/avatar-default-icon-1975x2048-2mpk4u9k.png')}}' class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        
                    <a href="/admin_liste" class="d-block">Profile</a>
                    </div>
                </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2  nav-flat nav-compact nav-child-indent ">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview {{request()->is('admin') ? 'menu-open' : ''}} ">
                <a href="" class="nav-link {{request()->is('admin') ? 'active' : ''}}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{url('/admin')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Dashboard v1</p>
                        </a>
                    </li>
                </ul>
               
            </li>
            
            <li class="nav-item has-treeview {{request()->is('categories','addcategory') ? 'menu-open' : ''}}">
                <a href="" class="nav-link {{request()->is('categories','addcategory') ? 'active' : ''}} ">
                <i class="nav-icon fas fa-folder"></i>
                <p>
                    Categories
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{url('/addcategory')}}" class="nav-link {{request()->is('addcategory') ? 'active' : ''}}">
                    <i class="far fa-file nav-icon"></i>
                    <p>Add category</p>
                    </a>
                </li>
                </ul>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{url('/categories')}}" class="nav-link {{request()->is('categories') ? 'active' : ''}}">
                    <i class="far fa-file nav-icon"></i>
                    <p>Categories</p>
                    </a>
                </li>
                </ul>
            </li>

            <!-- News -->
            <li class="nav-item has-treeview {{request()->is('newss','addnews','textformatter') ? 'menu-open' : ''}}">
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

            <li class="nav-item has-treeview {{request()->is('sliders','addslider') ? 'menu-open' : ''}}">
                <a href="" class="nav-link {{request()->is('sliders','addslider') ? 'active' : ''}}">
                <i class="nav-icon fas fa-folder"></i>
                <p>
                    Sliders
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{url('/addslider')}}" class="nav-link {{request()->is('addslider') ? 'active' : ''}}">
                    <i class="far fa-file nav-icon"></i>
                    <p>Add slider</p>
                    </a>
                </li>
                </ul>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{url('/sliders')}}" class="nav-link {{request()->is('sliders') ? 'active' : ''}}">
                    <i class="far fa-file nav-icon"></i>
                    <p>Sliders</p>
                    </a>
                </li>
                </ul>
            </li>

            <li class="nav-item has-treeview {{request()->is('products','addproduct') ? 'menu-open' : ''}}">
                <a href="{{url('/products')}}" class="nav-link {{request()->is('products','addproduct') ? 'active' : ''}}">
                <i class="nav-icon fas fa-folder"></i>
                <p>
                    Products
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{url('/addproduct')}}" class="nav-link {{request()->is('addproduct') ? 'active' : ''}}">
                    <i class="far fa-file nav-icon"></i>
                    <p>Add product</p>
                    </a>
                </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{url('/products')}}" class="nav-link {{request()->is('products') ? 'active' : ''}}">
                        <i class="far fa-file nav-icon"></i>
                        <p>Products</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item has-treeview {{request()->is('orders') ? 'menu-open' : ''}}">
                <a href="{{url('/orders')}}" class="nav-link {{request()->is('orders') ? 'active' : ''}}">
                <i class="nav-icon fas fa-folder"></i>
                <p>
                    Orders
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{url('/orders')}}" class="nav-link {{request()->is('orders') ? 'active' : ''}}">
                    <i class="far fa-file nav-icon"></i>
                    <p>Orders</p>
                    </a>
                </li>
                </ul>
            </li>

            <li class="nav-item has-treeview {{request()->is('team') ? 'menu-open' : ''}}">
                <a href="{{url('/orders')}}" class="nav-link">
                <i class="nav-icon fas fa-folder"></i>
                <p>
                    Result
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">

                <li class="nav-item">
                    <a href="{{url('/addteam')}}" class="nav-link">
                    <i class="far fa-file nav-icon"></i>
                    <p>Add Result</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{url('/team')}}" class="nav-link">
                    <i class="far fa-file nav-icon"></i>
                    <p>Results </p>
                    </a>
                </li>

                </ul>
            </li>
            <li class="nav-item has-treeview {{request()->is('team') ? 'menu-open' : ''}}">
                <a href="{{url('/orders')}}" class="nav-link">
                <i class="nav-icon fas fa-folder"></i>
                <p>
                    Plateform Information
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{url('/plateform_information')}}" class="nav-link">
                        <i class="far fa-file nav-icon"></i>
                        <p>Informations  </p>
                        </a>
                    </li>
                </ul>
            </li>

            
           
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
