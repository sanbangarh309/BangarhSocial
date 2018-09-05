<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="UTF-8">
<title>Social Widgets</title>
<meta name="robots" content="none">
  @include('sandeep::layouts.style')
</head>
<body class="wh-widget-send-button-desktop">
  @yield('content')
  @include('sandeep::layouts.scripts')
</body>
</html>
