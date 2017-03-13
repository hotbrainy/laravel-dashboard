@include('layouts.header')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Articles

    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Articles</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="pull-right">
                        <a href='/article/compose' type="button" class="btn btn-block btn-warning btn-flat">New Article</a>
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
                            <th >Title</th>
                            <th>W/C/P</th>
                            <th>Cat</th>
                            <th>Status</th>
                            <th>
                                <div class="row">
                                    <div class="col-md-6">Created At</div>
                                    <div class="col-md-6">Options</div>
                                </div>
                            </th>
                        </tr>
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

<form method="post" data-del-form action="/article/delete">
    {{csrf_field()}}
    <input type="hidden" data-del-temp-id  name="article_id">
</form>
@include('layouts.footer')

<script>
    $(function () {

        var tabledata = $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            stateSave: true,
            "order": [],
            ajax: '{!! url('article/get') !!}',
            columns: [
                { data: 'article_id', name: 'article_id' },
                { data: 'title', name: 'title' },
                { data: 'status', name: 'status' },
                { data: 'cat', name: 'cat' },
            ],
            "columnDefs": [
                {
                    "targets": 'no-sort',
                    "orderable": false,
                },
                /*{
                        "targets": 0,
                        "searchable": false,
                        "render": function ( data, type, row ) {
                            var  options = '<label><input type="checkbox" class="minimal-gray checkmark checkmark-input" name="quux[1]"></label>';
                            return options;
                        },
                        "orderable": false

                    },*/
                    {
                        "targets": 0,
                        "data": null,
                        "render": function ( data, type, row ) {
                            var  options = row.article_id;
                            return options;
                        },

                    },
                    {
                        "targets": 1,
                        "data": null,
                        "render": function ( data, type, row ) {
                            var  options = '<b style="text-transform: capitalize;" title="'+row.title+'">'+row.titlestriped+'</b>';
                            return options;
                        },

                    },
                    {
                        "targets": 2,
                        "data": null,
                        "render": function ( data, type, row ) {
                            var  options = row.total_words+"/"+row.total_chars+"/"+row.total_paras;
                            return options;
                        },

                    },
                    {
                        "targets": 3,
                        "data": null,
                        "render": function ( data, type, row ) {
                            var  options = row.cat;
                            return options;
                        },

                    },
                    {
                        "targets": 4,
                        "data": null,
                        "render": function ( data, type, row ) {
                            if(row.status === 'Pending'){
                                var  options = "<b class='text-warning'>"+row.status+"</b>";
                            }else if(row.status === 'Approved'){
                                var  options = "<b class='text-success'>"+row.status+"</b>";
                            }else if(row.status === 'Used'){
                                var  options = "<b class='text-info'>"+row.status+"</b>";
                            }

                            return options;
                        },

                    },
                    {
                    "targets": 5,
                    "render": function ( data, type, row ) {
                        var  options = '<div class="row"><div class="col-md-6"><time >'+row.timeago+'</time></div><div class="col-md-6"><a class="btn btn-primary" style="margin: 0px 5px;background: transparent;border: 1px solid #000;color: #000;" href="/article/view/'+row.article_id+'"><i class="ion ion-eye"></i></a>'+
                                        '<a class="btn btn-warning" style="margin: 0px 5px;background: transparent;border: 1px solid #000;color: #000;" href="/article/updater/'+row.article_id+'"><i class="ion ion-edit"></i></a>'+
                                        '<button onclick="confirm_Del('+row.article_id+')" class="btn btn-danger" style="margin: 0px 5px;background: transparent;border: 1px solid #000;color: #000;" ><i class="ion ion-ios-trash"></i></button></div></div>';
                        return options;
                    },
                        "orderable": false

                },
            ],
            "initComplete": function(settings, json) {
                jQuery("time.timeago").timeago();
                $('.checkmark-input').iCheck({
                    checkboxClass: 'icheckbox_square-grey',
                    radioClass: 'iradio_square-grey',
                    increaseArea: '20%' // optional
                });
                $('.checkmark-all').iCheck({
                    checkboxClass: 'icheckbox_square-grey',
                    radioClass: 'iradio_square-grey',
                    increaseArea: '20%' // optional
                });
                $('.checkmark').on('ifChecked', function (event){
                    $(this).closest("input").attr('checked', true);
                });
                $('.checkmark').on('ifUnchecked', function (event) {
                    $(this).closest("input").attr('checked', false);
                });
                $('.checkmark-all').on('ifChecked', function(event){
                    $('.checkmark-input').iCheck('check');
                });
                $('.checkmark-all').on('ifUnchecked', function(event){
                    $('.checkmark-input').iCheck('uncheck');
                });
                /*$('.dataTables_length').prepend('<button onclick="confirm_Del()" class="btn btn-danger" style="margin: 0px 5px;margin-right: 20px;background: transparent;border: 1px solid #000;color: #000;"><i class="ion ion-ios-trash"></i></button>');*/
            }
        });
        yadcf.init(tabledata, [
                {
                    column_number: 1,
                    filter_type : 'text',
                    enable_auto_complete : true,
                    reset_button_style_class : "btn btn-warning btn-sm"
                },
                {
                    column_number: 3,
                    filter_type : 'select',
                    <?php $cat_array = array(); ?>
                    @foreach(\App\Category::all() as $cat)
                        <?php array_push($cat_array,$cat->name); ?>
                    @endforeach
                    data : [<?php echo '"'.implode('","', $cat_array).'"' ?>],
                    case_insensitive : false
                },
                {
                    column_number: 4,
                    filter_type : 'select',
                    data : ['Pending','Approved','Used'],
                    case_insensitive : false
                }

        ]);

        setInterval( function () {
            tabledata.ajax.reload();
        }, 30000 );

    });



    $('#users-table').on( 'draw.dt', function () {
        jQuery("time.timeago").timeago();
        $('.checkmark-input').iCheck({
            checkboxClass: 'icheckbox_square-grey',
            radioClass: 'iradio_square-grey',
            increaseArea: '20%' // optional
        });
        $('input').on('ifChecked', function (event){
            $(this).closest("input").attr('checked', true);
        });
        $('input').on('ifUnchecked', function (event) {
            $(this).closest("input").attr('checked', false);
        });
        $('input').on('ifChecked', function(event){
            $('input').iCheck('check');
        });
        $('input').on('ifUnchecked', function(event){
            $('input').iCheck('uncheck');
        });

    } );



    function confirm_Del(i){
        $('[data-del-temp-id]').val(i);
            swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this Article file!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: false
                },
                function(){
                    $('[data-del-form]').submit();
                });
    }





</script>
@include('sweet::alert')