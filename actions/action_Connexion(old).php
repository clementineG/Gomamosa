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


		// choix de l'interface à ouvrir en cas d'identification correcte
	echo '<a style="position:absolute; top: 80%; left:10%;" href="controleur.php?action=action_afficherPromoAdmin " > Ouvrir l\'interface administrateur </a>';
        echo '<a style="position:absolute; top: 75%; left:10%;" href="controleur.php?action=action_afficherMonSuivi " > Ouvrir l\'interface étudiant </a>';
       	echo '<a style="position:absolute; top: 85%; left:10%;" href="controleur.php?action= " > Ouvrir l\'interface responsable </a>';

	

$notification="Choisir l'interface voulu!";
		$connexionOk=0;
		$_SESSION['etat'] = 'etat_authentification';

		// Définition des données dynamiques de la vue.
		$donneesVue['notification'] = $notification;
		// D�finition des donn�es structurelles de la vue
		$donneesVue['titre'] = $titreApplication;
		$donneesVue['zone_haute'] = $vuesElementaires['vueElementaire_enteteAvantCo'];
		$donneesVue['zone_notif'] = $vuesElementaires['vueElementaire_notification'];
		$donneesVue['zone_principale'] = $vuesElementaires['vueElementaire_formConnexion'];
		$donneesVue['style'] = $feuillesDeStyle['styleAdmin'];

// Enregistrement des donn�es de la vue dans la session
$_SESSION['donneesVue'] = $donneesVue;
$_SESSION['login'] = $login;
?>  