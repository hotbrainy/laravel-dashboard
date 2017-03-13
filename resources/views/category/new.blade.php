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
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form role="form" action="/category/new" method="post">
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group col-md-12 {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="exampleInputEmail1">Category Name</label>
                                <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleInputEmail1" placeholder="Name">
                                @if($errors->has('name'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6 {{ $errors->has('lowprice') ? ' has-error' : '' }}">
                                <label for="exampleInputEmail1">Low Price(less than 300 words)</label>
                                <input type="number" name="lowprice" value="{{old('lowprice')}}" placeholder="Default = $3" class="form-control" id="exampleInputEmail1" placeholder="Price">
                                @if($errors->has('lowprice'))
                                 <span class="help-block">
                                    <strong>{{ $errors->first('lowprice') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6 {{ $errors->has('normalprice') ? ' has-error' : '' }}">
                                <label for="exampleInputEmail1">Normal price</label>
                                <input type="number" name="normalprice" value="{{old('normalprice')}}" placeholder="Default = $5" class="form-control" id="exampleInputEmail1" placeholder="Price">
                                @if($errors->has('normalprice'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('normalprice') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
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