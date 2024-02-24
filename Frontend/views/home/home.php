<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
          name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
    <title>Y'Store-main</title>
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
    <link href="/manifest.json" rel="manifest">
    <meta content="#ffffff" name="msapplication-TileColor">
    <meta content="/ms-icon-144x144.png" name="msapplication-TileImage">
    <meta content="#ffffff" name="theme-color">
</head>
<body class="container-fluid row bg-danger">
<header class="col-12 container-fluid bg-primary">
    <nav class="row">
        <p class="col">Offre de livraison</p>
        <p class="col">A propos</p>
        <p class="col">Contact</p>
        <p class="col">Centre d'aide</p>
    </nav>
    <section class="section_header container-fluid">

    </section>
    <nav class="nav_header2 ">

    </nav>

</header>
<main class="bg-warning col-12 container-fluid">
    <nav class="nav_main">
        <?php include('showProducts.php'); ?>
    </nav>
    <aside>

    </aside>
    <section class="section_main"></section>
    <section class="section_main"></section>
</main>
<footer class="bg-info col-12 container-fluid">
    <section class="section1_footer row">
        <div class="col-4">
            <a>
                Adresse Mail
            </a>
            <p>
                Numéro de téléphone
            </p>
        </div>
        <div class="col-4">
            <a href="">Clavier/Souris</a>
            <a href="">Casques</a>
            <a href="">Ordinateurs</a>
            <a href="">Téléphones</a>
        </div>
        <div class="col-4">
            <a href="">Politique de retour et de remboursement</a>
            <a href="">Politique de Livraison</a>
        </div>
    </section>
    <section class="section2_footer">
        <h3>Nous acceptons les moyens de paiement suivants</h3>
        <div class="row">
            <img class="col-3" src="Frontend/assets/icones/mastercard.svg">
            <img class="col-3" src="Frontend/assets/icones/paypal.svg">
            <img class="col-3" src="Frontend/assets/icones/visa.svg">
        </div>


    </section>
</footer>
<script crossorigin="anonymous"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>