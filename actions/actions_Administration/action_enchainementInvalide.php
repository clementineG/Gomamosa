<?php

// -------------------------------------------------------
// R�cup�rer les donn�es d'entr�es n�cessaires a� l'action
// -------------------------------------------------------
// -------------------------------------------------------
// Ex�cuter l'action
// -------------------------------------------------------
// On nettoie les variables de session
$_SESSION = array();

// On attribut le chemin du d�pot � une variable de session
// Notification : D�connexion forc�e suite � un enchainement invalide
echo"<script language='javascript'>alert('Action exécuté invalide, veuillez vous reconnecter !');</script>";

// -------------------------------------------------------
// D�finir le nouvel �tat de l'application
// -------------------------------------------------------

$_SESSION['etat'] = 'etat_authentification';

// -------------------------------------------------------
// Pr�parer les donn�es de la vue r�sultante
// -------------------------------------------------------
// Définition des données dynamiques de la vue.
$donneesVue['notification'] = $notification;
// D�finition des donn�es structurelles de la vue
$donneesVue['titre'] = $titreApplication;
$donneesVue['zone_haute'] = $vuesElementaires['vueElementaire_enteteAvantCo'];
$donneesVue['zone_notif'] = $vuesElementaires['vueElementaire_notification'];
$donneesVue['zone_principal'] = $vuesElementaires['vueElementaire_connexion'];
$donneesVue['style'] = $feuillesDeStyle['styleAdmin'];

// Enregistrement des donn�es de la vue dans la session
$_SESSION['donneesVue'] = $donneesVue;
?>