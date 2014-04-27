
<?php
function affichageEntAdmin(){
        // Connexion BD
        $connexion = connexionBase();

        // Requete de sélection avec PDO
        $requete = "SELECT code,nomEnt, adresse, codePostal, ville, pays FROM entreprise;";
        $resultats = $connexion->query($requete);
        $resultats->setFetchMode(PDO::FETCH_OBJ);
        
        // Remplissage Tableau via les résultats de la requete
        while ($ligne = $resultats->fetch()) {
            $codeE = $ligne->code;
            $tabDonnees['nomEnt'] = $ligne->nomEnt;
            $tabDonnees['adresse'] = $ligne->adresse;
            $tabDonnees['codePostal'] = $ligne->codePostal;
            $tabDonnees['ville'] = $ligne->ville;
            $tabDonnees['pays'] = $ligne->pays;
            ?>
            <tr>
                <!-- affichage du nom contact -->
                <td><?php echo utf8_encode ($tabDonnees['nomEnt']); ?> </td>
                <!-- affichage du type de contact -->
                <td><?php echo utf8_encode ($tabDonnees['adresse']); ?> </td>
                <!-- affichage du type de contact -->
                <td><?php echo $tabDonnees['codePostal']; ?> </td>
                <!-- affichage du type de contact -->
                <td><?php echo utf8_encode ($tabDonnees['ville']); ?> </td>						
                <!-- affichage du type de contact -->						
                <td><?php echo utf8_encode ($tabDonnees['pays']); ?> </td>
                <td style="text-align:right; "><a href="controleur.php?action=action_modifierEntAdmin&amp;code=<?php echo$codeE ?>" title="Modifier entreprise" > <img style=" width:20%;" src="./images/modif.png"></a>  <a href="controleur.php?action=action_supprimerEntAdmin&amp;code='<?php echo$codeE ?>'" title="Supprimer entreprise" onclick="if(!confirm('La suppression est définitive.\n Etes-vous sûr de vouloir supprimer cette entreprise?')) return false;"> <img style=" width:20%;" src="./images/corb.png"></a></td>

            </tr>

            <?php
        }
}
        ?>
