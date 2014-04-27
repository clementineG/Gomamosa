<?php

// -------------------------------------------------------
// R�cup�rer les donn�es d'entr�es n�cessaires a� l'action
// -------------------------------------------------------
// aucune donn�e n�cessaire
// -------------------------------------------------------
// Ex�cuter l'action
// -------------------------------------------------------
$connexion = connexionBase();

//vider base entreprise

viderEntreprise($connexion);

// remplir nouvelle base
if (is_uploaded_file($_FILES['fchNouvelleBase']['tmp_name'])) {
    $nomFichierEnregistre = $_FILES['fchNouvelleBase']['name'];
    if (move_uploaded_file($_FILES['fchNouvelleBase']['tmp_name'], $_FILES['fchNouvelleBase']['name'])) {

        //traitement
        $fichier = $nomFichierEnregistre;
        $fic = fopen($fichier, 'rb');

        for ($ligne = fgetcsv($fic, 1024); !feof($fic); $ligne = fgetcsv($fic, 1024)) {
            ajouterEntrepriseTest($connexion,$ligne[0], $ligne[1], $ligne[2], $ligne[3], $ligne[4],$ligne[5]);
        }
        // suppression de l'acc�s � la BD
		$connexion = null ;
    }
}

$notification="La base des entreprises a bien été écrasée ";
// -------------------------------------------------------
// D�finir le nouvel �tat de l'application
// -------------------------------------------------------
$_SESSION['etat'] = 'etat_A_Entreprises';
// Définition des données dynamiques de la vue.
$donneesVue['notification'] = $notification;
// D�finition des donn�es structurelles de la vue
$donneesVue['titre'] = $titreApplication;
$donneesVue['zone_haute'] = $vuesElementaires['vueElementaire_enteteAdmin'];
$donneesVue['zone_notif'] = $vuesElementaires['vueElementaire_notification'];
$donneesVue['zone_principale'] = $vuesElementaires['vueElementaire_entrepriseAdmin'];
$donneesVue['style'] = $feuillesDeStyle['styleAdmin'];

// Enregistrement des donn�es de la vue dans la session
$_SESSION['donneesVue'] = $donneesVue;
?>	