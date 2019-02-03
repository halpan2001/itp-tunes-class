<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
</head>
<body style="margin-left: 100px; margin-right: 100px; padding: 10px;">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="nav-link" href="/genres">Genres <span class="sr-only">(current)</span></a>
    <a class="nav-link" href="/tracks">Tracks <span class="sr-only">(current)</span></a>
  </nav>
  <div class="contianer-fluid">
    @yield('main')
  </div>
</body>
</html>
