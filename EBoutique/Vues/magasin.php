<div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Accueil</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Magasin</strong></div>
        </div>
      </div>
</div>

    <div class="site-section site-blocks-1">
      <div class="container">

        <div class="row mb-5">
          <div class="col-md-12 order-2">

            <div class="row">
              <div class="col-md-12 mb-5">
                <div class="d-flex">
                  <div class="dropdown mr-1 ml-md-auto">
                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Catégorie
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                    <?php

foreach($lesCategs as $laCateg)
{
?>
                      <a class="dropdown-item" href="index.php?page=magasin&categAffi=<?php
	echo $laCateg->NumCategorie; ?>"><?php
	echo $laCateg->NomCategorie; ?></a>
                      <?php
}

?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-5">
               <?php
$leNumDuproduitAaficcher = 0;
$nbrProduitSurLaPage = 9;
    if(isset($_GET["numpage"]))
    {
      $leNumDuproduitAaficcher = (($_GET["numpage"]) - 1) * 9;
    }
               
if(count($produitDonnees) < 9) $nbrProduitSurLaPage = count($produitDonnees);
else { if(isset($_GET["numpage"])) { if($_GET["numpage"] != 1) {$nbrProduitSurLaPage = count($produitDonnees) - $leNumDuproduitAaficcher;}}}

for ($index = 0; $index < $nbrProduitSurLaPage; $index++)
{
	$nouveauProduit = $produitDonnees[$leNumDuproduitAaficcher];
	$leNumDuproduitAaficcher++;
?>
                    <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                     <div class="block-4 text-center border">
                        <figure class="block-4-image">
                          <a href="index.php?page=produit&numproduit=<?php
	echo $nouveauProduit->NumProd; ?>"><img src="Vues/images/<?php
	if ($nouveauProduit->Image != null)
	{
		echo $nouveauProduit->Image;
	}
	else
	{
		echo "noimage.png";
	} ?>"class="img-fluid"></a>
                        </figure>
                        <div class="block-4-text p-4">
                          <h3><a href="index.php?page=produit&numproduit=<?php
	echo $nouveauProduit->NumProd; ?>"><?php
	echo $nouveauProduit->NomProd; ?></a></h3>
                          <p class="text-primary font-weight-bold"><?php
	echo $nouveauProduit->PrixProd; ?> €</p>
                        </div>
                     </div>
                  </div>
                  <?php
}

?>


            </div>

            <div class="row" data-aos="fade-up">
              <div class="col-md-12 text-center">
                <div class="site-block-27">
                  <ul>
                    <?php 
                    if(isset($_GET['categAffi']))
                    {
                    ?>
                    <li><a href="index.php?page=magasin&categAffi=<?php echo $_GET['categAffi']; ?>&numpage=1">&lt;</a></li>
                    <?php 
                    
                      if(isset($_GET['numpage']))
                    {
                      if($_GET['numpage'] == 1)
                      {
                        ?>
                          <li class="active"><a href="index.php?page=magasin&categAffi=<?php echo $_GET['categAffi']; ?>&numpage=1">1</a></li>
                        <?php
                      }
                      else
                      {
                        ?>
                        <li><a href="index.php?page=magasin&categAffi=<?php echo $_GET['categAffi']; ?>&numpage=1">1</a></li>
                      <?php
                      }
                    }
                    else
                    {
                      ?>
                          <li class="active"><a href="index.php?page=magasin&categAffi=<?php echo $_GET['categAffi']; ?>&numpage=1">1</a></li>
                        <?php
                    }
                    
                    $i = 0;
                    for($i = 0; $i < ((count($produitDonnees))/9) - 1; $i++)
                    {
                      if(isset($_GET['numpage']))
                      {
                      if($_GET['numpage'] == $i+2)
                      {
                    ?>
                    <li class="active"><a href="index.php?page=magasin&categAffi=<?php echo $_GET['categAffi']; ?>&numpage=<?php echo $i+2; ?>"><?php echo $i+2; ?></a></li>
                    <?php
                      }
                      else
                      {
                        ?>
                        <li><a href="index.php?page=magasin&categAffi=<?php echo $_GET['categAffi']; ?>&numpage=<?php echo $i+2; ?>"><?php echo $i+2; ?></a></li>
                        <?php
                      }
                      }
                      else
                      {
                        ?>
                        <li><a href="index.php?page=magasin&categAffi=<?php echo $_GET['categAffi']; ?>&numpage=<?php echo $i+2; ?>"><?php echo $i+2; ?></a></li>
                        <?php
                      }
                    }
                    ?>
                    <li><a href="index.php?page=magasin&categAffi=<?php echo $_GET['categAffi']; ?>&numpage=<?php echo $i+1; ?>">&gt;</a></li>
                    <?php

                    } 
                    else { ?>
                    <li><a href="index.php?page=magasin&numpage=1">&lt;</a></li>
                    <?php 
                    if(isset($_GET['numpage']))
                    {
                      if($_GET['numpage'] == 1)
                      {
                        ?>
                          <li class="active"><a href="index.php?page=magasin&numpage=1">1</a></li>
                        <?php
                      }
                      else
                      {
                        ?>
                        <li><a href="index.php?page=magasin&numpage=1">1</a></li>
                      <?php
                      }
                    }
                    else
                    {
                      ?>
                          <li class="active"><a href="index.php?page=magasin&numpage=1">1</a></li>
                        <?php
                    }
                    $i = 0;
                    for($i = 0; $i < ((count($produitDonnees))/9) - 1; $i++)
                    {
                      if(isset($_GET['numpage']))
                      {
                      if($_GET['numpage'] == $i+2)
                      {
                    ?>
                    <li class="active"><a href="index.php?page=magasin&numpage=<?php echo $i+2; ?>"><?php echo $i+2; ?></a></li>
                    <?php
                      }
                      else
                      {
                        ?>
                        <li><a href="index.php?page=magasin&numpage=<?php echo $i+2; ?>"><?php echo $i+2; ?></a></li>
                        <?php
                      }
                      }
                      else
                      {
                        ?>
                        <li><a href="index.php?page=magasin&numpage=<?php echo $i+2; ?>"><?php echo $i+2; ?></a></li>
                        <?php
                      }
                    }
                    ?>
                    <li><a href="index.php?page=magasin&numpage=<?php echo $i+1; ?>">&gt;</a></li>
                    <?php
                    }
                    ?>                    
                  </ul>
                </div>
              </div>
            </div>
          </div>

        </div>
        </div>
        
      </div>
    </div>

    <div class="site-section site-blocks-2">
            <div class="container">
                <div class="row justify-content-center text-center mb-5">
                  <div class="col-md-7 site-section-heading pt-4">
                    <h2>Categories populaire</h2>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
                    <a class="block-2-item" href="index.php?page=magasin&categAffi=1">
                      <figure class="image">
                        <img src="Vues/images/Tanto-noir-laque.jpg" alt="" class="img-fluid">
                      </figure>
                      <div class="text">
                        <h3>Tanto</h3>
                      </div>
                    </a>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
                    <a class="block-2-item" href="index.php?page=magasin&categAffi=7">
                      <figure class="image">
                        <img src="Vues/images/Katana-Practical-noir.jpg" alt="" class="img-fluid">
                      </figure>
                      <div class="text">
                        <h3>Katana</h3>
                      </div>
                    </a>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
                    <a class="block-2-item" href="index.php?page=magasin&categAffi=8">
                      <figure class="image">
                        <img src="Vues/images/Mannequin-en-bois-pivotant.jpg" alt="" class="img-fluid">
                      </figure>
                      <div class="text">
                        <h3>Autre</h3>
                      </div>
                    </a>
                  </div>

              
            </div>
            
    </div>
