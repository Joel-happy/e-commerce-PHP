<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Y'Store</title>
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

            <!-- ((TEMP) For testing purposes (TEMP)) -->
            <?php
            // Start session
            session_start();

            // Check if session exists
            if (isset($_SESSION['user_id'])) {
                // Session exists, display user information
                echo "<h4>User ID: {$_SESSION['user_id']}</h4>";
                echo "<h4>Username: {$_SESSION['username']}</h4>";
                echo "<h4>Email: {$_SESSION['email']}</h4>";
                echo "<h4>Admin: {$_SESSION['admin']}</h4>";
                echo '<h4><a href="authController/logout">Logout</a></h4>';
            } else {
                // Session does not exist, display registration and login buttons
                echo '<h4><a href="register">Register</a></h4> <br>';
                echo '<h4><a href="login">Login</a></h4>';
            }
            ?>
            <!-- ((TEMP) For testing purposes (TEMP)) -->

        </section>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>