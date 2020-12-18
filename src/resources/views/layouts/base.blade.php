<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Click Tracking test task</title>

    <link rel="manifest" href="/mix-manifest.json">
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ mix('css/adminlte.min.css') }}">

    @yield('styles')

</head>

<body class="layout-top-nav" style="height: auto;">
<!-- Site wrapper -->
<div class="wrapper">
    <div class="content-wrapper" style="min-height: 1973.2px;">

        <!-- Main content -->
        <section class="content">

            @yield('content')

        </section>
        <!-- /.content -->
    </div>

    <footer class="main-footer">
        Test task by Dmytro Zaporozhchenko
    </footer>
</div>

<!-- jQuery -->
<script src="{{ mix('js/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ mix('js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ mix('js/adminlte.min.js') }}"></script>

@yield('scripts')

</body>

</html>
