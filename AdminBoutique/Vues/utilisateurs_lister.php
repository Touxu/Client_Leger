<h1>Liste des utilisateurs</h1>
<table>
    <tr>
        <th>Id Utilisateur</th>
        <th>Prénom</th>
        <th>Mot de passe (crypté)</th>
        <th>Email</th>
        <th>Est Admin?</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>
    <?php
    for ($index = 0; $index < count($UtilisateursDonnees); $index++) {
        $nouveauUtilisateur = $UtilisateursDonnees[$index];
        ?>
        <tr>
            <td width="12.5%"><?php echo $nouveauUtilisateur->IdUtilisateur; ?></td>
            <td width="25%"><?php echo $nouveauUtilisateur->LoginUtilisateur; ?></td>
            <td width="12.5%"><?php echo $nouveauUtilisateur->MdpUtilisateur; ?></td>
            <td width="12.5%"><?php echo $nouveauUtilisateur->EmailUtilisateur  ; ?></td>
            <td width="12.5%"><?php echo $nouveauUtilisateur->Admin; ?></td>
            <td width="12.5%"><div align='center'><a href='index.php?page=utilisateurs_modifier&num=<?php echo $nouveauUtilisateur->IdUtilisateur; ?>'><img style="width:15%;" src='vues/images/modifier.png'/></a></div></td>
            <td width="12.5%"><div align='center'><a href='./Controleur/actionUtilisateur.php?num=<?php echo $nouveauUtilisateur->IdUtilisateur; ?>&action=3'><img style="width:15%;" src='vues/images/supprimer.png'/></a></div></td>
        </tr>
    <?php } ?>
</table><br />
