<?php

function ajouterEnseignant($form) {
    // Fonction ajoutant un enseignant à la base de données pour qu'ils soit disponible pour etre responsable des stages
    $login = $form['logEns'];
    $nom = $form['nomEns'];
    $prenom = $form['prenomEns'];
    
   $connexion = connexionBase();
    //création de la requete
    $requete = "INSERT INTO enseignant VALUES('$login',' $nom','$prenom')";

    // utilisation de la requète sur la base de données
    $connexion->query($requete);

    // suppression de l'accès à la BD
    $connexion = null;
}

?>