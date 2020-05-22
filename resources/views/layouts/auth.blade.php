
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>@yield('title', 'AdminLTE 3')</title>

  <link rel="shortcut icon" href="{{ asset('img/7Sheep.png') }}" type="image/png">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{ mix('css/auth.css') }}">

</head>
<body class="hold-transition @yield('this-page')">
    @yield('content')
<!-- REQUIRED SCRIPTS -->
<script src="{{ mix('js/auth.js') }}"></script>
</body>
</html>
