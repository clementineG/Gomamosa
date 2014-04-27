<?php

// -------------------------------------------------------
// R�cup�rer les donn�es d'entr�es n�cessaires a� l'action
// -------------------------------------------------------

$codeDem = $_GET['codeDem'];

// -------------------------------------------------------
// Suppression d'une seule démarche
// -------------------------------------------------------

//connexion à la base
$connexion=connexionBase();

//création de la requete de suppression
$requeteSuppression="DELETE FROM demarche WHERE codeDem='$codeDem'";

//application de la requete
$connexion->query($requeteSuppression);

$notification = "Suppression réussie";

// -------------------------------------------------------
// D�finir le nouvel �tat de l'application
// -------------------------------------------------------



$_SESSION['etat'] = 'etat_E_SuiviEtudiant';
// Définition des données dynamiques de la vue.
$donneesVue['notification'] = $notification;
// D�finition des donn�es structurelles de la vue
$donneesVue['titre'] = $titreApplication;
$donneesVue['zone_haute'] = $vuesElementaires['vueElementaire_enteteEtudiant'];
$donneesVue['zone_notif'] = $vuesElementaires['vueElementaire_notification'];
$donneesVue['zone_principale'] = $vuesElementaires['vueElementaire_vueChronoEtudiant'];
$donneesVue['style'] = $feuillesDeStyle['styleEtud'];

// Enregistrement des donn�es de la vue dans la session
$_SESSION['donneesVue'] = $donneesVue;


?>		