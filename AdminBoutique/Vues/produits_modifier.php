<?php
include("modele/GestionCategorie.class.php"); // c'est le fichier qui contient les fonctions de gestion des données

$lesCategs = GestionCategorie::GetLesCategories(0);
?>
<div id="contenu">

    <table border="1" cellpadding="2" cellspacing="0">
	<tr>
		<th width="10%">Numéro Produits</th>
		<th width="20%">Libellé Produit</th>
		<th width="10%">Prix</th>
		<th width="15%">Numéro Catégorie</th>
        <th>L'Image du Produit</th>
	</tr>

    <tr>
        <?php
        echo "<form ENCTYPE='multipart/form-data' name='monform' method='POST' action='Controleur/actionProduit.php'>";
        echo "<td><input disabled type='text' value='" . $nouveauProduit->NumProd . "'/></td>";
        echo "<td><input class='zone_texte' type='text' name='libelle' size='100' value='" . $nouveauProduit->NomProd . "'/></td>";
        echo "<td><input type='text' name='solde' value='" . $nouveauProduit->PrixProd . "'/></td>";
        ?>
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
        <td align="center">
            <img src="../eBoutique/Vues/images/<?php echo $nouveauProduit->Image; ?>" style="max-width: 8em; height: auto;">
            <input type="file" name="mon_fichier">
        </td>
    </tr>
    <tr>
            <th>Description:</th>
            <td colspan="4"> <textarea name="laDescription"><?php echo $nouveauProduit->DescProd; ?></textarea></td>
        </tr>

    </table>
    <input type='hidden' name='action' value='2'/>
    <input type='hidden' name='num' value='<?php echo $nouveauProduit->NumProd ?>'/>
    <p> <br /> <input type='submit' value='Modifier' /></p> </form>
</div>
