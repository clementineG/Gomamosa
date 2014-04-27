<?php

// -------------------------------------------------------
// R�cup�rer les donn�es d'entr�es n�cessaires a� l'action
// -------------------------------------------------------


$codeEnt=$_GET['code'];
$connexion = connexionBase();

// -------------------------------------------------------
// Ex�cuter l'action
// -------------------------------------------------------
$reqSelect = "SELECT * FROM entreprise WHERE code='$codeEnt'";
$resultats = $connexion->query($reqSelect);

$resultats->setFetchMode(PDO::FETCH_OBJ);

$ligne = $resultats->fetch();
$nomEnt=$ligne->nomEnt;
$adresse=$ligne->adresse;
$cp=$ligne->codePostal;
$ville=$ligne->ville;
$pays=$ligne->pays;

$connexion=null;
$notification = "Fiche descriptive de l'entreprise";
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
$donneesVue['zone_principale'] = $vuesElementaires['vueElementaire_detailEntEtudiant'];
$donneesVue['style'] = $feuillesDeStyle['styleEtud'];

// Enregistrement des donn�es de la vue dans la session
$_SESSION['donneesVue'] = $donneesVue;
?>