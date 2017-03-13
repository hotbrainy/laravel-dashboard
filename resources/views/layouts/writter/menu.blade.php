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
                <a href="#"><i class="fa fa-circle text-success"></i> Writer</a>
            </div>
        </div>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="@if(url()->current() === url('/profile')) active @endif">
                <a href="/profile">
                    <i class="fa fa-user"></i> <span>Profile</span>
                </a>
            </li>
            <!--li class="@if(url()->current() === url('/home')) active @endif">
                <a href="/home">
                    <i class="fa fa-tachometer"></i> <span>Dashboard</span>
                </a>
            </li-->
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



        </ul>
    </section>
    <!-- /.sidebar -->
</aside>