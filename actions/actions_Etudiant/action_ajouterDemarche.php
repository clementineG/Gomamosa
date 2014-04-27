<?php

// -------------------------------------------------------
// R�cup�rer les donn�es d'entr�es n�cessaires a� l'action
// -------------------------------------------------------

$etudiant = 'cgourp';

// données du formulaire
$nomEnt = $_POST['nomEnt'];
$adresse = $_POST['adresse'];
$CP = $_POST['cp'];
$ville = $_POST['ville'];
$pays = $_POST['pays'];

$nomCont = $_POST['nomCont'];
$prenom = $_POST['prenom'];
$telephone = $_POST['telephone'];
$email = $_POST['email'];
$fax = $_POST['fax'];

$etatDemarche = $_POST['etatDemarche'];
$formeDemarche = $_POST['formeDemarche'];
$observationDemarche = $_POST['observationDemarche'];
$dateDemarche = changedatefrus($_POST['dateDemarche']);
$dateRelanceDemarche = changedatefrus($_POST['dateRelanceDemarche']);

$autreInfos = $_POST['autreInfos'];


switch ($formeDemarche) {
    case 'Telephone':
        $formeDemarche = 'tel';
        break;
    case 'Fax':
        $formeDemarche = 'fax';
        break;
    case 'Mail':
        $formeDemarche = 'mail';
        break;
    case 'Entretient':
        $formeDemarche = 'rdv';
        break;
    case 'Courrier':
        $formeDemarche = 'courrier';
        break;
    case 'Site':
        $formeDemarche = 'site';
        break;
}



// -------------------------------------------------------
// Ajout d'une démarche 
// -------------------------------------------------------
$connexion = connexionBase();

$reqSelectcodeContactConnu = "SELECT code FROM contact WHERE (nomContact = '$nomCont') AND (prenom='$prenom') AND (telephone='$telephone') AND (email='$email')";
$resultat1 = $connexion->query($reqSelectcodeContactConnu);
$nbContactConnu = $resultat1->rowCount();

if ($nbContactConnu == 0) {
    // Nouveau contact
    $reqAjoutContact = "INSERT INTO contact VALUES('', '$nomCont', '$prenom', '$telephone','$fax','$email','$autreInfos')";
    $connexion->query($reqAjoutContact);
    $codeCont = $connexion->lastInsertId();
} else {
    //Recherche code contact
    $resultat1->setFetchMode(PDO::FETCH_OBJ);
    $ligne = $resultat1->fetch();
    $codeCont = $ligne->code;
}
//ENTREPRISE
$reqSelectcodeEntrepriseConnu = "SELECT code FROM entreprise WHERE (nomEnt = '$nomEnt') AND (adresse='$adresse') AND (codePostal='$CP') AND (ville='$ville') AND (pays='$pays')";
$resultat2 = $connexion->query($reqSelectcodeEntrepriseConnu);
$nbEntrepriseConnu = $resultat2->rowCount();

if ($nbEntrepriseConnu == 0) {
    // Nouveau contact
    $reqAjoutEntreprise = "INSERT INTO entreprise VALUES('', '$nomEnt', '$adresse', '$CP','$ville','$pays')";
    $connexion->query($reqAjoutEntreprise);
    $codeEnt= $connexion->lastInsertId();
} else {
    //Recherche code contact
    $resultat2->setFetchMode(PDO::FETCH_OBJ);
    $ligne = $resultat2->fetch();
    $codeEnt = $ligne->code;
}


//DEMARCHE
$reqAjoutDemarche = "INSERT INTO demarche VALUES(' ','$formeDemarche','$etatDemarche','$observationDemarche','$dateDemarche','$dateRelanceDemarche',$codeCont,$codeEnt,'$etudiant',0) ";
$connexion->query($reqAjoutDemarche);


$connexion = null;
$notification = "Ajout réussi";

// -------------------------------------------------------
// D�finir le nouvel �tat de l'application
// -------------------------------------------------------
$_SESSION['etat'] = 'etat_E_SuiviEtudiant';
// Définition des données dynamiques de la vue.
$donneesVue['notification'] = $notification;
// D�finition des donn�es structurelles de la vue
$donneesVue['titre'] = $titreApplication;
$donneesVue['zone_haute'] = $vuesElementaires['vueElementaire_enteteEtudiant'];
$donneesVue['zone_notif'] = $vuesElementaires['vueElementaire_notification'];
$donneesVue['zone_principale'] = $vuesElementaires['vueElementaire_formAjoutDemarche'];
$donneesVue['style'] = $feuillesDeStyle['styleEtud'];

// Enregistrement des donn�es de la vue dans la session
$_SESSION['donneesVue'] = $donneesVue;
?>


