<!DOCTYPE html>
<html>
  <head>
 <!--  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Simple CRUD</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/bulma-calendar-master/dist/css/bulma-calendar.min.css')}}">
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{asset('plugins/bulma-calendar-master/dist/js/bulma-calendar.js')}}"></script>
    @stack('scripts')
  </head>
  <body>
    @yield('content')
  </body>
</html>