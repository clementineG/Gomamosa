<?php

// -------------------------------------------------------
// R�cup�rer les donn�es d'entr�es n�cessaires a� l'action
// -------------------------------------------------------

$logEns = $_POST['logEns'];
$nomEns = $_POST['nomEns'];
$prenomEns = $_POST['prenomEns'];
 
   $connexion = connexionBase();
// -------------------------------------------------------
// Ex�cuter l'action
// -------------------------------------------------------

    //création de la requete
    $requete = "INSERT INTO enseignant VALUES('$logEns',' $nomEns','$prenomEns',0,0)";

    // utilisation de la requète sur la base de données
    $connexion->query($requete);

    // suppression de l'accès à la BD
    $connexion = null;


$notification="$prenomEns $nomEns a été ajouté(e) à la liste des enseignants de l'IUT ";
// -------------------------------------------------------
// D�finir le nouvel �tat de l'application
// -------------------------------------------------------
$_SESSION['etat'] = 'etat_A_Enseignants';
// Définition des données dynamiques de la vue.
$donneesVue['notification'] = $notification;
// D�finition des donn�es structurelles de la vue
$donneesVue['titre'] = $titreApplication;
$donneesVue['zone_haute'] = $vuesElementaires['vueElementaire_enteteAdmin'];
$donneesVue['zone_notif'] = $vuesElementaires['vueElementaire_notification'];
$donneesVue['zone_principale'] = $vuesElementaires['vueElementaire_enseignantAdmin'];
$donneesVue['style'] = $feuillesDeStyle['styleAdmin'];

// Enregistrement des donn�es de la vue dans la session
$_SESSION['donneesVue'] = $donneesVue;
?>