<nav id="menu">
    <h2>Menu</h2>
    <ul>
    	<table style="margin: 0px;visibility: hidden;">
    		<tr>
                <?php if (isset($_SESSION['id']))
            {
                echo '<td width="70%" style="padding: 0px;"><li><a style="visibility: visible;" href="Controleur/deconnexion.php" class="button special small">Se-deconnecter</a></li></td>';
            }
            else
            {
            ?>
    			<td width="50%" style="padding: 0px;"><li><a style="visibility: visible;" href="index.php?page=login" class="button special small">Se-connecter</a></li></td>
    			<td width="50%"><li><a style="padding: 0px; visibility: visible;" href="index.php?page=signin" class="button special small">S'inscrire</a></li></td>
                <?php } ?>
    		</tr>
    	</table>
        <li><a href="index.php">Accueil</a></li>
    </ul>
</nav>