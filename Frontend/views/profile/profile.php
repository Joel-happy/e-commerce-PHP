<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" name="viewport">
  <meta content="ie=edge" http-equiv="X-UA-Compatible">
  <title>Y'Store-profile</title>
  <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet">
  <link href="assets/icones/favicons/apple-icon-57x57.png" rel="apple-touch-icon" sizes="57x57">
  <link href="assets/icones/favicons/apple-icon-60x60.png" rel="apple-touch-icon" sizes="60x60">
  <link href="assets/icones/favicons/apple-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
  <link href="assets/icones/favicons/apple-icon-76x76.png" rel="apple-touch-icon" sizes="76x76">
  <link href="assets/icones/favicons/apple-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
  <link href="assets/icones/favicons/apple-icon-120x120.png" rel="apple-touch-icon" sizes="120x120">
  <link href="assets/icones/favicons/apple-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">
  <link href="assets/icones/favicons/apple-icon-152x152.png" rel="apple-touch-icon" sizes="152x152">
  <link href="assets/icones/favicons/apple-icon-180x180.png" rel="apple-touch-icon" sizes="180x180">
  <link href="assets/icones/favicons/android-icon-192x192.png" rel="icon" sizes="192x192" type="image/png">
  <link href="assets/icones/favicons/favicon-32x32.png" rel="icon" sizes="32x32" type="image/png">
  <link href="assets/icones/favicons/favicon-96x96.png" rel="icon" sizes="96x96" type="image/png">
  <link href="assets/icones/favicons/favicon-16x16.png" rel="icon" sizes="16x16" type="image/png">
  <link href="/manifest.json" rel="manifest">
  <meta content="#ffffff" name="msapplication-TileColor">
  <meta content="/ms-icon-144x144.png" name="msapplication-TileImage">
  <meta content="#ffffff" name="theme-color">
  <style>
    .hidden {
      display: none;
    }
  </style>
</head>

<body>
  <?php
  include('Frontend/views/_notLoggedIn.php');
  include('Frontend/views/_queryMessageHandler.php');
  ?>

  <section class="vh-100" style="background-color: #9de2ff;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-md-9 col-lg-7 col-xl-5">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-4">
              <div class="d-flex text-black">
                <div class="flex-shrink-0">
                  <img src="https://www.gravatar.com/avatar/2c7d99fe281ecd3bcd65ab915bac6dd5?s=250" alt="Generic placeholder image" class="img-fluid" style="width: 180px; border-radius: 10px;">
                </div>
                <div class="flex-grow-1 ms-3">
                  <h5 class="mb-1">Danny McLoan</h5>
                  <p class="mb-2 pb-1" style="color: #2b2a2a;">Senior Journalist</p>
                  <div class="d-flex justify-content-start rounded-3 p-2 mb-2" style="background-color: #efefef;">
                    <div>
                      <p class="small text-muted mb-1">Articles</p>
                      <p class="mb-0">41</p>
                    </div>
                    <div class="px-3">
                      <p class="small text-muted mb-1">Followers</p>
                      <p class="mb-0">976</p>
                    </div>
                    <div>
                      <p class="small text-muted mb-1">Rating</p>
                      <p class="mb-0">8.5</p>
                    </div>
                  </div>
                  <div class="d-flex pt-1">
                    <button type="button" class="btn btn-outline-primary me-1 flex-grow-1">Chat</button>
                    <button type="button" class="btn btn-primary flex-grow-1">Follow</button>
                  </div>
                </div>
              </div>
              <br>
              <div>
                <?php include('updateInfo.php'); ?>
                <?php include('orderHistory.php'); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Comment this line to test server-side form validation -->
  <script src="Frontend/js/profile.js"></script>
</body>

</html>
