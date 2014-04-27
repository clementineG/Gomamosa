<h3> Vue mensuelle de l'activité de recherche de la promotion</h3></br>
<p>Les chiffres du tableau ci-dessous représentent le nombre de démarches réalisées dans le mois correspondant.</p>
<p>Les V correspondent aux étudiants qui ont validé leur stage.</p>
<a class="boutonVue" href="controleur.php?action=action_afficherSuiviPromoHebdoResp" style="text-decoration: none;"><input type="button" value="Afficher la vue hebdomadaire" /></a>

<h4>Détails par mois : </h4>

<div class="content_table">
    <table id="table_jquery" class="display">
        <thead>
            <tr>
                <th>Etudiant</th>

                <?php
                $connexion = connexionBase();
                $statut = 'DUT';
                $requete = "SELECT dateDebut,dateFin FROM promotion WHERE nom='$statut'";
                $requeteDates = $connexion->query($requete);
                $requeteDates->setFetchMode(PDO::FETCH_OBJ);
                $ligne = $requeteDates->fetch();
                $dateDebut = $ligne->dateDebut;
                $dateFin = $ligne->dateFin;

                // dates en francais
                $dateDeb = changedateusfr($dateDebut);
                $dateF = changedateusfr($dateFin);
                //Définition des lundis               
                $dateDeb = lundiCorrespondantFr($dateDeb);
                $dateF = lundiCorrespondantFr($dateF);

                $rangeD = dateRange($dateDeb, $dateF, '+30 days', 'Y-m-d');
                $i = 0;

                //remplissage de l'entete du tableau
                do {
                    $m = moisDepuisDate(date($rangeD[$i]));

                    echo '<th>' . $m . '</th>';
                    $i++;
                } while ($rangeD[$i] != null);
                ?>
            </tr>

        </thead>
        <?php
        // Requete de sélection avec PDO
        $requeteEtud = "SELECT login,nom,prenom FROM etudiant WHERE (nomProm='$statut')";

        $resultats = $connexion->query($requeteEtud);

        $resultats->setFetchMode(PDO::FETCH_OBJ);
        ?>
        <tbody>
            <?php
            while ($ligne = $resultats->fetch()) {

                $loginEtud = $ligne->login;
                $nomEt = $ligne->nom;
                $prenomEtud = $ligne->prenom;
                ?>

                <tr>
                    <!-- affichage du login -->
                    <td><a href="controleur.php?action=action_afficherSuiviUnEtudiantResp&amp;login=<?php echo $ligne->login ?>" style="color:grey;"><?php echo $nomEt . ' ' . $prenomEtud; ?></a></td>
                    <!-- affichage des démarches  -->
                    <?php
                    $i = 0;
                    do {
                        $m = moisDepuisDate(date($rangeD[$i]));
                        $date1 = $rangeD[$i];
                        $date2 = $rangeD[$i++];
                        $requeteMois = "SELECT codeDem FROM demarche WHERE (loginEtud='$loginEtud') AND (date BETWEEN '$date1' AND '$date2')";
                        $resultat = $connexion->query($requeteMois);


                        $nb = $resultat->rowCount();
                        $tabDemarche[$login][$j] = $nb;
                        if ($nb == 0) {
                            echo '<th> - </th>';
                        } else {
                            echo '<th> ' .$nb. '</th>';
                        }
                    } while ($rangeD[$i] != null);
                    ?>  

                </tr>
                <?php } 
                $_SESSION['etudSelectionne']=$_GET['login'];
                ?>

        </tbody>

    </table>
</div>