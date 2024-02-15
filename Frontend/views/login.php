<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Y'store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="apple-touch-icon" sizes="57x57" href="Frontend/assets/icones/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="Frontend/assets/icones/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="Frontend/assets/icones/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="Frontend/assets/icones/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="Frontend/assets/icones/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="Frontend/assets/icones/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="Frontend/assets/icones/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="Frontend/assets/icones/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="Frontend/assets/icones/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="Frontend/assets/icones/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="Frontend/assets/icones/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="Frontend/assets/icones/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="Frontend/assets/icones/favicons/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="Frontend/css/login.css">
</head>
<body class="row">
  <?php include('_queryMessageHandler.php'); ?>

  <section class="vh-100">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 text-black">

        <div class="px-5 ms-xl-4">
          <img class="w-25" src="Frontend/assets/icones/Logo.png">
        </div>

        <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

          <form action="authController/login" method="post" style="width: 23rem;">

            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>

            <div class="form-outline mb-4">
              <label class="form-label" for="email">Email address</label>
              <input type="email" id="email" name="email" class="form-control form-control-lg" required />
            </div>

            <div class="form-outline mb-4">
              <label class="form-label" for="password">Password</label>
              <input type="password" id="password" name="password" class="form-control form-control-lg" required />
            </div>

            <div class="pt-1 mb-4">
              <input class="btn btn-info btn-lg btn-block" type="submit" value="Login" />
            </div>

            <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">Forgot password?</a></p>
            <p>Don't have an account? <a href="#!" class="link-info">Register here</a></p>

          </form>

        </div>

      </div>
      <div class="col-sm-6 px-0 d-none d-sm-block">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img3.webp"
          alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
      </div>
    </div>
  </div>
</section>
</body>
</html>
