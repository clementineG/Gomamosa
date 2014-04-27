<a style="text-decoration: none;" href="controleur.php?action=action_afficherPromoAdmin"><input type="button" value="Retour au formulaire des promotions"></a>

<form id="AjoutEtud" method=post action="controleur.php?action=action_enregistrerEtudiantDU">
    <tr>
        <td>Login</td>
        <td>
            <p><input type="text" id="loginNouveauDU" name="loginNouveauDU" /></p>
        </td>
    </tr>
    <tr>
        <td>Nom</td>
        <td>
            <p><input type="text" id="nomNouveauDU" name="nomNouveauDU" /></p>
        </td>
    </tr>
    <tr>
        <td>Prenom</td>
        <td>
            <p><input type="text" id="prenomNouveauDU" name="prenomNouveauDU" /></p>
        </td>
    </tr>
    <tr>
        <td>
            <p><input type="submit" value="Enregistrer"></p>
        </td>
    </tr>
</form>
<h4> Liste des étudiants de DU TIC : </h4>
<div class='content_table'>
    <table id='table_jquery' class='display'>
        <thead>
            <tr>
                <th><div id="Dem" style="width:2%;">d</div></th>
        <th>Login</th>
        <th>Nom</th>
        <th>Prénom</th>    
        <th>Démissionnaire</th>               
        </tr>
        </thead>
        <?php
        // Connexion BD
        $connexion = connexionBase();

        // Requete de sélection avec PDO
        $requeteDU = "SELECT login,nom,prenom,demissionnaire FROM etudiant WHERE nomProm='DU'";

        $resultats = $connexion->query($requeteDU);

        $resultats->setFetchMode(PDO::FETCH_OBJ);

        // Remplissage Tableau via les résultats de la requete
        while ($ligne = $resultats->fetch()) {
            $tabDonnees['login'] = $ligne->login;
            $tabDonnees['nom'] = $ligne->nom;
            $tabDonnees['prenom'] = $ligne->prenom;
            $tabDonnees['demissionnaire'] = $ligne->demissionnaire;
            ?>
            <tr>
                <td><?php if ($tabDonnees['demissionnaire'] == 1) echo '<img src="' . imageFormatDemarche('demission') . '" title="demissionnaire" width="18%;"/>';else echo' '; ?> </td>
                <!-- affichage du nom contact -->
                <td><?php echo $tabDonnees['login']; ?> </td>
                <!-- affichage du type de contact -->
                <td><?php echo $tabDonnees['nom']; ?> </td>
                <!-- affichage du type de contact -->
                <td><?php echo $tabDonnees['prenom']; ?> </td>
                <td><a href="controleur.php?action=action_definirCommeDemissionnaire&amp;login=<?php echo $tabDonnees['login']; ?>">Demissionaire</a></td>

            </tr>

        <?php } ?>
        </tbody>
    </table>
</div>

<?php
$_SESSION['promotionModifiee'] = 'DU';
?>