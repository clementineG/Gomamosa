<?php

// -------------------------------------------------------
// Récupérer les données d'entrées nécessaires a  l'action
// -------------------------------------------------------

// aucune donnée nécessaire

// -------------------------------------------------------
// Exécuter l'action
// -------------------------------------------------------


// -------------------------------------------------------
// Définir le nouvel état de l'application
// -------------------------------------------------------
	$_SESSION['etat']= 'etat_A_Promotions';
   
	// Définition des données structurelles de la vue
	$donneesVue['titre']=$titreApplication;
	$donneesVue['zone_haute']=$vuesElementaires['vueElementaire_enteteAdmin'];
	$donneesVue['zone_notif'] = $vuesElementaires['vueElementaire_notification'];
	$donneesVue['zone_principale']=$vuesElementaires['vueElementaire_listePromoDUT'];
	$donneesVue['style']=$feuillesDeStyle['styleAdmin'];
  
	// Enregistrement des données de la vue dans la session
	$_SESSION['donneesVue']=$donneesVue;
 
?>	