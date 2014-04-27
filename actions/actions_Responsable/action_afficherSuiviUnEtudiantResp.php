<?php

// -------------------------------------------------------
// R�cup�rer les donn�es d'entr�es n�cessaires a� l'action
// -------------------------------------------------------


$loginEt=$_GET['login'];;
$_SESSION['etudiantSelect']=$loginEt;
// -------------------------------------------------------
// Ex�cuter l'action
// -------------------------------------------------------
$connexion = connexionBase();
$reqIdEtud = "SELECT * FROM etudiant WHERE login='$loginEt'";
$resultats = $connexion->query($reqIdEtud);
$resultats->setFetchMode(PDO::FETCH_OBJ);
$ligne = $resultats->fetch();
$nomEtud = $ligne->nom;
$prenomEtud = $ligne->prenom;

$_SESSION['prenEtud']=$prenomEtud;
$_SESSION['nomEtud']=$nomEtud;

$notification = "Consultation du suivi de $prenomEtud $nomEtud";
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
