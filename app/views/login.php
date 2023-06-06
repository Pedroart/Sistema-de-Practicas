<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= _URL_ ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= _URL_ ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= _URL_ ?>/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?= _URL_ ?>/dist/css/login.css">
</head>
<body class="hold-transition login-page">
<div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block objetfitcover">
                                <img src="img/login_foto.jpg" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bienvenido</h1>
                                    </div>
                                    <form class="user" id="input1ogin" name="loginForm">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" name="email" aria-describedby="emailHelp" placeholder="Introducir tu correo...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password"  placeholder="Contrasena">
                                        </div>
                                        
                                        <button  type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                    </form>
                                    
                                    <div class="mt-3" id="respuesta">   
                                    </div>

                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">¿Has olvidado tu contraseña?</a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= _URL_ ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= _URL_ ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= _URL_ ?>/dist/js/adminlte.min.js"></script>
<script src="<?= _URL_ ?>/dist/js/login.js"></script>
</body>
</html>



