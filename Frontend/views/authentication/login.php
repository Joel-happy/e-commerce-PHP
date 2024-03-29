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
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol xmlns="http://www.w3.org/2000/svg" id="instagram" viewBox="0 0 256 256">
        <path fill="currentColor"
              d="M128 80a48 48 0 1 0 48 48a48.05 48.05 0 0 0-48-48Zm0 80a32 32 0 1 1 32-32a32 32 0 0 1-32 32Zm48-136H80a56.06 56.06 0 0 0-56 56v96a56.06 56.06 0 0 0 56 56h96a56.06 56.06 0 0 0 56-56V80a56.06 56.06 0 0 0-56-56Zm40 152a40 40 0 0 1-40 40H80a40 40 0 0 1-40-40V80a40 40 0 0 1 40-40h96a40 40 0 0 1 40 40ZM192 76a12 12 0 1 1-12-12a12 12 0 0 1 12 12Z"/>
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="facebook" viewBox="0 0 24 24">
        <path fill="currentColor"
              d="M9.198 21.5h4v-8.01h3.604l.396-3.98h-4V7.5a1 1 0 0 1 1-1h3v-4h-3a5 5 0 0 0-5 5v2.01h-2l-.396 3.98h2.396v8.01Z"/>
    </symbol>
</svg>
<header class="container-fluid h25 p-0">
    <div class="">
        <a class="logo" href="home">
            <img class="" src="Frontend/assets/icones/Logo.png" alt="logo">
        </a>
    </div>

</header>
<?php include('Frontend/views/_queryMessageHandler.php'); ?>

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

            <p>Vous n'avez pas encore de compte ? <a class="link inscription" href="register">Inscrivez vous</a></p>
            </div>
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
<footer id="footer" class="overflow-hidden">
    <div class="container mb-5">
        <div class="row">
            <div class="footer-top-area">
                <div class="row d-flex flex-wrap justify-content-between mt-4">
                    <div class="col-lg-3 col-sm-6 pb-3 ">
                        <div class="footer-menu text-black ">
                            <img src="assets/images-homepage/Logo.png" alt="logo" class="w-50 ">
                            <p class="text-black">Nous nous engageons à vous
                                offrir une expérience exceptionnelle, alliant innovation, qualité et service
                                exceptionnel. Découvrez notre monde et rejoignez-nous dans la création d'une
                                expérience
                                en ligne inoubliable.</p>
                            <div class="social-links">
                                <ul class="d-flex list-unstyled">
                                    <li>
                                        <a href="https://www.facebook.com/?locale=fr_FR">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/?lang=fr">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                                                <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
                                            </svg>
                                        </a>
                                    <li>
                                        <a href="https://www.tiktok.com/login?lang=fr&redirect_url=https%3A%2F%2Fwww.tiktok.com%2Fupload%3Flang%3Dfr">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-tiktok" viewBox="0 0 16 16">
                                                <path d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3z"/>
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6 pb-3">
                        <div class="footer-menu text-uppercase">
                            <h5 class="widget-title pb-2">Liens Rapides</h5>
                            <ul class="menu-list list-unstyled text-uppercase">
                                <li class="menu-item pb-2">
                                    <a href="#">Menu</a>
                                </li>
                                <li class="menu-item pb-2">
                                    <a href="#">À propos</a>
                                </li>
                                <li class="menu-item pb-2">
                                    <a href="#">Boutique</a>
                                </li>
                                <li class="menu-item pb-2">
                                    <a href="#">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 pb-3">
                        <div class="footer-menu text-uppercase">
                            <h5 class="widget-title pb-2">Aide et informations Aide</h5>
                            <ul class="menu-list list-unstyled">
                                <li class="menu-item pb-2">
                                    <a href="#">
                                        Suivre votre commande</a>
                                </li>
                                <li class="menu-item pb-2">
                                    <a href="#">
                                        Politiques de retour</a>
                                </li>
                                <li class="menu-item pb-2">
                                    <a href="#">Expédition + Livraison</a>
                                </li>
                                <li class="menu-item pb-2">
                                    <a href="#">Contactez nous</a>
                                </li>
                                <li class="menu-item pb-2">
                                    <a href="#">Faq</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 pb-3">
                        <div class="footer-menu contact-item">
                            <h5 class="widget-title text-uppercase pb-2">Contactez nous</h5>
                            <p class="text-light">Avez-vous des questions ou des suggestions ? <a href="mailto:">ystore@gmail.com</a>
                            </p>
                            <p class="text-light">Vous avez besoin d'aide ? Appelez-nous simplement. <a href="">+33
                                111
                                222 333 44</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <hr class="mt-5">
</footer>
<div id="footer-bottom">
    <div class="container">
        <div class="row d-flex flex-wrap justify-content-between black">
            <div class="col-md-4 col-sm-6">
                <div class="Shipping d-flex">
                    <p>Nous expédions avec :</p>
                    <div class="card-wrap ps-2">
                        <img src="assets/images-homepage/dhl-icon.svg" alt="dhl" class="w-25">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-truck" viewBox="0 0 16 16">
                            <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5zm1.294 7.456A2 2 0 0 1 4.732 11h5.536a2 2 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456M12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2"/>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="payment-method d-flex">
                    <p>Nous acceptons les moyens de paiement suivants :</p>
                    <div class="card-wrap ps-2">
                        <img src="assets/icones/visa.svg" alt="visa">
                        <img src="assets/icones/mastercard.svg" alt="mastercard">
                        <img src="assets/icones/paypal.svg" alt="paypal">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/scripts.js"></script>


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
<script src="Frontend/js/scripts.js"></script>
</body>
</html>