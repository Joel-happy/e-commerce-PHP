<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
          name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
    <title>Y'store-login</title>
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet">
    <link href="Frontend/assets/icones/favicons/apple-icon-57x57.png" rel="apple-touch-icon" sizes="57x57">
    <link href="Frontend/assets/icones/favicons/apple-icon-60x60.png" rel="apple-touch-icon" sizes="60x60">
    <link href="Frontend/assets/icones/favicons/apple-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
    <link href="Frontend/assets/icones/favicons/apple-icon-76x76.png" rel="apple-touch-icon" sizes="76x76">
    <link href="Frontend/assets/icones/favicons/apple-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
    <link href="Frontend/assets/icones/favicons/apple-icon-120x120.png" rel="apple-touch-icon" sizes="120x120">
    <link href="Frontend/assets/icones/favicons/apple-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">
    <link href="Frontend/assets/icones/favicons/apple-icon-152x152.png" rel="apple-touch-icon" sizes="152x152">
    <link href="Frontend/assets/icones/favicons/apple-icon-180x180.png" rel="apple-touch-icon" sizes="180x180">
    <link href="Frontend/assets/icones/favicons/android-icon-192x192.png" rel="icon" sizes="192x192" type="image/png">
    <link href="Frontend/assets/icones/favicons/favicon-32x32.png" rel="icon" sizes="32x32" type="image/png">
    <link href="Frontend/assets/icones/favicons/favicon-96x96.png" rel="icon" sizes="96x96" type="image/png">
    <link href="Frontend/assets/icones/favicons/favicon-16x16.png" rel="icon" sizes="16x16" type="image/png">
    <link href="Frontend/assets/icones/favicons/manifest.json" rel="manifest">
    <meta content="#ffffff" name="msapplication-TileColor">
    <meta content="/ms-icon-144x144.png" name="msapplication-TileImage">
    <meta content="#ffffff" name="theme-color">
    <link href="Frontend/css/login.css" rel="stylesheet">
</head>
<body class=" d-flex flex-column">
<header class="container-fluid h25 p-0">
    <div class="">
        <a class="logo" href="#">
            <img class="" src="Frontend/assets/icones/Logo.png" alt="logo">
        </a>
    </div>

</header>
<?php include('_queryMessageHandler.php'); ?>

<main class="container-fluid d-flex justify-content-around align-items-center h-75">
    <section class="">
        <form action="authController/login" method="post" style="width: 23rem;">
            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Connectez-vous</h3>
            <div class="form-outline mb-4">
                <label class="form-label" for="email">Adresse mail</label>
                <input type="email" id="email" name="email" class="form-control form-control-lg" required />
              </div>

              <div class="form-outline mb-4">
                <label class="form-label" for="password">Mot de passe</label>
                <input type="password" id="password" name="password" class="form-control form-control-lg" required />
              </div>
  
              <div class="pt-1 mb-4">
                <input class="btn btn-info btn-lg btn-block" type="submit" value="Se connecter" />
              </div>

            <p class="small mb-5 pb-lg-2"><a class="link" href="#">Mot de passe oublié ?</a></p>
            <p>Vous n'avez pas encore de compte ? <a class="link inscription" href="register">Inscrivez vous</a></p>
        </form>
    </section>
    <section class="carouss">
        <div class="carousel-container d-flex align-items-center ">
            <div class="carousel-item active">
                <img alt="Image 1" src="Frontend/assets/produits/telephone/tel3.jpeg">
            </div>
            <div class="carousel-item ">
                <img alt="Image 2" src="Frontend/assets/produits/casque/casque5.jpeg">
            </div>
            <div class="carousel-item">
                <img alt="Image 3" src="Frontend/assets/produits/clavier_souris/cs3.jpeg">
            </div>
            <div class="carousel-item">
                <img alt="Image 3" src="Frontend/assets/produits/casque/casque2.jpg">
            </div>
            <div class="carousel-item">
                <img alt="Image 3" src="Frontend/assets/produits/clavier_souris/cs5.jpg">
            </div>
            <div class="carousel-item">
                <img alt="Image 3" src="Frontend/assets/produits/telephone/tel4.jpeg">
            </div>
        </div>
    </section>
</main>
<footer class="container-fluid">
    <section class="section1_footer d-flex justify-content-around m-5">
        <div class="d-flex flex-column">
            <div class="text-center p-3">
                <h2>ADRESSES</h2>
            </div>
            <div class="d-flex flex-column justify-content-between align-items-center">
                <h4>
                    <a class="text-decoration-none " href="mailto:someone@example.com">Y'store@courriel.com</a>
                </h4>
                <h4 class="py-5">08 118 712 218</h4>
            </div>
        </div>

        <div class="d-flex flex-column">
            <div class="text-center p-3">
                <h2>ACHETER</h2>
            </div>
            <div class="d-flex flex-column justify-content-around align-items-center">
                <h6><a class="" href="#">Tout voir</a></h6>
                <h6><a class="" href="#">Clavier/Souris</a></h6>
                <h6><a class="" href="#">Casques</a></h6>
                <h6><a class="" href="#">Ordinateurs</a></h6>
                <h6><a class="" href="#">Téléphones</a></h6>
                <h6><a class="" href="#">Promo</a></h6>
            </div>

        </div>
        <div class="d-flex flex-column">
            <div class="text-center p-3">
                <h2>POLITIQUE</h2>
            </div>
            <div class="d-flex flex-column justify-content-between">
                <h6><a href="#">Expédition et retours</a></h6>
                <h6><a href="#">Termes et conditions</a></h6>
                <h6><a href="#">FAQ</a></h6>
                <h6><a href="#">Politique de cookies</a></h6>
                <h6><a href="#">Moyens de paiement</a></h6>
                <h6><a href="#">Mentions légales</a></h6>
            </div>
        </div>

    </section>
    <section class="section2_footer">
        <div class="text-center m-3 d-flex flex-column align-items-center mt-5">
            <div class="trait_footer mb-3"></div>
            <h3 class="">Nous acceptons les moyens de paiement suivants</h3>
        </div>
        <div class="d-flex justify-content-around">

            <img class="paiement" src="Frontend/assets/icones/mastercard.svg">


            <img class="paiement" src="Frontend/assets/icones/paypal.svg">


            <img class="paiement" src="Frontend/assets/icones/visa.svg">

        </div>
    </section>
</footer>
<script src="js/scripts.js"></script>
</body>
</html>