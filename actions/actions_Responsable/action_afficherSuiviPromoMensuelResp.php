<?php

// -------------------------------------------------------
// R�cup�rer les donn�es d'entr�es n�cessaires a� l'action
// -------------------------------------------------------



// -------------------------------------------------------
// Ex�cuter l'action
// -------------------------------------------------------



$notification="Consultation du suivi de la promotion";
// -------------------------------------------------------
// D�finir le nouvel �tat de l'application
// -------------------------------------------------------
$_SESSION['etat'] = 'etat_R_SuiviPromotion';
// Définition des données dynamiques de la vue.
$donneesVue['notification'] = $notification;
// D�finition des donn�es structurelles de la vue
$donneesVue['titre'] = $titreApplication;
$donneesVue['zone_haute'] = $vuesElementaires['vueElementaire_enteteResp'];
$donneesVue['zone_notif'] = $vuesElementaires['vueElementaire_notification'];
$donneesVue['zone_principale'] = $vuesElementaires['vueElementaire_suiviPromoMensuelResp'];
$donneesVue['style'] = $feuillesDeStyle['styleResp'];

// Enregistrement des donn�es de la vue dans la session
$_SESSION['donneesVue'] = $donneesVue;
?>
