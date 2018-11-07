
<div id="contenu">

    <table border="1" cellpadding="2" cellspacing="0">
	<tr>
		<th>Numéro Catégorie</th>
		<th>Libellé Catégorie</th>
	</tr>
        <?php
        echo "<form name='monform' method='GET' action='Controleur/actionCategorie.php'>";
        echo "<td><input disabled type='text' name='numC' value='" . $nouveauCategorie->NumCategorie . "'/></td>";
        echo "<td><input class='zone_texte' type='text' name='nomC' size='100' value='" . $nouveauCategorie->NomCategorie . "'/></td>";
        ?>

    </table>
    <input type='hidden' name='action' value='2'/>
    <input type='hidden' name='numC' value='<?php echo $nouveauCategorie->NumCategorie ?>'/>
    <p> <br /> <input type='submit' value='Modifier' /></p> </form>
</div>
