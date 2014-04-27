<?php

// -------------------------------------------------------
// R�cup�rer les donn�es d'entr�es n�cessaires a� l'action
// -------------------------------------------------------

$loginResp=$_SESSION['loginUtilisateur'];
$loginEtud=$_GET['login'];
$commentaireEnr=$_POST['comment'];

// -------------------------------------------------------
// Ex�cuter l'action
// -------------------------------------------------------
$dateCom = new DateTime();


$date=$dateCom->format('Y-m-d');
$connexion=connexionBase();
$insertionComment="INSERT INTO commenter VALUES ('','$commentaireEnr','$date','$loginResp','$loginEtud')";
$connexion->query($insertionComment);
$connexion=null;

$notification = "Commentaire enregistré";
// -------------------------------------------------------
// D�finir le nouvel �tat de l'application
// -------------------------------------------------------
$_SESSION['etat'] = 'etat_R_SuiviPersoEtudiant';
// Définition des données dynamiques de la vue.
$donneesVue['notification'] = $notification;
// D�finition des donn�es structurelles de la vue
$donneesVue['titre'] = $titreApplication;
$donneesVue['zone_haute'] = $vuesElementaires['vueElementaire_enteteResp'];
$donneesVue['zone_notif'] = $vuesElementaires['vueElementaire_notification'];
$donneesVue['zone_principale'] = $vuesElementaires['vueElementaire_suiviUnEtudiantResp'];
$donneesVue['style'] = $feuillesDeStyle['styleResp'];

// Enregistrement des donn�es de la vue dans la session
$_SESSION['donneesVue'] = $donneesVue;
?>
