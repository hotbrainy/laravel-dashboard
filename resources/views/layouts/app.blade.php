<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap 3 -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fontawsome 3 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">


    <!-- AdminLTE -->
    <link href="/css/AdminLTE.min.css" rel="stylesheet">

    <!-- Skins -->
    <link rel="stylesheet" href="/css/skins/_all-skins.min.css">


    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="sidebar-mini skin-blue @if(Auth::guest()) sidebar-collapse @endif">
  {{--  <div class="wrapper">


        <header class="main-header">
            <a href="../../index2.html" class="logo">
                <!-- LOGO -->
                {{ config('app.name', 'Laravel') }}
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Navbar Right Menu -->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                       --}}{{-- @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                    @else--}}{{--
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
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
                                                    <img src="/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    Sender Name
                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                </h4>
                                                <p>Message Excerpt</p>
                                            </a>
                                        </li><!-- end message -->
                                        ...
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>
                        <!-- Notifications: style can be found in dropdown.less -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning">10</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 10 notifications</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios-people info"></i> Notification title
                                            </a>
                                        </li>
                                        ...
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul>
                        </li>
                        <!-- Tasks: style can be found in dropdown.less -->
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-flag-o"></i>
                                <span class="label label-danger">9</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 9 tasks</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Design some buttons
                                                    <small class="pull-right">20%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">20% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- end task item -->
                                        ...
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">View all tasks</a>
                                </li>
                            </ul>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs">Alexander Pierce</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                    <p>
                                        {{ Auth::user()->name }} - @if(!\App\User::isAdmin) Writer @endif
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Artical</a>
                                        <h3>0</h3>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Earnings</a>
                                        <h3>$0</h3>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Padding</a>
                                        <h3>0</h3>
                                    </div>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
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
                        --}}{{--@endif--}}{{--
                    </ul>
                </div>
            </nav>
        </header>


        <div class="content-wrapper">
             @yield('content')
        </div>
    </div>--}}



  <div class="wrapper">
      <header class="main-header">
          <a href="../../index2.html" class="logo">
              <!-- LOGO -->
              AdminLTE
          </a>
          <!-- Header Navbar: style can be found in header.less -->
          <nav class="navbar navbar-static-top" role="navigation">
              <a href="#" class="sidebar-toggle" role="button">
                  <span class="sr-only">Toggle navigation</span>
              </a>
              <!-- Navbar Right Menu -->
              <div class="navbar-custom-menu">
                  <ul class="nav navbar-nav">
                      <!-- Messages: style can be found in dropdown.less-->
                      <li class="dropdown messages-menu">
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
                                                  <img src="/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                              </div>
                                              <h4>
                                                  Sender Name
                                                  <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                              </h4>
                                              <p>Message Excerpt</p>
                                          </a>
                                      </li><!-- end message -->
                                      ...
                                  </ul>
                              </li>
                              <li class="footer"><a href="#">See All Messages</a></li>
                          </ul>
                      </li>
                      <!-- Notifications: style can be found in dropdown.less -->
                      <li class="dropdown notifications-menu">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                              <i class="fa fa-bell-o"></i>
                              <span class="label label-warning">10</span>
                          </a>
                          <ul class="dropdown-menu">
                              <li class="header">You have 10 notifications</li>
                              <li>
                                  <!-- inner menu: contains the actual data -->
                                  <ul class="menu">
                                      <li>
                                          <a href="#">
                                              <i class="ion ion-ios-people info"></i> Notification title
                                          </a>
                                      </li>
                                      ...
                                  </ul>
                              </li>
                              <li class="footer"><a href="#">View all</a></li>
                          </ul>
                      </li>
                      <!-- Tasks: style can be found in dropdown.less -->
                      <li class="dropdown tasks-menu">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                              <i class="fa fa-flag-o"></i>
                              <span class="label label-danger">9</span>
                          </a>
                          <ul class="dropdown-menu">
                              <li class="header">You have 9 tasks</li>
                              <li>
                                  <!-- inner menu: contains the actual data -->
                                  <ul class="menu">
                                      <li><!-- Task item -->
                                          <a href="#">
                                              <h3>
                                                  Design some buttons
                                                  <small class="pull-right">20%</small>
                                              </h3>
                                              <div class="progress xs">
                                                  <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                      <span class="sr-only">20% Complete</span>
                                                  </div>
                                              </div>
                                          </a>
                                      </li><!-- end task item -->
                                      ...
                                  </ul>
                              </li>
                              <li class="footer">
                                  <a href="#">View all tasks</a>
                              </li>
                          </ul>
                      </li>
                      <!-- User Account: style can be found in dropdown.less -->
                      <li class="dropdown user user-menu">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                              <img src="/img/user2-160x160.jpg" class="user-image" alt="User Image">
                              <span class="hidden-xs">Alexander Pierce</span>
                          </a>
                          <ul class="dropdown-menu">
                              <!-- User image -->
                              <li class="user-header">
                                  <img src="/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                  <p>
                                      Alexander Pierce - Web Developer
                                      <small>Member since Nov. 2012</small>
                                  </p>
                              </li>
                              <!-- Menu Body -->
                              <li class="user-body">
                                  <div class="col-xs-4 text-center">
                                      <a href="#">Followers</a>
                                  </div>
                                  <div class="col-xs-4 text-center">
                                      <a href="#">Sales</a>
                                  </div>
                                  <div class="col-xs-4 text-center">
                                      <a href="#">Friends</a>
                                  </div>
                              </li>
                              <!-- Menu Footer-->
                              <li class="user-footer">
                                  <div class="pull-left">
                                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                                  </div>
                                  <div class="pull-right">
                                      <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                  </div>
                              </li>
                          </ul>
                      </li>
                  </ul>
              </div>
          </nav>
      </header>


      <div class="main-sidebar">
          <!-- Inner sidebar -->
          <div class="sidebar">
              <!-- user panel (Optional) -->
              <div class="user-panel">
                  <div class="pull-left image">
                      <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                  </div>
                  <div class="pull-left info">
                      <p>User Name</p>

                      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                  </div>
              </div><!-- /.user-panel -->

              <!-- Search Form (Optional) -->
              <form action="#" method="get" class="sidebar-form">
                  <div class="input-group">
                      <input type="text" name="q" class="form-control" placeholder="Search...">
                      <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
        </span>
                  </div>
              </form><!-- /.sidebar-form -->

              <!-- Sidebar Menu -->
              <ul class="sidebar-menu">
                  <li class="header">HEADER</li>
                  <!-- Optionally, you can add icons to the links -->
                  <li class="active"><a href="#"><span>Link</span></a><</li>
                  <li><a href="#"><span>Another Link</span></a></li>
                  <li class="treeview">
                      <a href="#"><span>Multilevel</span> <i class="fa fa-angle-left pull-right"></i></a>
                      <ul class="treeview-menu">
                          <li><a href="#">Link in level 2</a></li>
                          <li><a href="#">Link in level 2</a></li>
                      </ul>
                  </li>
              </ul><!-- /.sidebar-menu -->

          </div><!-- /.sidebar -->
      </div><!-- /.main-sidebar -->
      <!-- The sidebar's background -->
      <!-- This div must placed right after the sidebar for it to work-->
      <div class="control-sidebar-bg"></div>


  </div>



    <!-- Scripts -->
    <script src="/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/js/app.min.js"></script>

    <script src="/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="/plugins/fastclick/fastclick.js"></script>

    <script src="/js/app.min.js" type="text/javascript"></script>
    <script src="/js/demo.js"></script>
</body>
</html>
