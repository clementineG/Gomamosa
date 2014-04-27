<?php
$codeEnt = $_GET['code'];
$connexion = connexionBase();

// -------------------------------------------------------
// Ex�cuter l'action
// -------------------------------------------------------
$reqSelect = "SELECT * FROM entreprise WHERE code='$codeEnt'";
$resultats = $connexion->query($reqSelect);

$resultats->setFetchMode(PDO::FETCH_OBJ);

$ligne = $resultats->fetch();
$nomEnt = $ligne->nomEnt;
$adresse = $ligne->adresse;
$cp = $ligne->codePostal;
$ville = $ligne->ville;
$pays = $ligne->pays;

$connexion = null;
?>


<h3> Historique de l'entreprise <span style="color:red;font-style: oblique;"><?php echo utf8_decode ($nomEnt) ?></span> </h3>

<a class="boutonRetVueEnt" href="controleur.php?action=action_afficherVueEntrepriseEtud"><input type="button" value="Retour  vue par entreprise" /></a>



<div id="infosEntreprise">
    <h4> Information relatives à l'entreprise </h4>
    <?php
    echo '<p><b>Nom : </b>' . $nomEnt . '</p>';
    echo '<p><b>Adresse : </b>' . $adresse . '</p>';
    echo '<p><b>CP :</b> ' . $cp . '</p>';
    echo '<p><b>Ville :</b> ' . $ville . '</p>';
    echo '<p><b>Pays :</b> ' . $pays . '</p>';
    ?>
</div>





<div class="content_table">
    <table id="table_jquery" class="display" >
        <thead>
            <tr>
                <th>Date démarche</th>
                <th>Forme démarche</th>
                <th>Nom contact</th>
                <th>Date relance</th>
                <th>Etat démarche</th>
                <th>Opérations</th>
            </tr>
        </thead>
        <tbody> 
            <?php
            //Récupération du login utilisateur
            $loginUtilisateur = $_SESSION['loginUtilisateur'];
            // Connexion BD
            // Parametres de connexion a la base de donnees

            $connexion = connexionBase();

            // Requete de sélection avec PDO
            $requete = "SELECT date,forme,contact.prenom AS prenomC,nomContact,dateRelance,etat,contact.code,entreprise.code,codeEnt, etudiant.login, demarche.loginEtud,login FROM contact,entreprise,demarche,etudiant WHERE (contact.code=demarche.codeContact) AND (entreprise.code=demarche.codeEnt) AND (etudiant.login=demarche.loginEtud) AND (login='$loginUtilisateur') AND (entreprise.code='$codeEnt')";
            $resultats = $connexion->query($requete);

            $resultats->setFetchMode(PDO::FETCH_OBJ);

            while ($ligne = $resultats->fetch()) {
                $codeDem = $ligne->codeDem;
                $tabDonnees['date'] = $ligne->date;
                $tabDonnees['forme'] = $ligne->forme;
                $tabDonnees['prenom'] = $ligne->prenomC;
                $tabDonnees['nomContact'] = $ligne->nomContact;
                $tabDonnees['dateRelance'] = $ligne->dateRelance;
                $tabDonnees['etat'] = $ligne->etat;
                
                ?> 


                <tr>
                    <td> <?php echo changedateusfr($tabDonnees['date']); ?> </td>
                    <?php $img = $tabDonnees['forme']; ?>
                    <td style="text-align: center;"> <img src="<?php echo imageFormatDemarche($img); ?>" title="<?php echo $tabDonnees['forme']; ?>" style="width:12%;"/></td>
                    <td> <?php echo $tabDonnees['prenom'].' '.$tabDonnees['nomContact']; ?></td>
                    <td><?php echo changedateusfr($tabDonnees['dateRelance']); ?></td>
                    <td><?php echo $tabDonnees['etat']; ?></td>
                    <td style="text-align:right; "><?php echo'<a href="controleur.php?action=action_modifierDemarcheEtudiant&amp;codeDem=' . $codeDem . '" title="Modifier démarche" >' ?> <img style=" width:15%;" src="./images/modif.png"></a> <a href="controleur.php?action=action_suppressionDemarcheEtudiant&amp;codeDem=<?php echo $codeDem ?>" title="Supprimer démarche" onclick="if(!confirm('La suppression est définitive.\n Etes-vous sûr de vouloir supprimer cette démarche?')) return false;" > <img style=" width:15%;" src="./images/corb.png"></a></td>

                </tr>

                <?php
            }
            $codeDem = $_GET['codeDem'];
            $_SESSION['codeDem'] = $codeDem;
            ?>



        </tbody>

    </table>
</div>
