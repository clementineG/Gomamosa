<?php

// -------------------------------------------------------
// R?cup?rer les donn?es d'entr?es n?cessaires a? l'action
// -------------------------------------------------------

$nom = $_POST['nomNouveauDU¨'];
$prenom = $_POST['prenomNouveauDU'];
$login = $_POST['loginNouveauDU'];

ajouterEtudiant($login,$nom,$prenom,"DU");

// -------------------------------------------------------
// D?finir le nouvel ?tat de l'application
// -------------------------------------------------------
$_SESSION['etat'] = 'etat_A_Promotions';
// Définition des données dynamiques de la vue.
$donneesVue['notification'] = "Etudiant ajouté";
// D?finition des donn?es structurelles de la vue
$donneesVue['titre'] = $titreApplication;
$donneesVue['zone_haute'] = $vuesElementaires['vueElementaire_enteteAdmin'];
$donneesVue['zone_notif'] = $vuesElementaires['vueElementaire_notification'];
$donneesVue['zone_principale'] = $vuesElementaires['vueElementaire_listePromoDU'];
$donneesVue['style'] = $feuillesDeStyle['styleAdmin'];

// Enregistrement des donn?es de la vue dans la session
$_SESSION['donneesVue'] = $donneesVue;
?>