<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('/img/system32/icon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>{{ env('APP_NAME') }} - {{ isset($title_page)?$title_page:'' }}</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="{{ asset('plugins/materialize/css/materialize.min.css') }}" rel="stylesheet"/>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('plugins/trumbowyg/ui/trumbowyg.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css')  }}">
    @yield('imported_css')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <meta name="google" value="notranslate">
</head>
<body>    
    <main>
        @include('front.layouts.partials._navbar')
        @yield('content')
    </main>
    @include('front.layouts.partials._footer')
</body>
    <!--   Core JS Files   -->
    <script src="{{ asset('plugins/materialize/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('plugins/materialize/js/materialize.min.js') }}"></script>
    <script type="text/javascript">
        $('select').material_select();
        $('.button-collapse').sideNav();
        $('.parallax').parallax();        
        $("#session_msg").delay(3000).hide(600);

        (function($) {
          $(function() {
            $('.dropdown-button').dropdown({
              inDuration: 300,
              outDuration: 225,
              hover: true, // Activate on hover
              belowOrigin: true, // Displays dropdown below the button
              alignment: 'right' // Displays dropdown with edge aligned to the left of button
            });
          }); // End Document Ready
        })(jQuery); // End of jQuery name space
      </script>
    @yield('js')
</html>
