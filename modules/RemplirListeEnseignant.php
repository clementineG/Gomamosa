<?php

function RemplirListeEnseignant($promo) {
     // connexion BD
    $connexion = connexionBase();

    // Requete de sélection avec PDO
    //Construction de la requète
    $requete = "SELECT login,nom,prenom FROM enseignant;";
    $requeteResp = "SELECT login, enseignant.nom, prenom FROM enseignant,promotion WHERE (loginResp=login) AND (promotion.nom='$promo')";
    // Application de la requete sur la base de bonnées
    $resultats = $connexion->query($requete);

    $resp = $connexion->query($requeteResp);
    $resp->setFetchMode(PDO::FETCH_OBJ);
    $respCourant = $resp->fetchAll();

    // Passage des résultats en FetchMode
    $resultats->setFetchMode(PDO::FETCH_OBJ);


    // PAr defaut -> resp actuel
    foreach ($respCourant as $respAct)
        echo '<option value="' . $respAct->login . '">' . $respAct->prenom . ' ' . $respAct->nom . '</option>';
    //Remplissage liste courante    
    while ($ligne = $resultats->fetch()) {
        // récupération des identifiants à mettre dans la liste déroulante
        $tabDonnees['login'] = $ligne->login;
        $tabDonnees['nom'] = $ligne->nom;
        $tabDonnees['prenom'] = $ligne->prenom;
        // Affichage des autres enseignants
        if ($tabDonnees['login'] != $respAct->login) {
            echo '<option value="' . $tabDonnees['login'] . '">' . $tabDonnees['prenom'] . ' ' . $tabDonnees['nom'] . '</option>';
        }
    }
}

// suppression de l'accès à la BD
$connexion = null;


?>