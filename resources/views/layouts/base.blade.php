<!DOCTYPE html>

    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <link rel="manifest" href="/mix-manifest.json">

{{--            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">--}}
            {{-- Page load optimization --}}
            <link rel="preconnect" href="https://fonts.googleapis.com">
            @stack('header-links')

            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Click Tracking test task</title>

            <!-- Google Font: Source Sans Pro -->
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
            <!-- Font Awesome -->
{{--            <link rel="stylesheet" href="{{ mix('css/all.min.css') }}">--}}
            <!-- Theme style -->
            <link rel="stylesheet" href="{{ mix('css/adminlte.min.css') }}">



{{--            <!-- Core JS files -->--}}
{{--            <script defer type="text/javascript" src="{{ asset ("/limitless/assets/js/plugins/loaders/pace.min.js")}}"></script>--}}
{{--            <script defer type="text/javascript" src="{{ asset ("/limitless/assets/js/core/libraries/bootstrap.min.js")}}">--}}
{{--            </script>--}}
{{--            <script defer type="text/javascript" src="{{ asset ("/limitless/assets/js/plugins/loaders/blockui.min.js")}}">--}}
{{--            </script>--}}
{{--            <!-- /core JS files -->--}}

{{--            <!-- Theme JS files -->--}}
{{--            <script defer type="text/javascript" src="{{ asset ("/limitless/assets/js/plugins/forms/styling/uniform.min.js")}}">--}}
{{--            </script>--}}
{{--            <script defer type="text/javascript" src="{{ asset ("/limitless/assets/js/plugins/forms/selects/select2.min.js")}}">--}}
{{--            </script>--}}
{{--            <script defer type="text/javascript"--}}
{{--                    src="{{ asset ("/limitless/assets/js/plugins/notifications/sweet_alert.min.js")}}"></script>--}}

{{--            <!-- /theme JS files -->--}}

        </head>

        <body class="layout-top-nav" style="height: auto;">
        <!-- Site wrapper -->
        <div class="wrapper">
            <div class="content-wrapper" style="min-height: 1973.2px;">
                <!-- Content Header (Page header) -->

                <!-- Main content -->
                <section class="content">

                    @yield('content')

                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <footer class="main-footer">
                Test task by Dmytro Zaporozhchenko
            </footer>

        <!-- ./wrapper -->

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
