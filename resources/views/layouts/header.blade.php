<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{config('app.name')}}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Datatable -->
    <link rel="stylesheet" href="/plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="/plugins/datatables/jquery.dataTables.yadcf.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/plugins/iCheck/all.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- bootstrap-tour -->
    <link href="/css/bootstrap-tour.min.css" rel="stylesheet">
    <!-- SweetAlert Css -->
    <link rel="stylesheet" type="text/css" href="/css/sweetalert.css">
    <!-- style Css -->
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <!-- pace -->
    <link rel="stylesheet" href="/plugins/pace/pace.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-black sidebar-mini ">
<div class="wrapper">

    <div class="clearfix"></div>
    <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">{{ config('app.mininame', 'Laravel') }}</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">{{ config('app.name', 'Laravel') }}</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
        @if (!Auth::guest())
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
        @endif
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                    <!-- Messages: style can be found in dropdown.less-->
                    {{--<li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 4 messages</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li><!-- start message -->
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Support Team
                                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <!-- end message -->
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                AdminLTE Design Team
                                                <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Developers
                                                <small><i class="fa fa-clock-o"></i> Today</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Sales Department
                                                <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Reviewers
                                                <small><i class="fa fa-clock-o"></i> 2 days</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">See All Messages</a></li>
                        </ul>
                    </li>--}}
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                        <a href="#" data-trigger-notification-try class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            @if(auth()->user()->unreadNotifications->count() > 0)
                                 <span class="label label-warning count-notify">{{auth()->user()->unreadNotifications->count()}}</span>
                            @endif
                        </a>
                        <ul class="dropdown-menu">
                            @if(auth()->user()->unreadNotifications->count() > 0)
                                <li class="header">You have {{auth()->user()->unreadNotifications->count()}} notifications</li>
                            @endif
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <?php $notificationlist = auth()->user()->notifications()->latest()->take(10)->get(); ?>
                                    @foreach ($notificationlist as $notification)

                                        @if($notification->type === 'App\Notifications\UserRegistered')
                                            <li>
                                                <a style="white-space: inherit;"><i class="fa fa-info-circle"></i> {{$notification->data['message']}}
                                                    <br>
                                                    <small   style="text-indent: 22px;display: block;color: #a7a7a7;text-align: right;" >{{$notification->created_at->format('M d Y')}}</small>
                                                </a>

                                            </li>
                                        @elseif($notification->type === 'App\Notifications\UserArticleSubmitted' && !auth()->user()->is_admin)
                                            <li>
                                                <a style="white-space: inherit;" href="{{url('/article/view/'.$notification->data['article_id'])}}">
                                                    <i class="fa fa-file-text-o"></i> {{$notification->data['message']}}
                                                    <br>
                                                    <small   style="text-indent: 22px;display: block;color: #a7a7a7;text-align: right;" >{{$notification->created_at->format('M d Y')}}</small>
                                                </a>

                                            </li>
                                        @endif

                                    @endforeach
                                </ul>
                            </li>
                            <!--li class="footer"><a href="#">View all</a></li-->
                        </ul>
                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{\App\User::find(\Illuminate\Support\Facades\Auth::id())->Profile->avatar}}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{\App\User::find(\Illuminate\Support\Facades\Auth::id())->Profile->avatar}}" class="img-circle" alt="User Image">
                                <p>
                                    {{ Auth::user()->name }} - @if(!auth()->user()->isAdmin()) Writer @endif
                                    <small>Member since {{auth()->user()->created_at->format('M. Y')}}</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="/profile" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Sign out</a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>

                    @endif
                </ul>
            </div>
        </nav>
    </header>
    @if (!Auth::guest())
        @if(auth()->user()->isAdmin())
            @include('layouts.admin.menu')
        @elseif(!auth()->user()->isAdmin())
            @include('layouts.writter.menu')
         @endif
    @endif

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
       @if(!auth()->user()->activated)
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-warning"></i> Please confirm your Email</h4>
            Please confirm your email for getting submission notifications. Your account will deactivate in case it will not confirm in a week.
        </div>
        @endif