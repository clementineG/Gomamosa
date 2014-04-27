<?php

// -------------------------------------------------------
// R�cup�rer les donn�es d'entr�es n�cessaires a� l'action
// -------------------------------------------------------

$adminChoisi = $_POST['selectionAdmin'];

// -------------------------------------------------------
// Ex�cuter l'action
// -------------------------------------------------------

$connexion = connexionBase();

//création de la requete
$requeteSuppression = "UPDATE enseignant SET administrateur=0 ";
$requeteNouveau = "UPDATE enseignant SET administrateur=1 WHERE login='$adminChoisi'";

// utilisation de la requète sur la base de données
$connexion->query($requeteSuppression);

$connexion->query($requeteNouveau);

// suppression de l'accès à la BD
$connexion = null;

// -------------------------------------------------------
// Ex�cuter l'action
// -------------------------------------------------------
$notification = "Administrateur modifié !";
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