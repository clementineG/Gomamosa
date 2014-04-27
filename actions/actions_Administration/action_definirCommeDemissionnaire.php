
<?php

// -------------------------------------------------------
// R�cup�rer les donn�es d'entr�es n�cessaires a� l'action
// -------------------------------------------------------
$loginEt=$_GET['login'];
$promotionModifiee=$_SESSION['promotionModifiee'];
// -------------------------------------------------------
// Ex�cuter l'action
// -------------------------------------------------------
$connexion=  connexionBase();

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

// -------------------------------------------------------
// D�finir le nouvel état de l'application
// -------------------------------------------------------
$_SESSION['etat'] = 'etat_A_Promotions';
// Définition des données dynamiques de la vue.
$donneesVue['notification'] = $notification;
// D�finition des donn�es structurelles de la vue
$donneesVue['titre'] = $titreApplication;
$donneesVue['zone_haute'] = $vuesElementaires['vueElementaire_enteteAdmin'];
$donneesVue['zone_notif'] = $vuesElementaires['vueElementaire_notification'];

//vue à afficher suivant la promo
    if ($promotionModifiee == 'DUT') {
        $donneesVue['zone_principale'] = $vuesElementaires['vueElementaire_listePromoDUT'];
    } 
    if ($promotionModifiee == 'LP') {
        $donneesVue['zone_principale'] = $vuesElementaires['vueElementaire_listePromoLP'];
    } 
    if ($promotionModifiee == 'DU'){
        $donneesVue['zone_principale'] = $vuesElementaires['vueElementaire_listePromoDU'];
    }
  
$donneesVue['style'] = $feuillesDeStyle['styleAdmin'];

// Enregistrement des donn�es de la vue dans la session
$_SESSION['donneesVue'] = $donneesVue;
?>
