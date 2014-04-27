<?php

// -------------------------------------------------------
// R?cup?rer les donn?es d'entr?es n?cessaires a? l'action
// -------------------------------------------------------


$codeEnt=$_SESSION['code'];
$nomEnt= $_POST['nomEnt'];
$adresse = $_POST['adresse'];
$cp= $_POST['cp'];
$ville= $_POST['ville'];
$pays= $_POST['pays'];

$connexion=connexionBase();

$reqNom="UPDATE entreprise SET nomEnt='$nomEnt' WHERE code='$codeEnt'";
$reqAd="UPDATE entreprise SET adresse='$adresse' WHERE code='$codeEnt'";
$reqCP="UPDATE entreprise SET codePostal='$cp' WHERE code='$codeEnt'";
$reqVille="UPDATE entreprise SET ville='$ville' WHERE code='$codeEnt'";
$reqPays="UPDATE entreprise SET pays='$pays' WHERE code='$codeEnt'";
if($nomEnt==' '){
    ?><script type="text/javascript"> alert("Vous n\'avez pas renseigné de nom pour l\'entreprise. Veuillez recommencer.")</script><?php
}
else{
$connexion->query($reqNom);
$connexion->query($reqAd);
$connexion->query($reqCP);
$connexion->query($reqVille);
$connexion->query($reqPays);

$notification="Entreprise modifiée.";
}
// -------------------------------------------------------
// D?finir le nouvel ?tat de l'application
// -------------------------------------------------------
$_SESSION['etat'] = 'etat_A_Entreprises';
// D�finition des donn�es dynamiques de la vue.
$donneesVue['notification'] = $notification;
// D?finition des donn?es structurelles de la vue
$donneesVue['titre'] = $titreApplication;
$donneesVue['zone_haute'] = $vuesElementaires['vueElementaire_enteteAdmin'];
$donneesVue['zone_notif'] = $vuesElementaires['vueElementaire_notification'];
$donneesVue['zone_principale'] = $vuesElementaires['vueElementaire_entrepriseAdmin'];
$donneesVue['style'] = $feuillesDeStyle['styleAdmin'];

// Enregistrement des donn?es de la vue dans la session
$_SESSION['donneesVue'] = $donneesVue;
?>	