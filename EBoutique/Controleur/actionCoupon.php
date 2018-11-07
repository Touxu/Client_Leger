<?php
include("../modele/GestionProduit.class.php");
include("../modele/GestionPanier.class.php");
include("../modele/GestionCategorie.class.php");
include("../modele/GestionUtilisateur.class.php");
include("../modele/GestionAdresse.class.php");
include("../modele/GestionCoupon.class.php");
session_start();

    $leCoupon = GestionCoupon::GetLeCouponByCode($_POST["coupon"]); //le Coupon

    if($leCoupon != null)
    {
        $_SESSION['coupon'] = serialize($leCoupon);
        header("Location: ../index.php?page=panier");
    }
    else
    {
        header("Location: ../index.php?page=panier&couponFail=1");
    }

?>
