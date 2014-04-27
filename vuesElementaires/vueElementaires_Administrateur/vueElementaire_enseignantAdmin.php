<h2>Gestion des enseignants </h2>
<h4 style="margin-left: 10%;"> Ajouter un enseignant : </h4>
<!-- Formulaire d'Ajout d'un enseignant -->
<div id="formAjoutEns">
    <form ENCTYPE="multipart/form-data" action="controleur.php?action=action_ajouterEnsAdmin" METHOD="POST">
        <tr colspan="2">
        <tr>
            <td>Login</td>
            <td>
                <input type=text name="logEns">
            </td>
        </tr>
        </br> </br>
        <tr>
            <td>Nom</td>
            <td>
                <input type=text name="nomEns">
            </td>
        </tr>
        </br> </br>
        <tr>
            <td>Prénom</td>
            <td>
                <input type=text name="prenomEns">
            </td>
        </tr>
        </br> </br>

        <tr>    
            <td>
                <input type="submit" value="Enregistrer">
            </td>
        </tr>
    </form>
</div>

<!-- Formulaire Changement Administrateur -->
<div id="formChoixAdmin">
    <form method=post action="controleur.php?action=action_enregistrerNouvelAdmin"> </br>
        <h4>Selectionnez le nouvel administrateur :</h4>
        <tr>
            <td>
                <select id="selectionAdmin" name="selectionAdmin">
                    <?php RemplirListeAdmin() ?>
                </select>
        <tr>
            <td>
                <input type="submit" onclick="if(!confirm('Le changement d\'administrateur est irréversible et vous déconnectera.\nVous perdrez tous ses droits.\nEtes-vous sur de vouloir continuer?')) return false;"  value="enregistrer">
            </td>
        </tr>
    </form>
</div>
</br>


<!--  Affichage des enseignants présents dans la BD  -->
<h4 style="position:absolute;top:48%;margin-left: 10%;"> Tableau des enseignants : </h4>
<div id="tabEns">
<div class="content_table">
    <table id="table_jquery" class="display">
        <thead>
            <tr>
                <th>Login</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th style="width: 5%;">Opération</th>
            </tr>
        </thead>
        <?php
        // Connexion BD

        $connexion = connexionBase();

        // Requete de sélection avec PDO
        $requete = "SELECT login, nom, prenom FROM enseignant;";

        $resultats = $connexion->query($requete);

        $resultats->setFetchMode(PDO::FETCH_OBJ);
        ?>
        <tbody>
            <?php
            while ($ligne = $resultats->fetch()) {
                $log = $ligne->login;
                $tabDonnees['nom'] = $ligne->nom;
                $tabDonnees['prenom'] = $ligne->prenom;
                ?>


                <tr>

                    <!-- affichage du login -->
                    <td><?php echo $log; ?> </td>
                    <!-- affichage du nom  -->
                    <td><?php echo $tabDonnees['nom']; ?> </td>
                    <!-- affichage du prenom -->
                    <td><?php echo $tabDonnees['prenom']; ?> </td>
                    <td style="text-align:right; "> <a href="controleur.php?action=action_supprimerEnseignantAdmin&amp;login=<?php echo $log ?>" title="Supprimer enseignant" onclick="if(!confirm('La suppression est définitive.\n Etes-vous sûr de vouloir supprimer cet enseignant?')) return false;" ><img src="./images/corb.png"style="width:35%;" /></a></td>
                </tr>
            <?php }
            $log=$_GET['login'];
            $_SESSION['logEns']=$log;
            ?>


        </tbody>

    </table>
</div>
    </div>