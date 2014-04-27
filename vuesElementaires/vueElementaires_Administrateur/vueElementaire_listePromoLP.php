<a style="text-decoration: none;" href="controleur.php?action=action_afficherPromoAdmin"><input type="button" value="Retour au formulaire des promotions"></a>

<h4>Ajouter un étudiant </h4>
<form id="AjoutEtud" method=post action="controleur.php?action=action_enregistrerEtudiantLP">
    <tr>
        <td>Login</td>
        <td>
            <p><input type="text" id="loginNouveauLP" name="loginNouveauLP" /></p>
        </td>
    </tr>
    <tr>
        <td>Nom</td>
        <td>
            <p><input type="text" id="nomNouveauLP" name="nomNouveauLP" /></p>
        </td>
    </tr>
    <tr>
        <td>Prenom</td>
        <td>
            <p><input type="text" id="prenomNouveauLP" name="prenomNouveauLP" /></p>
        </td>
    </tr>
    <tr>
        <td>
            <p><input type="submit" value="Enregistrer"></p>
        </td>
    </tr>
</form>


<h4> Liste des étudiants de LP SIL : </h4>
<div class='content_table'>
    <table id='table_jquery' class='display'>
        <thead>
            <tr>
        <th><div id="Dem" style="width:2%;">d</div></th>
        <th>login</th>
        <th>Nom</th>
        <th>Prenom</th>  
        <th>Démissionnaire</th>

        </tr>
        </thead>
        <?php
        // Connexion BD
        $connexion = connexionBase();

        // Requete de sélection avec PDO
        $requeteLP = "SELECT login,nom,prenom,demissionnaire FROM etudiant WHERE nomProm='LP'";

        $resultats = $connexion->query($requeteLP);


        $resultats->setFetchMode(PDO::FETCH_OBJ);

        // Remplissage Tableau via les résultats de la requete
        while ($ligne = $resultats->fetch()) {
            $tabDonnees['login'] = $ligne->login;
            $tabDonnees['nom'] = $ligne->nom;
            $tabDonnees['prenom'] = $ligne->prenom;
            $tabDonnees['demissionnaire'] = $ligne->demissionnaire;
            ?>
            <tr>
                <!-- affichage du nom contact -->
                <td><?php if ($tabDonnees['demissionnaire'] == 1) echo '<img src="' .imageFormatDemarche('demission'). '" title="demissionnaire" width="18%;"/>';else echo' '; ?> </td>
                <!-- affichage du nom contact -->
                <td><?php echo $tabDonnees['login']; ?> </td>
                <!-- affichage du type de contact -->
                <td><?php echo $tabDonnees['nom']; ?> </td>
                <!-- affichage du type de contact -->
                <td><?php echo $tabDonnees['prenom']; ?> </td>
                <!-- affichage du type de contact -->
                <td><a href="controleur.php?action=action_definirCommeDemissionnaire&amp;login=<?php echo $tabDonnees['login']; ?>">Demissionaire</a></td>
            </tr>

        <?php } ?>
        </tbody>
    </table>
</div>
<?php
$_SESSION['promotionModifiee'] = 'LP';
?>