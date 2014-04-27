
<?php
// Récupération id étudiant sélectionné
$loginEt=$_GET['login'];
$connexion = connexionBase();
$reqId = "SELECT nom,prenom AS prenomEt FROM etudiant WHERE login='$loginEt'";
$resultats = $connexion->query($reqId);
$resultats->setFetchMode(PDO::FETCH_OBJ);
$ligne = $resultats->fetch();
$nomEtud = $ligne->nom;
$prenomEtud = $ligne->prenomEt;
?>
<h2> <?php echo $prenomEtud . ' ' . strtoupper($nomEtud); ?> </h2></br>
<a class="boutonRetPromo" href="controleur.php?action=action_afficherSuiviPromoHebdoResp" style="text-decoration: none;"><input type="button" value="Retour au suivi de la promotion" /></a>
<h4>Courbe de l'activité de recherche : </h4>
<?php echo'<img src="jpgraph-3.5.0b1/graphEtud.php"  alt="GraphEtudiant" style="padding-left:23%;" />'; ?>

<h4>Détails des démarches (Vue chronologique) : </h4>

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
                <th>Changer Statut</th>
            </tr>
        </thead>
        <tbody> 
            <?php
            //Récupération du login utilisateur
            $loginUtilisateur = $_SESSION['etudiantSelect'];
            // Connexion BD

            $requete = "SELECT date,nomContact,nomEnt,forme,dateRelance,etat,contact.prenom AS prenomC FROM contact,entreprise,demarche,etudiant WHERE (demarche.loginEtud='$loginEt') AND (contact.code=demarche.codeContact) AND (entreprise.code=demarche.codeEnt) AND (etudiant.login=demarche.loginEtud)";

            $result = $connexion->query($requete);

            $result->setFetchMode(PDO::FETCH_OBJ);

            while ($ligne = $result->fetch()) {
                $tabDonnees['date'] = $ligne->date;
                $tabDonnees['nomEnt'] = $ligne->nomEnt;
                $tabDonnees['nomContact'] = $ligne->nomContact;
                $tabDonnees['prenomC'] = $ligne->prenomC;
                $tabDonnees['forme'] = $ligne->forme;
                $tabDonnees['dateRelance'] = $ligne->dateRelance;
                $tabDonnees['etat'] = $ligne->etat;
                ?> 


                <tr>
                    <td><div id="tabHeure"><?php echo strtotime($tabDonnees['date'] )?> </div> <?php echo changedateusfr($tabDonnees['date']); ?> </td>
                    <td><?php echo $tabDonnees['nomEnt']; ?></td>
                    <td> <?php echo utf8_encode($tabDonnees['prenomC']).' '.$tabDonnees['nomContact']; ?></td>
                    <?php $img = $tabDonnees['forme']; ?>
                    <td style="text-align: center;"> <img src="<?php echo imageFormatDemarche($img); ?>" style="width:10%;"/></td>
                    <td><div id="tabHeure"><?php echo strtotime($tabDonnees['dateRelance'])?> </div><?php echo changedateusfr($tabDonnees['dateRelance']); ?></td>
                    <td><?php echo $tabDonnees['etat']; ?></td>
                    <td><a href="controleur.php?action=action_changerEtatValidation" >Valider</a></td>
                </tr>

                <?php
            }
            ?>



        </tbody>

    </table>
</div>



</br>
<h4>Commentaires : </h4>

<div id="tabComment">
    <?php
// Récupération commentaires
    $loginEt = $_GET['login'];

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
<form id="formCom" method=post action="controleur.php?action=action_enregistrerCommentaire&amp;login=<?php echo $loginEt; ?>">
    <label>Faites un commentaire:</label></br>
    <textarea name="comment" rows="5" cols="60"></textarea></br>
    <input type="submit" value="Enregistrer commentaire" />
</form> </br>

<?php
 $_SESSION['loginEt']=$loginEt;

 ?>
