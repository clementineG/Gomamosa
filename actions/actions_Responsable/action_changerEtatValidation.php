<?php

// -------------------------------------------------------
// R�cup�rer les donn�es d'entr�es n�cessaires a� l'action
// -------------------------------------------------------
$verifEtudDem="SELECT demissionnaire,nom,prenom FROM etudiant WHERE login='$loginEt'";
$result=$connexion->query($verifEtudDem);
$result->setFetchMode(PDO::FETCH_OBJ);
$ligne = $result->fetch();

$demissionnaire=$ligne->demissionnaire;
$nom=$ligne->nom;
$prenom=$ligne->prenom;

if($demissionnaire==0){
$mettreStatutDemission="UPDATE etudiant SET demissionnaire = '1' WHERE login = '$loginEt'";
$connexion->query($mettreStatutDemission);
$notification="$prenom $nom est maintenant défini comme démissionnaire.";
}
else{
$enleverStatutDemission="UPDATE etudiant SET demissionnaire = '0' WHERE login = '$loginEt'";
$connexion->query($enleverStatutDemission);
$notification="$prenom $nom n'est plus défini comme démissionnaire.";

}

$notification = "Commentaire enregistré";
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
