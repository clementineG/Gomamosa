<?php

// -------------------------------------------------------
// R�cup�rer les donn�es d'entr�es n�cessaires a� l'action
// -------------------------------------------------------
$respSelectionneDUT = $_POST['respDUT'];
$debutPeriodeDUT = $_POST['debutDUT'];
$finPeriodeDUT = $_POST['finDUT'];
//modification du format de date ('/' -> '-')
$debutPeriodeDUT = str_replace('/', '-', $debutPeriodeDUT);
$finPeriodeDUT = str_replace('/', '-', $finPeriodeDUT);
$debutPeriodeDUT = changedatefrus($debutPeriodeDUT);
$finPeriodeDUT = changedatefrus($finPeriodeDUT);

// -------------------------------------------------------
// Ex�cuter l'action
// -------------------------------------------------------
// récupération du login du nouveau responsable
$connexion = connexionBase();

// création des différentes requetes
// 
// 1 pr le champs responsable du prof selectionné
$requeteMaJResp = "UPDATE enseignant SET responsable =1 WHERE login='$respSelectionneDUT'";

// selection login reponsable actuel
//$requeteRespDUT = "SELECT loginResp FROM promotion WHERE nom='DUT'";

// effacement ancien responsable
$requeteNonResp = "UPDATE enseignant,promotion SET enseignant.responsable =0 WHERE (promotion.nom='DUT') AND (promotion.loginResp=enseignant.login)";
//enregistrement nouvelle promo
$requeteNouveauResp = "UPDATE promotion SET loginResp='$respSelectionneDUT' WHERE nom='DUT'";
$requeteDateDeb = "UPDATE promotion SET dateDebut='$debutPeriodeDUT' WHERE nom='DUT'";
$requeteDateFin = "UPDATE promotion SET dateFin='$finPeriodeDUT' WHERE nom='DUT'";

//application des différentes requetes
// récupération des logins des différents responsables

$connexion->query($requeteRespDUT);

// vérification des différents responsable
$connexion->query($requeteNonResp);
// mise à jour du nouveau responsable
$connexion->query($requeteMaJResp);


$connexion->query($requeteNouveauResp);
$connexion->query($requeteDateDeb);
$connexion->query($requeteDateFin);


$notification = "Promotion(s) modifiée(s)";

// -------------------------------------------------------
// D�finir le nouvel �tat de l'application
// -------------------------------------------------------
$_SESSION['etat'] = 'etat_A_Promotions';
// Définition des données dynamiques de la vue.
$donneesVue['notification'] = $notification;
// D�finition des donn�es structurelles de la vue
$donneesVue['titre'] = $titreApplication;
$donneesVue['zone_haute'] = $vuesElementaires['vueElementaire_enteteAdmin'];
$donneesVue['zone_notif'] = $vuesElementaires['vueElementaire_notification'];
$donneesVue['zone_principale'] = $vuesElementaires['vueElementaire_promoAdmin'];
$donneesVue['style'] = $feuillesDeStyle['styleAdmin'];

// Enregistrement des donn�es de la vue dans la session
$_SESSION['donneesVue'] = $donneesVue;
?>		