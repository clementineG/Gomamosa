<?php

// -------------------------------------------------------
// R�cup�rer les donn�es d'entr�es n�cessaires a� l'action
// -------------------------------------------------------
// aucune donn�e n�cessaire
// -------------------------------------------------------
// Ex�cuter l'action
// -------------------------------------------------------
// Récupération du login / mot de passe de l'utilisateur
$login = $_POST['login'];
$pass = $_POST['pass'];
$_SESSION['loginUtilisateur']=$login;

// Eléments de connexion et d'identification à LDAP
// $serveurLDAP = "ldap.univ-pau.fr"; // annuaire LDAP de l'université non accessible depuis Iparla (mais accessible depuis Larrun)
$serveurLDAP = "mendibel.iutbayonne.univ-pau.fr"; // réplica de annuaire LDAP de l'UPPA hébérgé sur Mendibel (accessible depuis Iparla)



$monDN = "uid=" . $login . ",ou=people,dc=univ-pau,dc=fr";

// Connexion au serveur LDAP
if ($connexionServeur = ldap_connect($serveurLDAP)) {

    ldap_set_option($connexionServeur, LDAP_OPT_PROTOCOL_VERSION, 3);

    $connexionUtilisateur = ldap_bind($connexionServeur, $monDN, $pass);
	// Utilisateur de l'UPPA?
 if($connexionUtilisateur){
    // test pour savoir si l'utilisateur appartient au campus de Montaury
	$sr = ldap_search($connexionServeur, "dc=univ-pau,dc=fr", "uppasite=ANGLET");

if ($connexionUtilisateur) {

        $connexion = connexionBase();

        $requeteEtudiant = "SELECT login FROM etudiant WHERE login='$login'";
        $requeteEnseignant = "SELECT login FROM enseignant WHERE login='$login'";
		
        $requetePrenomEtud = "SELECT prenom FROM etudiant WHERE login='$login'";
        $requetePrenomEns = "SELECT prenom FROM enseignant WHERE login='$login'";

        $resultatEtud = $connexion->query($requeteEtudiant);
        $resultatEns = $connexion->query($requeteEnseignant);
		$nbEtud = $resultatEtud->rowCount();
		$nbEns = $resultatEns->rowCount();

        $resultatPrenomEtud = $connexion->query($requetePrenomEtud);
        $resultatPrenomEns = $connexion->query($requetePrenomEns);

        // l'utilisateur est un étudiant
        if ($nbEtud ==1) {

            $requete = "SELECT nomProm FROM etudiant WHERE login='$login'";		//recup promo de l'étudiant

            $statut = $connexion->query($requete);
			$statut->setFetchMode(PDO::FETCH_OBJ);
			$ligne=$statut->fetch();
			$statut=$ligne->nomProm;
			$_SESSION['statut']=$statut;
			
        }
        // l'utilisateur est un enseignant
        else if ($nbEns == 1) {

            $requeteResponsable = "SELECT nom FROM enseignant WHERE (login='$login') AND (responsable=1)";
            $requeteAdministrateur = "SELECT nom FROM enseignant WHERE (login='$login') AND (administrateur=1)";
            $resultatResp = $connexion->query($requeteResponsable);
            $resultatAdmin = $connexion->query($requeteAdministrateur);
			$nbResp = $resultatResp->rowCount();
			$nbAdmin = $resultatAdmin->rowCount();

            // l'utilisateur est un responsable
            if ($nbResp != 0) {

                $statut = "resp";
	
            }
            // l'utilisateur est un administrateur
            if ($nbAdmin != 0) {
			
                $statut="resp";
			}
            // l'utilisateur ne fait pas parti de la base
            else {

                $notification = "Connexion refusée, vous ne faites pas parti des personnes qui ont accès au site";
            }
        }
    } else {
        if (!($sr)) {
            $notification = 'Connexion impossible, vous n\'appartenez pas au campus de Montaury !';
        }
    }
	}
	else{
	$notification="vous n'êtes pas enregistré dans l'annuaire de l'UPPA, merci de recommencer avec des identifiants valides.";
    }
}

$connexion=null;
ldap_close($connexionServeur);


switch($statut){
case 'resp':
		$notification = "Veuillez sélectionner le statut sous lequel vous souhaitez vous connecter";
                    // -------------------------------------------------------
                    // D�finir le nouvel �tat de l'application
                    // -------------------------------------------------------
                    $_SESSION['etat'] = 'etat_authentification';
                    // Définition des données dynamiques de la vue.
                    $donneesVue['notification'] = $notification;
                    // D�finition des donn�es structurelles de la vue
                    $donneesVue['titre'] = $titreApplication;
                    $donneesVue['zone_haute'] = $vuesElementaires['vueElementaire_enteteAvantCo'];
                    $donneesVue['zone_notif'] = $vuesElementaires['vueElementaire_notification'];
                    $donneesVue['zone_principale'] = $vuesElementaires['vueElementaire_choixStatut'];
                    $donneesVue['style'] = $feuillesDeStyle['styleAdmin'];
break;


case 'DUT':
				
					$notification = "Bonjour, vous vous êtes correctement connecté en tant que DUT Info";
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
                    $donneesVue['zone_principale'] = $vuesElementaires['vueElementaire_vueChronoEtudiant'];
                    $donneesVue['style'] = $feuillesDeStyle['styleAdmin'];
break;

case 'LP':
					$notification = "Bonjour, vous vous êtes correctement connecté en tant que LP SIL";
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
                    $donneesVue['zone_principale'] = $vuesElementaires['vueElementaire_vueChronoEtudiant'];
                    $donneesVue['style'] = $feuillesDeStyle['styleAdmin'];
break;

case 'DU':
					$notification = "Bonjour, vous vous êtes correctement connecté en tant que DU TIC";
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
                    $donneesVue['zone_principale'] = $vuesElementaires['vueElementaire_vueChronoEtudiant'];
                    $donneesVue['style'] = $feuillesDeStyle['styleAdmin'];
break;

default:

					$_SESSION['etat'] = 'etat_authentification';
					
					// Définition des données dynamiques de la vue.
					$donneesVue['notification'] = $notification;
					// D�finition des donn�es structurelles de la vue
					$donneesVue['titre'] = $titreApplication;
					$donneesVue['zone_haute'] = $vuesElementaires['vueElementaire_enteteAvantCo'];
					$donneesVue['zone_notif'] = $vuesElementaires['vueElementaire_notification'];
					$donneesVue['zone_principale'] = $vuesElementaires['vueElementaire_formConnexion'];
					$donneesVue['style'] = $feuillesDeStyle['styleAdmin'];
}

// Récupération des données de l'utilisateur
$connexion=connexionBase();
if($statut=='DU'||$statut=='DUT'||$statut=='LP'){
$reqEtud="SELECT nom,prenom FROM etudiant WHERE login='$login'";
$idEtud = $connexion->query($reqEtud);
			$idEtud->setFetchMode(PDO::FETCH_OBJ);
			$ligne=$idEtud->fetch();
			$nomEtud=$ligne->nom;
			$prenomEtud=$ligne->prenom;
			$_SESSION['nomUtilisateur']=$nomEtud;
			$_SESSION['prenomUtilisateur']=$prenomEtud;
			$_SESSION['statut']=$statut;
}


$connexion=null;


// Enregistrement des donn�es de la vue dans la session
$_SESSION['donneesVue'] = $donneesVue;
$_SESSION['loginUtilisateur'] = $login;
$_SESSION['login'] = $login;
?>  