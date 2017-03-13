<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{\App\User::find(\Illuminate\Support\Facades\Auth::id())->Profile->avatar}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{auth()->user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Admin</a>
            </div>
        </div>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="@if(url()->current() === url('/home')) active @endif">
                <a href="/home">
                    <i class="fa fa-tachometer"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="@if(url()->current() === url('/profile')) active @endif">
                <a href="/profile">
                    <i class="fa fa-user"></i> <span>Profile</span>
                </a>
            </li>
            <li class="@if(strpos(url()->current(), 'article')) active @endif treeview">
                <a href="/article">
                    <i class="fa fa-file-text-o"></i> <span>Article</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>

                <ul class="treeview-menu">
                    <li class="@if(url()->current() === url('/article')) active @endif"><a href="/article"><i class="fa fa-circle-o"></i> Article</a></li>
                    <li class="@if(url()->current() === url('/article/compose')) active @endif"><a href="/article/compose"><i class="fa fa-circle-o"></i> Composer</a></li>
                </ul>
            </li>
            <li class="@if(strpos(url()->current(), 'category')) active @endif treeview">
                <a href="/category">
                    <i class="ion ion-grid"></i> <span>Categories</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu">
                    <li class="@if(url()->current() === url('/category')) active @endif"><a href="/category"><i class="fa fa-circle-o"></i> Categories</a></li>
                    <li class="@if(url()->current() === url('/article/compose')) active @endif"><a href="/category/new"><i class="fa fa-circle-o"></i> New</a></li>
                </ul>
            </li>

            <li class="@if(strpos(url()->current(), 'users')) active @endif treeview">
                <a href="/users">
                    <i class="fa fa-users"></i> <span>Users</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu">
                    <li class="@if(url()->current() === url('/users')) active @endif"><a href="/users"><i class="fa fa-circle-o"></i> Users</a></li>
                    <li class="@if(url()->current() === url('/users/new')) active @endif"><a href="/users/new"><i class="fa fa-circle-o"></i> New</a></li>
                </ul>
            </li>
            <li class="@if(url()->current() === url('/settings')) active @endif">
                <a href="/settings">
                    <i class="fa fa-wrench" aria-hidden="true"></i> <span>Settings</span>
                </a>
            </li>



        </ul>
    </section>
    <!-- /.sidebar -->
</aside>