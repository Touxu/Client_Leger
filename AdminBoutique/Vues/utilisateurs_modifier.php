
<div id="contenu">

    <table border="1" cellpadding="2" cellspacing="0">
	<tr>
		<th width="13%">id utilisateurs</th>
		<th width="17%">Login</th>
		<th width="35%">Mot de passe</th>
		<th width="25%">Email</th>
        <th width="10%">Est Admin?</th>
	</tr>
        <?php
        echo "<form name='monform' method='GET' action='Controleur/actionUtilisateur.php'>";
        echo "<td><input disabled type='text' value='" . $nouveauUtilisateur->IdUtilisateur . "'/></td>";
        echo "<td><input class='zone_texte' type='text' name='login' size='100' value='" . $nouveauUtilisateur->LoginUtilisateur . "'/></td>";
        echo "<td><input type='text' name='mdp' value=''/></td>";
        echo "<td><input type='text' name='email' value='" . $nouveauUtilisateur->EmailUtilisateur . "'/></td>";
         echo "<td><input type='text' name='admin' value='" . $nouveauUtilisateur->Admin . "'/></td>";
        ?>

    </table>
    <input type='hidden' name='action' value='2'/>
    <input type='hidden' name='num' value='<?php echo $nouveauUtilisateur->IdUtilisateur ?>'/>
    <input type='hidden' name='mdpCrypt' value='<?php echo $nouveauUtilisateur->MdpUtilisateur ?>'/>
    <p> <br /> <input type='submit' value='Modifier' /></p> </form>
</div>
