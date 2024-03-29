<?php
// require_once 'header.php';

// echo "index.php";
?>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="RBI SysAdmin">
    <title>RBI-Txokogest v0.1</title>

    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
    <main class="form-signin">
      <form action="login.php" method="post">
        <img class="mb-4" src="images/logo-txoko.jpg" alt="" width="259" height="200">
        <h1 class="h3 mb-3 fw-normal">Acceso</h1>

        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" placeholder="user" name="username">
          <label for="floatingInput">User</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
          <label for="floatingPassword">Password</label>
        </div>

        <!-- <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Recordarme
          </label>
        </div> -->
        <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>
        <p class="mt-5 mb-3 text-muted">&copy; RBI - Txokogest 2021</p>
      </form>
    </main>

  </body>
</html>
