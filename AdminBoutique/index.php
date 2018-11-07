<?php
session_cache_expire (15);
session_start();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Site de vente - Bozendo</title>
        <?php header( 'content-type: text/html; charset=UTF-8' ); ?>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="Vues/js/ie/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="Vues/css/main.css" />
        <link rel="stylesheet" href="Vues/css/login.css" />
        <!--[if lte IE 9]><link rel="stylesheet" href="Vues/css/ie9.css" /><![endif]-->
        <!--[if lte IE 8]><link rel="stylesheet" href="Vues/css/ie8.css" /><![endif]-->
    </head>
    <body>
        <!-- Wrapper -->
        <div id="wrapper">

            <!-- Header -->
            <header id="header">
                <div class="inner">

                    <!-- Logo & Nav -->
                    <?php include "Vues/include/sticky.inc.php"; ?>
                    <?php include "Vues/include/header.inc.php"; ?>

                </div>
            </header>
            <!-- Menu -->
            <?php include "Vues/include/navigation.inc.php"; ?>

            <!-- Main -->
            <?php
            if (!isset($_GET['page'])) {
                if (isset($_SESSION['id']))
                {
                    header("Location: ../AdminBoutique/index.php?page=produits_lister");
                }
                else
                {
                include "controleur/login.php"; // si $page n'est pas définie, alors la page d'accueil se lance
                }
            } else {
                // si la page est définie, alors, on l'inclut !
                $page = $_GET["page"];
                if (file_exists("controleur/$page.php")) {  // on vérifie que le nom du fichier contenu dans la variable $page existe
                    include "controleur/$page.php";
                } else {

                    include "vues/include/error.inc.php"; // La page demandée est introuvable, le serveur renvoie 404
                }
            }
            ?>
            <!-- Footer -->
            <?php include "Vues/include/footer.inc.php"; ?>


        </div>

        <!-- Scripts -->
        <script src="Vues/js/jquery.min.js"></script>
        <script src="Vues/js/skel.min.js"></script>
        <script src="Vues/js/util.js"></script>
        <!--[if lte IE 8]><script src="Vues/js/ie/respond.min.js"></script><![endif]-->
        <script src="Vues/js/main.js"></script>

    </body>
</html>