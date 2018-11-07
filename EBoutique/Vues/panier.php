<div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Accueil</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Panier</strong></div>
        </div>
      </div>
</div>

<div class="site-section">
      <div class="container">
        <h2>Votre panier :</h2>
        <div class="row mb-5">
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-thumbnail">Image</th>
                    <th class="product-name">Produit</th>
                    <th class="product-price">Prix</th>
                    <th class="product-quantity">Quantitée</th>
                    <th class="product-total">Total</th>
                    <th class="product-remove">Supprimer</th>
                  </tr>
                </thead>
                <tbody>
                  <input type="hidden" id="nbrProdDif" value="<?php echo count($lesProduits); ?>">
                  <?php
                    $prixVraimentTotal = 0;
                    for ($index = 0; $index < count($lesProduits); $index++) {
                    $nouveauProduit = $lesProduits[$index];
                    $prixTotal = $nouveauProduit->PrixProd * $nouveauProduit->QuantitéeDansPanier;
                    $prixVraimentTotal += $prixTotal;
                  ?>
                  <tr>
                    <td class="product-thumbnail">
                      <img src="Vues/images/<?php
                     if($nouveauProduit->Image != null){echo $nouveauProduit->Image;}
                     else{echo "noimage.png";}?>" alt="Image" class="img-fluid">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black"><?php echo $nouveauProduit->NomProd; ?></h2>
                    </td>
                    <td><span id="lePrix<?php echo $nouveauProduit->NumProd; ?>"><?php echo $nouveauProduit->PrixProd; ?></span>€</td>
                    <td>
                      <div class="input-group mb-3" style="max-width: 120px; margin-left: auto ; margin-right: auto;">
                        <div class="input-group-prepend">
                          <a href='./Controleur/actionPanier.php?action=2&num=<?php echo $nouveauProduit->NumProd; ?>'><button class="btn btn-outline-primary" type="button">&minus;</button></a>
                        </div>
                        <input type="text" style="background-color: white;" class="form-control text-center" id="laQuantitée<?php echo $nouveauProduit->NumProd; ?>" value="<?php echo $nouveauProduit->QuantitéeDansPanier; ?>" disabled onclick='this.select();'>
                        <div class="input-group-append">
                          <a href='./Controleur/actionPanier.php?action=3&num=<?php echo $nouveauProduit->NumProd; ?>'><button class="btn btn-outline-primary" type="button">&plus;</button></a>
                        </div>
                      </div>

                    </td>
                    <td><span id="leTotal<?php echo $nouveauProduit->NumProd; ?>"><?php echo $prixTotal; ?></span>€</td>
                    <td><a href="./Controleur/actionPanier.php?action=4&num=<?php echo $nouveauProduit->NumProd; ?>" class="btn btn-primary btn-sm">X</a></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              </form>
            </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-8">
                <a href="controleur/reset_panier.php"><button class="btn btn-outline-primary btn-sm btn-block">Vider le panier</button></a>
              </div>
            </div>
            <div class="row mb-5">
              <div class="col-md-8 mb-3 mb-md-0">
                <a href="index.php?page=magasin"><button class="btn btn-primary btn-sm btn-block">Retourner dans la boutique</button></a>
              </div>
            </div>

            <?php
            if(!isset($_SESSION['coupon']))
            {
              if(!isset($_GET['couponFail']))
              {
            ?>
            <form method="post" action="controleur/actionCoupon.php?laPageRetour=panier" name="FormCoupon">
            <div class="row">
              <div class="col-md-12">
                <label class="text-black h4" for="coupon">Coupon</label>
                <p>Entrez votre code promo si vous en avez un.</p>
              </div>
              <div class="col-md-8 mb-3 mb-md-0">
                <input type="text" class="form-control py-3" id="coupon" name="coupon" placeholder="Code Promo">
              </div>
              <div class="col-md-4">
                <button type="submit" class="btn btn-primary btn-sm">Appliquer Un Code Promo</button>
              </div>
            </div>
          </div>
          </form>
          <?php
              }
              else{
                ?>
            <form method="post" action="controleur/actionCoupon.php?laPageRetour=panier" name="FormCoupon">
            <div class="row">
              <div class="col-md-12">
                <label class="text-black h4" for="coupon">Coupon</label>
                <p>Entrez votre code promo si vous en avez un.</p>
              </div>
              <div class="col-md-8 mb-3 mb-md-0">
                <input type="text" class="form-control py-3 mb-2" id="coupon" name="coupon" placeholder="Code Promo">
                <div class="form-group row"><div class="col-lg-12"><div class="error-msg alert alert-danger"><div class="clearfix bshadow0 pbs"><span class="icon-exclamation-circle"></span> &nbsp Ce coupon n'existe pas</div></div></div></div>
              </div>
              <div class="col-md-4">
                <button type="submit" class="btn btn-primary btn-sm">Appliquer Un Code Promo</button>
              </div>
            </div>
          </div>
          </form>
                <?php
              }
            }
            else
            {
              $leCoupon = unserialize($_SESSION['coupon']);
            ?>
             <div class="row">
              <div class="col-md-12">
              <div class="form-group row"><div class="col-lg-12"><div class="error-msg alert alert-success"><div class="clearfix bshadow0 pbs"> &nbsp Vous avez activé le coupon: "<?php echo $leCoupon->Libelle; ?>" d'une réduction de -<?php echo (1-($leCoupon->Taux))*100; ?>%</div></div></div></div>
              </div>
              <div class="col-md-4">
                <a href="controleur/reset_coupon.php"><button class="btn btn-primary btn-sm">Supprimer le code Promo</button></a>
              </div>
            </div>
          </div>
            <?php
            }
            ?>

          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Total (<?php
                      if ($leNbrDeProdDansPanier > 1)
                      {
                          echo $leNbrDeProdDansPanier;
                          echo " articles";
                      }
                      else
                      {
                          echo $leNbrDeProdDansPanier;
                          echo " article";
                      }
                      ?>)</h3>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">Sous-Total:</span>
                  </div>
                  <div class="col-md-6 text-right">
                     <strong><span style="color: red;"><span id="leCasiTotal"><?php echo $prixVraimentTotal; ?></span>€</span></strong>
                  </div>
                </div>
                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black">Total: </span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong><span style="color: red;"><span id="leTotalTotal"><?php 
                    if(isset($_SESSION['coupon'])) 
                    {
                      $leCoupon = unserialize($_SESSION['coupon']);
                      $prixVraimentTotal = $prixVraimentTotal * $leCoupon->Taux; 
                    }
                    echo $prixVraimentTotal;
                     ?></span>€</span></strong>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='index.php?page=checkout'">Acheter</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<script type="text/javascript">

function validate(evt)
{
  var theEvent = evt || window.event;

  // Handle paste
  if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
  } else {
  // Handle key press
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
  }
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}

</script>
