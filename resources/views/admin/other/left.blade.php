
<a href="{{route('home')}}" class="brand-link" target="_blank">
    <img src="{{asset('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">NCADR</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
{{--    <div class="user-panel mt-3 pb-3 mb-3 d-flex">--}}
{{--        <div class="image">--}}
{{--            <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">--}}
{{--        </div>--}}
{{--        <div class="info">--}}
{{--            <a href="#" class="d-block">Alexander Pierce</a>--}}
{{--        </div>--}}
{{--    </div>--}}

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-header">კომპონენტები / Elements</li>
            <li class="nav-item has-treeview">
                <a href="{{route('admin.menu',['locale'=>$locale])}}" class="nav-link">
                    <i class="nav-icon far fa-address-book"></i>
                    <p>
                        მენიუ / Menu
                    </p>
                </a>
            </li>
            <li class="nav-item has-treeview">
                <a href="{{route('admin.post',['locale'=>$locale])}}" class="nav-link">
                    <i class="nav-icon fas fa-file-alt"></i>
                    <p>
                        პოსტი / Page
                    </p>
                </a>
            </li>
            <li class="nav-item has-treeview">
                <a href="{{route('admin.news',['locale'=>$locale])}}" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        სიახლე / News
                    </p>
                </a>
            </li>
            <li class="nav-item has-treeview">
                <a href="{{route('admin.kodex',['locale'=>$locale])}}" class="nav-link">
                    <i class="nav-icon fas fa-tasks"></i>
                    <p>
                        კოდექსები / Rules
                    </p>
                </a>
            </li>
            <li class="nav-item has-treeview">
                <a href="{{route('admin.them',['locale'=>$locale])}}" class="nav-link">
                    <i class="nav-icon fas fa-portrait"></i>
                    <p>
                        თანამშრომლები / Staff
                    </p>
                </a>
            </li>
            <li class="nav-item has-treeview">
                <a href="{{route('admin.blog',['locale'=>$locale])}}" class="nav-link">
                    <i class="nav-icon fas fa-pen"></i>
                    <p>
                        ბლოგი / Blog
                    </p>
                </a>
            </li>
            <li class="nav-item has-treeview">
                <a href="{{route('admin.biblioteka',['locale'=>$locale])}}" class="nav-link">
                    <i class="nav-icon fas fa-pen"></i>
                    <p>
                        ბიბლიოთეკა / Blog
                    </p>
                </a>
            </li>
            <li class="nav-item has-treeview">
                <a href="{{route('admin.galeri',['locale'=>$locale])}}" class="nav-link">
                    <i class="nav-icon fas fa-photo-video"></i>
                    <p>
                        გალერეა / Gallery
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
