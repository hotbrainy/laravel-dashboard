@include('layouts.header')

<section class="content">
    <div class="error-page">
        <h2 class="headline text-yellow"> 403</h2>

        <div class="error-content">
            <h3><i class="fa fa-warning text-yellow"></i> Unauthorized action.</h3>

            <p>
                permission denied. this page is not in your use. kindly contact to Admin for more information.
                Meanwhile, you may <a href="/profile">return to profile</a> or try using the different url.
            </p>

        </div>
        <!-- /.error-content -->
    </div>
    <!-- /.error-page -->

@include('layouts.footer')
