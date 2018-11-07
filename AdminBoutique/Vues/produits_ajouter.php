<?php
include("modele/GestionCategorie.class.php"); // c'est le fichier qui contient les fonctions de gestion des données

$lesCategs = GestionCategorie::GetLesCategories(0);
?>
<div id="contenu">

    <table border="1" cellpadding="2" cellspacing="0">
        <tr>
            <th>Libellé Produit</th>
            <th>Prix</th>
            <th>Numéro Catégorie</th>
            <th>L'Image du Produit</th>
        </tr>

        <form ENCTYPE="multipart/form-data" name='monform' method='POST' action='controleur/actionProduit.php'>

        <tr>
        <td><input class="zone_texte" type='text' name='libelle' value=''/></td>
        <td><input type='text' name='prix' value=''/></td>
        <td>
            <select name="categ"/>
            <?php
            foreach ($lesCategs as $laCateg)
            {
                ?>
                <option value="<?php echo $laCateg->NumCategorie; ?>"><?php echo $laCateg->NomCategorie; ?></option>
                <?php
            }
            ?>

            </select>
        </td>
        <td>
            <input type="file" name="mon_fichier">
        </td>

        </tr>

        <tr>
            <th>Description:</th>
            <td colspan="3"> <textarea name="laDescription"></textarea></td>
        </tr>


    </table>
    <input type='hidden' name='action' value='1'/>
    <br /><p class="centrer"><input class="btn" type="submit" value="Ajouter"/></p>
</form>
</div>
