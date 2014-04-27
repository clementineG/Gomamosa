<?php

// -------------------------------------------------------
// Ex�cuter l'action
// -------------------------------------------------------
// V�rification que le t�l�chargement a fonctionn�
if (is_uploaded_file($_FILES['fchCompleteBase']['tmp_name'])) {
    $nomFichierEnregistre = $_FILES['fchCompleteBase']['name'];
    if (move_uploaded_file($_FILES['fchCompleteBase']['tmp_name'], $_FILES['fchCompleteBase']['name'])) {

        //traitement
        $fichier = $nomFichierEnregistre;
        $fic = fopen($fichier, 'rb');

        //connexion BD
        $connexion = connexionBase();
        // Ajout des entreprise dans la BD
        for ($ligne = fgetcsv($fic, 1024); !feof($fic); $ligne = fgetcsv($fic, 1024)) {
            ajouterEntrepriseTest($connexion,$ligne[0], $ligne[1], $ligne[2], $ligne[3], $ligne[4],$ligne[5]);
        }
        // suppression de l'acc�s � la BD
		$connexion = null ;
    }
}

$notification="La base des entreprises a bien été complétée ";

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