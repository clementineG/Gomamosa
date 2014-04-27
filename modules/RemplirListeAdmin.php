<?php

function RemplirListeAdmin() {
    // connexion BD
    $connexion = connexionBase();

    // Requete de sélection avec PDO
    //Construction de la requète
    $requete = "SELECT login,nom,prenom FROM enseignant;";
    $requeteAdmin = "SELECT `login`, `nom`, `prenom` FROM `enseignant` WHERE `administrateur`= '1'";
    // Application de la requete sur la base de bonnées
    $resultats = $connexion->query($requete);

    $admin = $connexion->query($requeteAdmin);
    $admin->setFetchMode(PDO::FETCH_OBJ);
    $adminCourant = $admin->fetchAll();

    // Passage des résultats en FetchMode
    $resultats->setFetchMode(PDO::FETCH_OBJ);


    // PAr defaut -> Admin actuel
    foreach ($adminCourant as $adminAct)
        echo '<option value="' . $adminAct->login . '">' . $adminAct->prenom . ' ' . $adminAct->nom . '</option>';
    //Remplissage liste courante    
    while ($ligne = $resultats->fetch()) {
        // récupération des identifiants à mettre dans la liste déroulante
        $tabDonnees['login'] = $ligne->login;
        $tabDonnees['nom'] = $ligne->nom;
        $tabDonnees['prenom'] = $ligne->prenom;
        // Affichage des autres enseignants
        if ($tabDonnees['login'] != $adminAct->login) {
            echo '<option value="' . $tabDonnees['login'] . '">' . $tabDonnees['prenom'] . ' ' . $tabDonnees['nom'] . '</option>';
        }
    }
}

// suppression de l'accès à la BD
$connexion = null;
?>
