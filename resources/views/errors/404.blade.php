@include('layouts.header')

<section class="content">
    <div class="error-page">
        <h2 class="headline text-danger"> 404</h2>

        <div class="error-content">
            <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>

            <p>
                We could not find the page you were looking for. Meanwhile, you may <a href="/profile">return to profile</a> or try using the different url.
            </p>

        </div>
        <!-- /.error-content -->
    </div>
    <!-- /.error-page -->

@include('layouts.footer')
