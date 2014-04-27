<h3> Vue par entreprise de l'activité de recherche </h3>
<h4>Détails des démarches : </h4>

<a class="boutonVue" href="controleur.php?action=action_afficherMonSuivi"><input type="button" value="Vue chronologique"></a>

<a class="boutonAjout" href="controleur.php?action=action_ajouterDemarche"><input type="button" value="Ajouter une nouvelle démarche"></a>

<?php
//connexion à la base
$connexion = connexionBase();
$login = $_SESSION['loginUtilisateur'];

// récupération des différents de entreprises
// récupération des entreprises
$requeteEnt = "SELECT DISTINCT codeEnt FROM demarche WHERE loginEtud='$login'";
$resultatsExistEntreprise = $connexion->query($requeteEnt);
$resultatsExistEntreprise->setFetchMode(PDO::FETCH_OBJ);

// sauvegarde des différentes entreprises
$i = 0;
while ($codeEnt = $resultatsExistEntreprise->fetch()) {
    $entreprise[$i] = $codeEnt->codeEnt;
    $entre = $entreprise[$i];
    $requeteDem = " SELECT codeDem FROM demarche WHERE (loginEtud='$login') AND (codeEnt='$entre') ORDER BY date DESC";
    $resultatsDemarche = $connexion->query($requeteDem);
    $resultatsDemarche->setFetchMode(PDO::FETCH_OBJ);
    $codeDem = $resultatsDemarche->fetch();
    $demarche[$i] = $codeDem->codeDem;
    $dem = $demarche[$i];
    $requete = "SELECT nomEnt,nomContact,prenom,entreprise.code,codeContact,date,forme,dateRelance,etat FROM entreprise,contact,demarche WHERE (codeDem='$dem') AND (demarche.codeEnt=entreprise.code) AND (demarche.codeContact=contact.code)";
    $resultats = $connexion->query($requete);
    $resultats->setFetchMode(PDO::FETCH_OBJ);
    $ligne = $resultats->fetch();
    $tabDonnees[$i]['nomEnt'] = $ligne->nomEnt;
    $tabDonnees[$i]['nomContact'] = $ligne->nomContact . " " . $ligne->prenom;
    $tabDonnees[$i]['code'] = $ligne->code;
    $tabDonnees[$i]['date'] = $ligne->date;
    $tabDonnees[$i]['forme'] = $ligne->forme;
    $tabDonnees[$i]['dateRelance'] = $ligne->dateRelance;
    $tabDonnees[$i]['etat'] = $ligne->etat;

    $i++;
}
$j = $i;
?>
<div class="content_table">
    <table id="table_jquery" class="display" >
        <thead>
            <tr>
                <th>Nom entreprise</th>
                <th>Nom contact</th>
                <th>Date démarche</th>
                <th style="text-align:center">Forme démarche</th>
                <th>Date relance</th>
                <th>Etat démarche</th>
                <th> Opérations </th>
            </tr>
        </thead>
        <tbody>

            <?php
            for ($i = 0; $i < $j; $i++) {
                $codeRecup = $tabDonnees[$i]['code'];
                ?>


                <tr>

                    <td><a href= "controleur.php?action=action_afficherDetailEntreprise&amp;code=<?php echo $codeRecup ?>" > <?php echo $tabDonnees[$i]['nomEnt'] ?></a></td>
                    <td> <?php echo utf8_encode($tabDonnees[$i]['nomContact']) ?></td>
                    <td> <div id="tabHeure"><?php echo strtotime($tabDonnees[$i]['date']) ?> </div> <?php echo changedateusfr($tabDonnees[$i]['date']) ?> </td>
                    <td style="text-align:center" > <img src="<?php
            $iconeFormat = $tabDonnees[$i]['forme'];
            echo imageFormatDemarche($iconeFormat)
            ?>" alt="format demarche"  style="width:12%;"/></td>
                    <td><div id="tabHeure"><?php echo strtotime($tabDonnees[$i]['dateRelance']) ?> </div><?php echo changedateusfr($tabDonnees[$i]['dateRelance']) ?></td>
                    <td><?php echo $tabDonnees[$i]['etat'] ?></td>
                    <td style="text-align:right; "><a href="controleur.php?action=action_suppressionDemarcheEntrepriseEtudiant&amp;code=<?php echo $codeRecup ?>" title="Supprimer entreprise" onclick="if(!confirm('La suppression est définitive.\nEtes-vous sûr de vouloir supprimer cette démarche?')) return false;" ><img style=" width:12%;" src="./images/corb.png"></a></td>


                    <?php
                }

                $_SESSION['code'] = $_GET['code'];
                ?>

            </tr>


        </tbody>

    </table>
</div>			