<?php

// -------------------------------------------------------
// R�cup�rer les donn�es d'entr�es n�cessaires a� l'action
// -------------------------------------------------------
$respSelectionneDU = $_POST['respDU'];
$debutPeriodeDU = $_POST['debutDU'];
$finPeriodeDU = $_POST['finDU'];
//modification du format de date ('/' -> '-')
$debutPeriodeDU = str_replace('/', '-', $debutPeriodeDU);
$finPeriodeDU = str_replace('/', '-', $finPeriodeDU);
$debutPeriodeDU = changedatefrus($debutPeriodeDU);
$finPeriodeDU = changedatefrus($finPeriodeDU);

// -------------------------------------------------------
// Ex�cuter l'action
// -------------------------------------------------------
// récupération du login du nouveau responsable
$connexion = connexionBase();

// création des différentes requetes
// 
// 1 pr le champs responsable du prof selectionné
$requeteMaJResp = "UPDATE enseignant SET responsable =1 WHERE login='$respSelectionneDU'";

// effacement ancien responsable
$requeteRespDU = "UPDATE enseignant,promotion SET enseignant.responsable =0 WHERE (promotion.nom='DU') AND (promotion.loginResp=enseignant.login)";
//maj
$requeteMajLP = "UPDATE enseignant,promotion SET enseignant.responsable =1 WHERE (promotion.nom='LP') AND (promotion.loginResp=enseignant.login)";
$requeteMajDUT = "UPDATE enseignant,promotion SET enseignant.responsable =1 WHERE (promotion.nom='DUT') AND (promotion.loginResp=enseignant.login)";
//enregistrement nouvelle promo
$requeteNouveauResp = "UPDATE promotion SET loginResp='$respSelectionneDU' WHERE nom='DU'";
$requeteDateDeb = "UPDATE promotion SET dateDebut='$debutPeriodeDU' WHERE nom='DU'";
$requeteDateFin = "UPDATE promotion SET dateFin='$finPeriodeDU' WHERE nom='DU'";

//application des différentes requetes
// récupération des logins des différents responsables

$connexion->query($requeteRespDU);


// mise à jour du nouveau responsable
$connexion->query($requeteMajResp);
// mise à jour du responsable DU
$connexion->query($requeteMajLP);
// mise à jour du responsable TIC
$connexion->query($requeteMajDUT);

$connexion->query($requeteNouveauResp);
$connexion->query($requeteDateDeb);
$connexion->query($requeteDateFin);


$notification = "Promotion DU modifiée";

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