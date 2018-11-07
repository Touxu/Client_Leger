<div class="bg-light py-3">
            <div class="container">
              <div class="row">
                <div class="col-md-12 mb-0"><a href="index.php">Accueil</a> <span class="mx-2 mb-0">/</span> <a href="index.php?page=monCompte">MonCompte</a> <span class="mx-2 mb-0">/</span><strong class="text-black">MesAdresses</strong></div>
              </div>
            </div>
          </div>

    <div class="site-section">
      <div class="container">
        <div class="row">

          <div class="col-md-4"><h2 class="h3 mb-3 text-black" >Mes Adresses:</h2></div>
          <div class="col-md-4"></div>
          <div class="col-md-4"></div>

          <div class="col-md-4"><div class="p-4 mb-3" style="border: 1px dashed #8c92a0; max-width: 21,87499999999999em; min-width: 21,87499999999999em; max-height: 15.5em; min-height 15.5em;">
          <a href="index.php?page=AjouterUneAdresse">
          <span class="d-block text-primary h3 mb-5"> </span>
          <span class="d-block icon icon-plus h1" style="text-align: center;"></span>
          <span class="d-block text-primary h3 mb-5" style="text-align: center;">Ajouter une adresse</span>
          <br><br>
          </a>
          </div></div>

          <?php if(isset($idAdressePrefere))
	        {?>
          <div class="col-md-4"><div class="p-4 border mb-3" style="line-height: 1.5; max-width: 21,87499999999999em; min-width: 21,87499999999999em; max-height: 15.5em; min-height 15.5em;">
          <p class="mb-0" style="font-size: smaller;">Par défaut</p>
          <hr class="mb-2" style="margin-top: 0.4rem;">
          <span class="d-block text-primary h6 mb-0 block-adresse"><?php echo $adressePrefere->Nom. " ". $adressePrefere->Prenom; ?></span>
          <p class="mb-0 block-adresse"><?php echo $adressePrefere->Adresse; ?></p>
          <?php if(!isset($adressePrefere->AdresseComplement)) { ?>
          <p class="mb-0 block-adresse"><?php echo $adressePrefere->AdresseComplement; ?></p>
          <?php } ?>
          <p class="mb-0 block-adresse"><?php echo $adressePrefere->Ville. ", ". $adressePrefere->CodePostal; ?></p>
          <p class="mb-0 block-adresse"><?php echo $adressePrefere->Region. ", ". $adressePrefere->Pays; ?></p>
          <p class="mb-0 block-adresse mb-<?php if(isset($adressePrefere->AdresseComplement)) { ?>3<?php } else{?>0<?php }?>">Numéro de téléphone: <?php echo $adressePrefere->Telephone; ?></p>
          <?php if(isset($adressePrefere->AdresseComplement)) { ?>
          <br class="block-adresse mb-0">
          <?php } else {?>
            <p class="block-adresse mb-3"></p>
          <?php }?>
          <p class="mb-0 block-adresse mb-0"><a href="index.php?page=ModifierUneAdresse&idAdresse=<?php echo $idAdressePrefere; ?>">Modifier</a>&nbsp;  | &nbsp;<a href="./Controleur/actionAdresse.php?idUser=<?php echo $adressePrefere->IdUtilisateur; ?>&idAdressePrefere=<?php echo $idAdressePrefere; ?>&action=1">Supprimer</a></p>
          </div></div>
          <?php } ?>

          <?php
                  for ($j = 0; $j < count($adresseDonnees); $j++)
                  {
                     $nouvelleAdresse = $adresseDonnees[$j];
                     if ($nouvelleAdresse->IdAdresse != $idAdressePrefere)
                     {
                     ?>

          <div class="col-md-4"><div class="p-4 border mb-3" style="line-height: 1.5; max-width: 21,87499999999999em; min-width: 21,87499999999999em; max-height: 15.5em; min-height 15.5em;">
          <span class="d-block text-primary h6 mb-0 block-adresse"><?php echo $nouvelleAdresse->Nom. " ". $nouvelleAdresse->Prenom; ?></span>
          <p class="mb-0 block-adresse"><?php echo $nouvelleAdresse->Adresse; ?></p>
          <?php if(!isset($nouvelleAdresse->AdresseComplement)) { ?>
          <p class="mb-0 block-adresse"><?php echo $nouvelleAdresse->AdresseComplement; ?></p>
          <?php } ?>
          <p class="mb-0 block-adresse"><?php echo $nouvelleAdresse->Ville. ", ". $nouvelleAdresse->CodePostal; ?></p>
          <p class="mb-0 block-adresse"><?php echo $nouvelleAdresse->Region. ", ". $nouvelleAdresse->Pays; ?></p>
          <p class="mb-0 block-adresse mb-<?php if(isset($nouvelleAdresse->AdresseComplement)) { ?>4<?php } else{?>1<?php }?>">Numéro de téléphone: <?php echo $nouvelleAdresse->Telephone; ?></p>
          <?php if(isset($nouvelleAdresse->AdresseComplement)) { ?>
          <br class="block-adresse mb-4">
          <?php } else {?>
            <p class="block-adresse mb-3"></p>
            <p class="block-adresse mb-1"></p>
            <br class="block-adresse mb-1">
          <?php }?>
          <p class="block-adresse mb-0" style=" display: table-cell; vertical-align: bottom; "><a href="index.php?page=ModifierUneAdresse&idAdresse=<?php echo $nouvelleAdresse->IdAdresse; ?>">Modifier</a>&nbsp;  | &nbsp;<a href="./Controleur/actionAdresse.php?idAdresse=<?php echo $nouvelleAdresse->IdAdresse; ?>&action=3">Supprimer</a>&nbsp;  | &nbsp;<a href="./Controleur/actionUtilisateur.php?idUser=<?php echo $nouvelleAdresse->IdUtilisateur; ?>&idAdressePrefere=<?php echo $nouvelleAdresse->IdAdresse; ?>&action=2">Définir par défaut</a></p>
          </div></div>

          <?php }} ?>
          
        </div>
      </div>
    </div>