<?php

// -------------------------------------------------------
// R�cup�rer les donn�es d'entr�es n�cessaires a� l'action
// -------------------------------------------------------
$loginEns=$_GET['login'];

// -------------------------------------------------------
// Ex�cuter l'action
// -------------------------------------------------------
$connexion=connexionBase();


$select="SELECT nom,prenom FROM enseignant WHERE login='$loginEns'";
$idEnseignant=$connexion->query($select);
$idEnseignant->setFetchMode(PDO::FETCH_OBJ);
$ligne = $idEnseignant->fetch();
$nom=$ligne->nom;
$prenom=$ligne->prenom;


$reqSupprEnt="DELETE FROM enseignant WHERE login='$loginEns'" ;
$connexion->query($reqSupprEnt);

$notification="$prenom $nom a bien été supprimé(e)";
$connexion=null;
// -------------------------------------------------------
// D�finir le nouvel �tat de l'application
// -------------------------------------------------------
$_SESSION['etat'] = 'etat_A_Enseignants';
// Définition des données dynamiques de la vue.
$donneesVue['notification'] = $notification;
// D�finition des donn�es structurelles de la vue
$donneesVue['titre'] = $titreApplication;
$donneesVue['zone_haute'] = $vuesElementaires['vueElementaire_enteteAdmin'];
$donneesVue['zone_notif'] = $vuesElementaires['vueElementaire_notification'];
$donneesVue['zone_principale'] = $vuesElementaires['vueElementaire_enseignantAdmin'];
$donneesVue['style'] = $feuillesDeStyle['styleAdmin'];

// Enregistrement des donn�es de la vue dans la session
$_SESSION['donneesVue'] = $donneesVue;
?>	