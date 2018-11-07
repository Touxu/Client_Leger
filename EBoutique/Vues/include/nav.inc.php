<?php
$lesCategs = GestionCategorie::GetLesCategories(0);
?>
<nav class="site-navigation text-right text-md-center" role="navigation">
   <div class="container">
      <ul class="site-menu js-clone-nav d-none d-md-block">
        
        <?php
        if (!isset($_GET['page'])) {
            ?>
                <li class="active"><a href="index.php">Accueil</a></li>
            <?php
        } else {
            ?>
         <li><a href="index.php">Accueil</a></li>
        <?php } ?>

         <li><a href="../siteBozendo/index.html">À propos</a></li>


         <?php
        if (isset($_GET['page']) && $_GET['page'] == "magasin") {
            ?>
                <li class="has-children active">
            <?php
        } else {
            ?>
        <li class="has-children">
        <?php } ?>
        <a href="index.php?page=magasin">Magasin</a>
            <ul class="dropdown">
            <?php
            foreach ($lesCategs as $laCateg)
            {
                ?>
                <li><a href="index.php?page=magasin&categAffi=<?php echo $laCateg->NumCategorie; ?>"><?php echo $laCateg->NomCategorie; ?></a></li>
                <?php
            }
            ?>
            </ul>
         </li>

      </ul>
   </div>
</nav>

