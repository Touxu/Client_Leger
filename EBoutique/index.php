<?php
include("Modele/GestionPanier.class.php");
include("Modele/GestionProduit.class.php");
include("Modele/GestionCategorie.class.php");
include("Modele/GestionUtilisateur.class.php");
include("Modele/GestionAdresse.class.php");
include("Modele/GestionCommande.class.php");
include("Modele/GestionLigneCommande.class.php");
include("Modele/GestionFacture.class.php");
include("Modele/GestionEtat.class.php");
include("Modele/GestionEtape.class.php");
include("Modele/GestionCoupon.class.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Bozendo &mdash; Site de vente</title>
    <?php header( 'content-type: text/html; charset=UTF-8' ); ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="Vues/fonts/icomoon/style.css">

    <link rel="stylesheet" href="Vues/css/bootstrap.min.css">
    <link rel="stylesheet" href="Vues/css/magnific-popup.css">
    <link rel="stylesheet" href="Vues/css/jquery-ui.css">
    <link rel="stylesheet" href="Vues/css/owl.carousel.min.css">
    <link rel="stylesheet" href="Vues/css/owl.theme.default.min.css">


    <link rel="stylesheet" href="Vues/css/aos.css">

    <link rel="stylesheet" href="Vues/css/style.css">

  </head>
  <body>


  <div class="site-wrap">

    <header class="site-navbar" role="banner">

    <!-- Header -->
    <?php include "Vues/include/header.inc.php"; ?>

    <!-- Nav -->
    <?php include "Vues/include/nav.inc.php"; ?>

    </header>

    <!-- Main -->
    <?php
    if (!isset($_GET['page'])) {
        include "controleur/Accueil.php"; // si $page n'est pas définie, alors la page d'accueil se lance
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

  <script src="Vues/js/jquery-3.3.1.min.js"></script>
  <script src="Vues/js/jquery-ui.js"></script>
  <script src="Vues/js/popper.min.js"></script>
  <script src="Vues/js/bootstrap.min.js"></script>
  <script src="Vues/js/owl.carousel.min.js"></script>
  <script src="Vues/js/jquery.magnific-popup.min.js"></script>
  <script src="Vues/js/aos.js"></script>

  <script src="Vues/js/main.js"></script>

  </body>
</html>