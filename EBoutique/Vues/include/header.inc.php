<div class="site-navbar-top">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-6 col-md-4 order-2 order-md-1 text-left">
         </div>
         <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
            <div class="site-logo">
               <a href="index.php" class="js-logo-clone">Bozendo</a>
            </div>
         </div>
         <div class="col-6 col-md-4 order-3 order-md-3 text-right">
            <div class="site-top-icons">
               <ul>
                  <li><a href='index.php?page=<?php if (!isset($_SESSION['id'])) { echo "login'>Se Connecter";} else {echo "monCompte'>Mon Compte";}?> &nbsp;<span class="icon icon-person"></span></a></li>
                  <?php
                     $leNbrDeProdDansPanier = GestionPanier::getNbrProduit();
                  ?>
                  <li>
                     <a href="./index.php?page=panier" class="site-cart">
                     <span class="icon icon-shopping_cart"></span>
                     <span class="count"><?php echo $leNbrDeProdDansPanier;?></span>
                     </a>
                  </li>
                  <li><span style="margin-left: 1.5em;">Bienvenue <?php if (isset($_SESSION['id'])) echo $_SESSION['pseudo'];?></span></li>
                  <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>

