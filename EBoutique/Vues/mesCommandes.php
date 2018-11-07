          <div class="bg-light py-3">
            <div class="container">
              <div class="row">
                <div class="col-md-12 mb-0"><a href="index.php">Accueil</a> <span class="mx-2 mb-0">/</span> <a href="index.php?page=monCompte">MonCompte</a> <span class="mx-2 mb-0">/</span><strong class="text-black">MesCommandes</strong></div>
              </div>
            </div>
          </div>

<div class="site-section">
      <div class="container">
        <div class="row">

          <?php
          ini_set('max_execution_time', 60); //Temps d'exectution avant bug augmenté de 30s
          if (count($commandeDonnees) > 0)
          {
            ?>
            <div class="col-md-4"><h2 class="h3 mb-3 text-black" >Mes Commandes:</h2></div>
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
            <?php
                  for ($j = 0; $j < count($commandeDonnees); $j++)
                  {
                     $prixTotal = 0;
                     $nouvelleCommande = $commandeDonnees[$j];
                     $ligneCommandeDonnees = GestionLigneCommande::GetLesLigneCommandes($nouvelleCommande->NumCommande);
                     for ($k = 0; $k < count($ligneCommandeDonnees); $k++)
                      {
                      $nouvelleLigneCommande = $ligneCommandeDonnees[$k];
                      $leProduit = GestionProduit::GetLesProduits($nouvelleLigneCommande->NumProd);
                      $prixTotal += ($leProduit->PrixProd * $nouvelleLigneCommande->Quantitee);
                      }
                      
                      if($nouvelleCommande->NumCoupon != null)
                      {
                      $leCoupon = GestionCoupon::GetLeCouponByNum($nouvelleCommande->NumCoupon);
                      $prixTotal = $prixTotal * $leCoupon->Taux; 
                      }
                     ?>

                    <div class="col-md-4"><div class="p-4 border mb-0" style="line-height: 1.5; max-width: 21,87499999999999em; min-width: 21,87499999999999em;">
                    <span class="d-block text-primary h6 mb-0 block-adresse">Commande numéro <?php echo $nouvelleCommande->NumCommande; ?></span>
                    <p class="mb-0 block-adresse">Réalisée à: <?php echo $nouvelleCommande->Date; ?></p>
                    <p class="mb-0 block-adresse">Total: <span style="color: #7971ea; font-weight: bold;"><?php echo $prixTotal; ?> €</span></p>
                    <hr style="border-top: 1px solid #8c8b8b;">
                    <table class="table site-block-order-table mb-5">
                    <thead>
                      <th>Produit</th>
                      <th>Total</th>
                    </thead>
                    <tbody>
                      <?php 
                      //Pour chaque ligne commande de la commande
                      for ($k = 0; $k < count($ligneCommandeDonnees); $k++)
                      {
                      $nouvelleLigneCommande = $ligneCommandeDonnees[$k];
                      $leProduit = GestionProduit::GetLesProduits($nouvelleLigneCommande->NumProd);
                      ?>
                      <tr>
                        <td><?php echo $leProduit->NomProd; ?> <strong class="mx-2">x</strong> <?php echo $nouvelleLigneCommande->Quantitee; ?></td>
                        <td><?php echo ($leProduit->PrixProd * $nouvelleLigneCommande->Quantitee); ?> €</td>
                      </tr>
                      <?php
                      }
                        if($nouvelleCommande->NumCoupon != null)
                        {
                        $leCoupon = GestionCoupon::GetLeCouponByNum($nouvelleCommande->NumCoupon);
                        ?>
                        <tr>
                          <td>Réduction du coupon</td>
                          <td><span style="color: #7971ea; font-weight: bold;">-<?php echo (1-($leCoupon->Taux))*100; ?>%</span></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                  </table>
                  <p><a href="index.php?page=commande&num=<?php echo $nouvelleCommande->NumCommande; ?>" class="btn btn-sm btn-primary btn-block">Suivi de la commande</a></p>
          </div></div>
          <?php }
          } else
          {?>

            <div class="col-md-2"></div>
            <div class="col-md-8 text-center">
            <h2 class="h3 mb-3 text-black" >Vous n'avez pas encore de commande.</h2>
            <div class="col-md-12">
                <a href="index.php?page=magasin"><button class="btn btn-primary btn-md btn-block">Retourner dans la boutique</button></a>
              </div>
            </div>
            <div class="col-md-4"></div>
          <?php } ?>
        </div>
      </div>
    </div>