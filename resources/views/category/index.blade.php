@include('layouts.header')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Categories
    </h1>
    <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Categories</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="pull-right">
                        <a href='/category/new' type="button" class="btn btn-block btn-warning btn-flat">New Category</a>
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
                            <th>Low/Normal</th>
                            <th>
                                <div class="row">
                                    <div class="col-md-6">Options</div>
                                </div>
                            </th>
                        </tr>
                        <tbody>
                            @foreach($cat as $c)
                                <tr>
                                    <td>{{$c->category_id}}</td>
                                    <td>{{$c->name}}</td>
                                    <td>@if($c->low_price === 0 && $c->normal_price === 0) Default @else ${{$c->low_price}}\${{$c->normal_price}}@endif</td>
                                    <td>
                                        <form action="/category/delete" method="post">
                                            {{csrf_field()}}
                                            <input type="hidden" name="id" value="{{$c->category_id}}">
                                            <button onclick="delwarning(this);" type="button"  class="btn btn-danger" >Delete</button></td>
                                        </form>
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
    function delwarning(t){
        swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this category object!",
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
</script>
@include('sweet::alert')