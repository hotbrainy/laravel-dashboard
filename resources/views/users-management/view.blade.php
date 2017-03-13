@include('layouts.header')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Categories
    </h1>
    <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="pull-right">
                        <a href='/users/new' type="button" class="btn btn-block btn-warning btn-flat">new user</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="users-table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <!--th class="no-sort"><label><input  data-selected-all-rows type="checkbox" class="minimal-gray checkmark checkmark-all"></label></th-->
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Admin</th>
                            <th>
                                <div class="row">
                                    <div class="col-md-6">Options</div>
                                </div>
                            </th>
                        </tr>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>@if($user->is_admin) Yes @else NO @endif</td>
                                <td>
                                    <form action="/users/delete" method="post">
                                        {{csrf_field()}}
                                        <button type="button" onclick="confirmdel(this)" class="btn btn-danger btn-sm" style="margin: 5px;" href="/users/delete">Delete</button>
                                        <input type="hidden" value="{{$user->id}}" name="id">
                                        <button type="button" onclick="resetpassword(this)" style="margin: 5px;" class="btn btn-warning btn-sm" href="">reset password</button>
                                    </form>
                                    <form action="/users/pass-rest"  method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" value="{{$user->id}}" name="id">
                                        <input type="hidden" data-new-password name="password">
                                     </form>
                                 </td>
                            </tr>
                        @endforeach
                        </tbody>
                        </thead>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->



@include('layouts.footer')
<script>
    function confirmdel(t){
        swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this user again!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: false
                },
                function(){
                    $(t).closest('form').submit();
                });
    }

    function resetpassword(t) {
                swal({
                    title: "Reset Password",
                    text: "New Password",
                    type: "input",
                    inputType : 'password',
                    showCancelButton: true,
                    closeOnConfirm: false,
                    inputPlaceholder: "New Password"
                },
                function(inputValue){
                    if (inputValue === false) return false;

                    if (inputValue === "") {
                        swal.showInputError("password field required.!");
                        return false
                    }else if(inputValue.length < 6){
                        swal.showInputError("Password should be 6 characters long.");
                        return false
                    }

                    $('[data-new-password]').val(inputValue);
                    $(t).parent().next().submit();

                });
    }

</script>

@if (Session::has('sweet_alert.alert'))
    @include('sweet::alert')
@endif