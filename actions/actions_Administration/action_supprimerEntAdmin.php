<?php

// -------------------------------------------------------
// R�cup�rer les donn�es d'entr�es n�cessaires a� l'action
// -------------------------------------------------------
$codeE=$_GET['code'];

// -------------------------------------------------------
// Ex�cuter l'action
// -------------------------------------------------------
$connexion=connexionBase();
$selectEnt="SELECT nomEnt,code FROM entreprise WHERE code=$codeE";
$reqSupprEnt="DELETE FROM entreprise WHERE code=$codeE" ;

$connexion->query($reqSupprEnt);
$nomEntreprise=$connexion->query($selectEnt);

$notification="L'entreprise a bien été supprimée";
// -------------------------------------------------------
// D�finir le nouvel �tat de l'application
// -------------------------------------------------------
$_SESSION['etat'] = 'etat_A_Entreprises';
// Définition des données dynamiques de la vue.
$donneesVue['notification'] = $notification;
// D�finition des donn�es structurelles de la vue
$donneesVue['titre'] = $titreApplication;
$donneesVue['zone_haute'] = $vuesElementaires['vueElementaire_enteteAdmin'];
$donneesVue['zone_notif'] = $vuesElementaires['vueElementaire_notification'];
$donneesVue['zone_principale'] = $vuesElementaires['vueElementaire_entrepriseAdmin'];
$donneesVue['style'] = $feuillesDeStyle['styleAdmin'];

// Enregistrement des donn�es de la vue dans la session
$_SESSION['donneesVue'] = $donneesVue;
?>	