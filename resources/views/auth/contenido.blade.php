<!DOCTYPE html>
<html lang="es">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="codesin">
  <meta name="author" content="whipple.mx">
  <meta name="keyword" content="control de acceso">

  <title>@yield('meta-title', config('app.name'))</title>

  <link href="css/plantilla.css" rel="stylesheet">
  <link href="css/bg-colors.css" rel="stylesheet">

</head>

<body class="app flex-row align-items-center">
  <div class="container">
    @yield('login')
  </div>

  <!-- Bootstrap and necessary plugins -->
  <script src="js/plantilla.js"></script>

</body>
</html>