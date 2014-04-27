<?php

// -------------------------------------------------------
// R�cup�rer les donn�es d'entr�es n�cessaires a� l'action
// -------------------------------------------------------

// -------------------------------------------------------
// Ex�cuter l'action
// -------------------------------------------------------
// On nettoie les variables de session
$_SESSION = array();

$notification="Bienvenue sur Gomamosa, veuillez vous enregistrer pour accéder à l'application.";


// -------------------------------------------------------
// D�finir le nouvel �tat de l'application
// -------------------------------------------------------
$_SESSION['nomUtilisateur']='Gourp';
$_SESSION['prenomUtilisateur']='Clémentine';
$_SESSION['etat'] = 'etat_authentification';
$_SESSION['loginUtilisateur']='cgourp';
// -------------------------------------------------------
// Pr�parer les donn�es de la vue r�sultante
// -------------------------------------------------------
// Définition des données dynamiques de la vue.
$donneesVue['notification'] = $notification;
// D�finition des donn�es structurelles de la vue
$donneesVue['titre'] = $titreApplication;
$donneesVue['zone_haute'] = $vuesElementaires['vueElementaire_enteteAvantCo'];
$donneesVue['zone_notif'] = $vuesElementaires['vueElementaire_notification'];
$donneesVue['zone_principale'] = $vuesElementaires['vueElementaire_formConnexion'];
$donneesVue['style'] = $feuillesDeStyle['styleAdmin'];

// Enregistrement des donn�es de la vue dans la session
$_SESSION['donneesVue'] = $donneesVue;
?>  