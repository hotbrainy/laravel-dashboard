@include('layouts.header')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        My Profile
    </h1>
    <ol class="breadcrumb">
        <li><a href="/profile"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profile</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="{{\App\User::find(\Illuminate\Support\Facades\Auth::id())->Profile->avatar}}" alt="User profile picture">

                    <h3 class="profile-username text-center">{{$user->name}}</h3>

                    <p class="text-muted text-center">@if(!auth()->user()->isAdmin()) Writer @else Admin @endif</p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Total Articles</b> <a class="pull-right"><span class="label label-default">{{$ProfileReport['total_articles']}}</span></a>
                        </li>
                        <li class="list-group-item ">
                            <b>Total Used</b> <a class="pull-right"><span class="label label-info">{{$ProfileReport['total_approved']}}</span></a>
                        </li>
                        <li class="list-group-item">
                            <b>Total Approved</b> <a class="pull-right"><span class="label label-success">{{$ProfileReport['total_approved']}}</span></a>
                        </li>
                        <li class="list-group-item">
                            <b>Total Pending</b> <a class="pull-right label-warning"><span class="label label-warning">{{$ProfileReport['total_pending']}}</span></a>
                        </li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <!-- Profile Image -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#general-settings" data-toggle="tab">General Settings</a></li>
                            <li><a href="#notification-settings" data-toggle="tab">Notification Settings</a></li>
                        </ul>

                        <div class="tab-content">
                            <div class="active tab-pane" id="general-settings">


                              <input type="hidden" name="request-type" value="gen">
                                <div class="box box-default">
                                    <div class="box-header">
                                        <h3 class="box-title">Set your Avatar</h3>
                                    </div>
                                    <div class="box-body">
                                        <form action="/profile/avatar/set" method="post" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <div class="form-group" style="padding:20px;text-align: center">
                                                <label style="padding: 20px;background: #eee">
                                                    <button style="margin-top: 10px" onclick="$(this).next().click()"  type="button" class="btn btn-warning">Choose Avatar</button>
                                                    <input onchange="var t =$(this);t.parent().parent().next().removeClass('hide');t.closest('form').submit();" style="opacity: 0" type="file" name="avatar">
                                                </label>
                                            </div>
                                            <div class="overlay hide">
                                                <i class="fa fa-refresh fa-spin"></i>
                                            </div>
                                         </form>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                <hr>
                                <h4>Set new password</h4>
                                <hr>
                                    <div class="box-body">
                                        <form action="/profile/password/set" method="post" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Password</label>
                                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">New password</label>
                                                <input type="password" name="new_password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">New password</label>
                                                <input type="password" name="repeat_password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                            </div>
                                            <div class="box-footer text-right">
                                                <button type="submit" class="btn btn-success">Set New Password</button>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- /.box-body -->

                                <h4 >Dangerous Area - Delete my account</h4>
                                <hr>
                                <div class="alert alert-warning alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-ban"></i> Warning</h4>
                                    you will not able to recover your articles once your account deleted.
                                </div>
                                    <div class="box-body">
                                        <form action="/profile/delete" method="post">
                                            {{csrf_field()}}
                                            <button type="button" onclick="confirm_Deletation(this)" class="btn btn-danger">Delete my account</button>
                                        </form>

                                    </div>
                                    <!-- /.box-body -->

                              </form>
                            </div>


                            <div class="tab-pane" id="notification-settings">
                                <h4 >Email Notifications</h4>
                                <hr>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <form action="/profile/notifications/set" method="post">
                                        {{csrf_field()}}
                                    <label>Select your preference</label>
                                        <select onchange="$(this).closest('form').submit();" name="prefer" class="form-control">
                                            <option value="all" @if(setting()->get('email_notifications') === "all") selected @endif>All Activity (Recommended)</option>
                                            <option value="import-only" @if(setting()->get('email_notifications') === "import-only") selected @endif>Only Important</option>
                                            <option value="nothing" @if(setting()->get('email_notifications') === "nothing") selected @endif>Nothing</option>
                                        </select>
                                    </form>
                                </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

</section>
<!-- /.content -->


@include('layouts.footer')
@if (Session::has('sweet_alert.alert'))
    @include('sweet::alert')
  @endif
<script>
    $('#lfm').filemanager('image');

    $(document).ready(function() {
        var url = document.location.toString();
        if (url.match('#')) {
            $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
        }

// Change hash for page-reload
        $('.nav-tabs a').on('shown.bs.tab', function (e) {
            window.location.hash = e.target.hash;
        })
    });
    function confirm_Deletation(t){
        swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover recover your account again.!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete my account!",
                    closeOnConfirm: false
                },
                function(){
                    t.closest('form').submit();
                });
    }

</script>