<?php

// -------------------------------------------------------
// R�cup�rer les donn�es d'entr�es n�cessaires a� l'action
// -------------------------------------------------------
$respSelectionneLP = $_POST['respLP'];
$debutPeriodeLP = $_POST['debutLP'];
$finPeriodeLP = $_POST['finLP'];
//modification du format de date ('/' -> '-')
$debutPeriodeLP = str_replace('/', '-', $debutPeriodeLP);
$finPeriodeLP = str_replace('/', '-', $finPeriodeLP);
$debutPeriodeLP = changedatefrus($debutPeriodeLP);
$finPeriodeLP = changedatefrus($finPeriodeLP);

// -------------------------------------------------------
// Ex�cuter l'action
// -------------------------------------------------------
// récupération du login du nouveau responsable
$connexion = connexionBase();

// création des différentes requetes
// 
// 1 pr le champs responsable du prof selectionné
$requeteMaJResp = "UPDATE enseignant SET responsable =1 WHERE login='$respSelectionneLP'";

// effacement ancien responsable
$requeteRespDUT = "UPDATE enseignant,promotion SET enseignant.responsable =0 WHERE (promotion.nom='LP') AND (promotion.loginResp=enseignant.login)";
//maj
$requeteMajDU = "UPDATE enseignant,promotion SET enseignant.responsable =1 WHERE (promotion.nom='DU') AND (promotion.loginResp=enseignant.login)";
$requeteMajDUT = "UPDATE enseignant,promotion SET enseignant.responsable =1 WHERE (promotion.nom='DUT') AND (promotion.loginResp=enseignant.login)";
//enregistrement nouvelle promo
$requeteNouveauResp = "UPDATE promotion SET loginResp='$respSelectionneLP' WHERE nom='LP'";
$requeteDateDeb = "UPDATE promotion SET dateDebut='$debutPeriodeLP' WHERE nom='LP'";
$requeteDateFin = "UPDATE promotion SET dateFin='$finPeriodeLP' WHERE nom='LP'";

//application des différentes requetes
// récupération des logins des différents responsables

$connexion->query($requeteRespLP);


// mise à jour du nouveau responsable
$connexion->query($requeteMaJResp);
// mise à jour du responsable DU
$connexion->query($requeteMaJDU);
// mise à jour du responsable TIC
$connexion->query($requeteMaJDUT);

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