<h3> Vue chronologique de l'activité de recherche </h3>
<h4>Détails des démarches : </h4>


<a class="boutonVue" href="controleur.php?action=action_afficherVueEntrepriseEtud"><input type="button" value="Vue par entreprise"></a>
<a class="boutonAjout" href="controleur.php?action=action_afficherFormAjout"><input type="button" value="Ajouter une nouvelle démarche"></a>


<div class="content_table">
    <table id="table_jquery" class="display" >
        <thead>
            <tr>
                <th>Date démarche</th>
                <th>Nom entreprise</th>
                <th>Nom contact</th>
                <th>Forme démarche</th>
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
            $requete = "SELECT date,nomEnt,nomContact,forme,dateRelance,etudiant.login,etat,codeDem,codeEnt,entreprise.code,contact.code,demarche.codeContact,contact.prenom AS prenomC FROM contact,entreprise,demarche,etudiant WHERE (contact.code=demarche.codeContact) AND (entreprise.code=demarche.codeEnt) AND (etudiant.login=demarche.loginEtud) AND (login='$loginUtilisateur')";
            $resultats = $connexion->query($requete);

            $resultats->setFetchMode(PDO::FETCH_OBJ);

            while ($ligne = $resultats->fetch()) {
                $codeDem = $ligne->codeDem;
                $codeEnt = $ligne->codeEnt;
                $tabDonnees['date'] = $ligne->date;
                $tabDonnees['nomEnt'] = $ligne->nomEnt;
                $tabDonnees['nomContact'] = $ligne->nomContact;
                $tabDonnees['prenomC'] = $ligne->prenomC;
                $tabDonnees['forme'] = $ligne->forme;
                $tabDonnees['dateRelance'] = $ligne->dateRelance;
                $tabDonnees['etat'] = $ligne->etat;
                ?> 


                <tr>
                    <td><div id="tabHeure"><?php echo strtotime($tabDonnees['date'])?> </div><?php echo changedateusfr($tabDonnees['date']); ?> </td>
                    <td><a href="controleur.php?action=action_afficherDetailEntreprise&amp;code=<?php echo $codeEnt ?>"><?php echo $tabDonnees['nomEnt']; ?></a></td>
                    <td> <?php echo utf8_encode ($tabDonnees['nomContact']).' '.utf8_encode ($tabDonnees['prenomC']); ?></td>
                    <?php $img = $tabDonnees['forme']; ?>
                    <td style="text-align: center;"> <img src="<?php echo imageFormatDemarche($img); ?>" title="<?php echo $tabDonnees['forme']; ?>" style="width:12%;"/></td>
                    <td><div id="tabHeure"><?php echo strtotime($tabDonnees['dateRelance'] )?> </div>
                        <?php if($tabDonnees['dateRelance']=='0000-00-00'){echo '-';} else { echo changedateusfr($tabDonnees['dateRelance']); }?>
                    </td>
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

</br>
<h4>Commentaires : </h4>

<div id="tabComment">
    <?php
// Récupération commentaires
    $loginEt = $_SESSION['loginUtilisateur'];

    $reqIdEtud = "SELECT * FROM commenter WHERE loginEtud='$loginEt' ORDER BY dateHeure DESC";
    $resultats = $connexion->query($reqIdEtud);
    $resultats->setFetchMode(PDO::FETCH_OBJ);
 
//Affichage des commentaires
    while ($ligne = $resultats->fetch()) {
        $codeCom = $ligne->code;
        $commentaire = $ligne->commentaire;
        $dateHeure = $ligne->dateHeure;
        $loginResp = $ligne->loginResp;
        $loginEtud = $ligne->loginEtud;
        
        echo '<HR id="sep1" size=2 align=center width="100%">
            <span>De: '.$loginResp .'</span> le '.changedateusfr($dateHeure).' 
            <p>Message : <i>'. utf8_encode($commentaire).'</i></p>';
    }
    ?>
</div>