<h3> Vue hebdomadaire de l'activité de recherche de la promotion</h3></br>
<p>Les chiffres du tableau ci-dessous représentent le nombre de démarches réalisées dans le semaine correspondante.</p>
<p>Les V correspondent aux étudiants qui ont validé leur stage.</p>
<a class="boutonVue" href="controleur.php?action=action_afficherSuiviPromoMensuelResp" style="text-decoration: none;"><input type="button" value="Afficher la vue Mensuelle" /></a>

<h4>Détails par semaine : </h4>
<div id="checkbox_hebdoResp">
<input type="checkbox" id="checkbox" name="checkbox" onclick="action()">Afficher/masquer les stages validés
</div>

<div class="content_table">
    <table id="table_jquery" class="display">
        <thead>
            <tr>
                <th>Etudiant</th>
                <?php
                $connexion = connexionBase();
                $requete = "SELECT dateDebut,dateFin FROM promotion WHERE nom='DUT'";
                $requeteDates = $connexion->query($requete);
                $requeteDates->setFetchMode(PDO::FETCH_OBJ);
                $ligne = $requeteDates->fetch();
                $dateDebut = $ligne->dateDebut;
                $dateFin = $ligne->dateFin;

                $rangeD = dateRange($dateDebut, $dateFin, '+1 week', 'Y-m-d');
                $i = 0;
                $nbSemaines = 0;
                while ($rangeD[$i] != $dateFin) {
                    echo '<th>' . changedatefrTab($rangeD[$i]) . '</th>';
                    $i++;
                    $nbSemaines++;
                }
                ?>
            </tr>
        </thead>
        <?php
        $statut = 'DUT';
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
                    while ($rangeD[$i] != $dateFin) {
                        ?><td style="text-align:center;"> <?php
                $date1 = $rangeD[$i];
                $j = $i;
                $date2 = $rangeD[$i++];
                $requeteDem = "SELECT codeDem FROM demarche WHERE (loginEtud='$loginEtud') AND (date BETWEEN '$date1' AND '$date2')";
                $resultat = $connexion->query($requeteDem);
                $nb = $resultat->rowCount();
                $tabDemarche[$login][$j] = $nb;
                if ($nb == 0) {
                    echo " - ";
                } else {
                    echo $nb;
                }
                        ?></td><?php
                }
                    ?>  

                </tr>
                <?php
            }
            $_SESSION['tabDemarches'] = $tabDemarches;
            $_SESSION['dates'] = $rangeD;
             $_SESSION['etudSelectionne']=$_GET['login'];
            ?>

        </tbody>

    </table>
</div>
<?php
$_SESSION['nbSemaine'] = $nbSemaines;
?>