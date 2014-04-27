<?php
//A AJOUTER!!!!!
//
//
// -------------------------------------------------------
// R�cup�rer les donn�es d'entr�es n�cessaires a� l'action
// -------------------------------------------------------

$codeDemarche = $_POST['codeDemarche'];
$formeDemarche = $_POST['formeDemarche'];
$etatDemarche = $_POST['etatDemarche'];
$observationDemarche = $_POST['observationDemarche'];
$dateDemarche = $_POST['dateDemarche'];
$dateRelanceDemarche = $_POST['dateRelanceDemarche'];

// -------------------------------------------------------
// modifiaction de la démarche
// -------------------------------------------------------

//connexion à la base
$connexion=connexionBase();

//création des requets de modifications
$requeteModifForme="UPDATE demarche SET forme='$formeDemarche' WHERE code='$demarche'";
$requeteModifEtat="UPDATE demarche SET etat='$etatDemarche' WHERE code='$demarche'";
$requeteModifObservation="UPDATE demarche SET observation='$observationDemarche' WHERE code='$demarche'";
$requeteModifDate="UPDATE demarche SET date='$dateDemarche' WHERE code='$demarche'";
$requeteModifDateRelance="UPDATE demarche SET dateRelance='$dateRelanceDemarche' WHERE code='$demarche'";


//application des requete
if ($formeDemarche != null){
$connexion->query($requeteModifForme);
}

if ($etatDemarche != null){
$connexion->query($requeteModifEtat);
}

if ($observationDemarche != null){
$connexion->query($requeteModifObservation);
}

if ($dateDemarche != null){
$connexion->query($requeteModifDate);
}

if ($dateRelanceDemarche != null){
$connexion->query($requeteModifDateRelance);
}

$notification = "Modifiez les champs souhaité(s)";

// -------------------------------------------------------
// D�finir le nouvel �tat de l'application
// -------------------------------------------------------


$_SESSION['etat'] = 'etat_E_SuiviPromotion';
// Définition des données dynamiques de la vue.
$donneesVue['notification'] = $notification;
// D�finition des donn�es structurelles de la vue
$donneesVue['titre'] = $titreApplication;
$donneesVue['zone_haute'] = $vuesElementaires['vueElementaire_enteteEtudiant'];
$donneesVue['zone_notif'] = $vuesElementaires['vueElementaire_notification'];
$donneesVue['zone_principale'] = $vuesElementaires['vueElementaire_vueModif'];
$donneesVue['style'] = $feuillesDeStyle['styleEtud'];

// Enregistrement des donn�es de la vue dans la session
$_SESSION['donneesVue'] = $donneesVue;


?>		