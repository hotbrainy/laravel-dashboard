@include('layouts.header')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Settings
    </h1>
    <ol class="breadcrumb">
        <li><a href="/profile"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profile</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-10 ">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <form role="form" action="/settings/update" method="post">
                        {{csrf_field()}}
                        <h3>Set Default Article price</h3>
                        <div class="box-body">
                            <div class="form-group col-md-6 {{ $errors->has('lowprice') ? ' has-error' : '' }}">
                                <label for="exampleInputEmail1">Low Price(Default)</label>
                                <input type="number" name="lowprice" value="@if($errors->has('lowprice')){{old('lowprice')}}@else{{intval($settings[0]->default_article_low_price)}}@endif"  class="form-control" id="exampleInputEmail1" placeholder="Price">
                                @if($errors->has('lowprice'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('lowprice') }}</strong>
                                </span>
                                @endif
                                <small>*Updated rates only apply with new articles</small>
                            </div>
                            <div class="form-group col-md-6 {{ $errors->has('normalprice') ? ' has-error' : '' }}">
                                <label for="exampleInputEmail1">Normal price (Default)</label>
                                <input type="number" name="normalprice" value="@if($errors->has('normalprice')){{old('normalprice')}}@else{{intval($settings[0]->default_article_normal_price)}}@endif"  class="form-control" id="exampleInputEmail1" placeholder="Price">
                                @if($errors->has('normalprice'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('normalprice') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <!-- /.box-body -->


                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
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
@if (Session::has('sweet_alert.alert'))
    @include('sweet::alert')
@endif
<script>


</script>