<?php
session_start();
unset($_SESSION['panier']);
unset($_SESSION['coupon']);
header("Location: ../index.php?page=panier");
?>



