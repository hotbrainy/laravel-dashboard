</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> {{config('app.version')}}
    </div>
    <strong>Copyright &copy; 2014-2016 {{config('app.name')}}.</strong> All rights
    reserved.
</footer>

</div>
<!-- ./wrapper -->





<!-- jQuery 2.2.3 -->
<script src="/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="/plugins/datatables/jquery.dataTables.yadcf.js"></script>
<!-- SlimScroll -->
<script src="/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/js/app.min.js"></script>
<!-- bootstrap-tour -->
<script src="/js/bootstrap-tour.min.js"></script>
<!-- iCheck -->
<script src="/plugins/iCheck/icheck.min.js"></script>

<!-- Cookie -->
<script src="/js/jquery.cookie.js"></script>
<!-- CKEdior -->
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>

<!-- SweetAlert --->
<script src="/js/sweetalert.min.js"></script>
<!-- Pace --->
<script src="../../plugins/pace/pace.min.js"></script>
<!-- TimeAgo --->
<script src="/js/jquery.timeago.js"></script>

<!-- Js Controller --->
<script src="/js/controller.js"></script>
<script>$(document).ajaxStart(function() { Pace.restart(); });</script>
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-grey',
            radioClass: 'iradio_square-grey',
            increaseArea: '20%' // optional
        });

        $('[data-trigger-notification-try]').on('click',function () {
           var t = this;
            $.get('/notification/read-all').done(function(data){
               $(t).find('.count-notify').remove();
           });
        });
    });
</script>


{{--<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/js/pages/dashboard.js"></script>--}}

</body>
</html>