<?php

// ----- PARAMETRES DE L'APPLICATION -----
// ----- Ces parametres regulent le  -----
// ----- comportement du controleur  -----
// Configuration des MODELES DE VUE de l'application
// Pour chaque modele de vue on donne son nom et le fichier qui l'implemente
$modelesVues = array('modeleVue' => 'modelesVues/modeleVue.php');

// Configuration des VUES ELEMENTAIRES de l'aplication
// Pour chaque vue elementaire on donne son nom et le fichier qui l'implemente
$vuesElementaires = array('vueElementaire_enteteAvantCo' => 'vuesElementaires/vueElementaire_enteteAvantCo.php',			// AVANT CONNEXION
    'vueElementaire_formConnexion' => 'vuesElementaires/vueElementaire_formConnexion.php',
    'vueElementaire_choixStatut' => 'vuesElementaires/vueElementaire_choixStatut.php',
    'vueElementaire_choixPromo' => 'vuesElementaires/vueElementaire_choixPromo.php',
    'vueElementaire_enteteAdmin' => 'vuesElementaires/vueElementaires_Administrateur/vueElementaire_enteteAdmin.php',			// ADMINISTRATEUR
    'vueElementaire_promoAdmin' => 'vuesElementaires/vueElementaires_Administrateur/vueElementaire_promoAdmin.php',
    'vueElementaire_listePromoDUT' => 'vuesElementaires/vueElementaires_Administrateur/vueElementaire_listePromoDUT.php',
    'vueElementaire_listePromoLP' => 'vuesElementaires/vueElementaires_Administrateur/vueElementaire_listePromoLP.php',
    'vueElementaire_listePromoDU' => 'vuesElementaires/vueElementaires_Administrateur/vueElementaire_listePromoDU.php',
    'vueElementaire_entrepriseAdmin' => 'vuesElementaires/vueElementaires_Administrateur/vueElementaire_entrepriseAdmin.php',
    'vueElementaire_modifierEntrepriseAdmin' => 'vuesElementaires/vueElementaires_Administrateur/vueElementaire_modifierEntrepriseAdmin.php',
    'vueElementaire_enseignantAdmin' => 'vuesElementaires/vueElementaires_Administrateur/vueElementaire_enseignantAdmin.php',
    'vueElementaire_enseignantFormAdmin' => 'vuesElementaires/vueElementaires_Administrateur/vueElementaire_enseignantFormAdmin.php',
    'vueElementaire_permissionAdmin' => 'vuesElementaires/vueElementaires_Administrateur/vueElementaire_permissionAdmin.php',		// ETUDIANT
    'vueElementaire_notification' => 'vuesElementaires/notification.php',
    'vueElementaire_enteteEtudiant' => 'vuesElementaires/vueElementaires_Etudiant/vueElementaire_enteteEtudiant.php',
    'vueElementaire_vueChronoEtudiant' => 'vuesElementaires/vueElementaires_Etudiant/vueElementaire_vueChronoEtudiant.php',
    'vueElementaire_vueEntEtudiant' => 'vuesElementaires/vueElementaires_Etudiant/vueElementaire_vueEntEtudiant.php',
    'vueElementaire_detailEntEtudiant' => 'vuesElementaires/vueElementaires_Etudiant/vueElementaire_detailEntEtudiant.php',
    'vueElementaire_formAjoutDemarche' => 'vuesElementaires/vueElementaires_Etudiant/vueElementaire_formAjoutDemarche.php',
    'vueElementaire_vuePromo' => 'vuesElementaires/vueElementaires_Etudiant/vueElementaire_vuePromo.php',						//RESPONSABLE
    'vueElementaire_suiviPromoHebdoResp' => 'vuesElementaires/vueElementaires_Responsable/vueElementaire_suiviPromoHebdoResp.php',
    'vueElementaire_enteteResp' => 'vuesElementaires/vueElementaires_Responsable/vueElementaire_enteteResp.php',
    'vueElementaire_suiviUnEtudiantResp' => 'vuesElementaires/vueElementaires_Responsable/vueElementaire_suiviUnEtudiantResp.php',
    'vueElementaire_suiviPromoMensuelResp' => 'vuesElementaires/vueElementaires_Responsable/vueElementaire_suiviPromoMensuelResp.php'
);

// Feuilles de styles utilisees pour la mise en forme des vues
$feuillesDeStyle = array('styleAdmin' => 'feuillesDeStyle/styleAdmin.css',
    'styleResp' => 'feuillesDeStyle/styleResp.css',
    'styleEtud' => 'feuillesDeStyle/styleEtud.css',
    'datatable1' => 'feuillesDeStyle/table/demo_page.css',
    'datatable2' => 'feuillesDeStyle/table/demo_table.css',
    'datatable3' => 'feuillesDeStyle/table/demo_table_jui.css');

// ACTIONS 
// Pour chaque action on donne son nom et le fichier qui l'implemente

$action_initiale = 'action_initialiser';

$action_si_enchainement_invalide = 'action_enchainementInvalide';

$actions = array('action_initialiser' => 'actions/action_initialiser.php',
    'action_afficherPromoAdmin' => 'actions/actions_Administration/action_afficherPromoAdmin.php', 					//actions admin
	'action_Connexion' => 'actions/action_Connexion.php',
	'action_choixPromo' => 'actions/action_choixPromo.php',
    'action_enchainementInvalide' => 'actions/actions_Administration/action_enchainementInvalide.php',
    'action_afficherEntAdmin' => 'actions/actions_Administration/action_afficherEntAdmin.php',
    'action_afficherEnsAdmin' => 'actions/actions_Administration/action_afficherEnsAdmin.php',
    'action_afficherPermAdmin' => 'actions/actions_Administration/action_afficherPermAdmin.php',
    'action_completerBaseEntAdmin' => 'actions/actions_Administration/action_completerBaseEntAdmin.php',
    'action_viderBaseEntAdmin' => 'actions/actions_Administration/action_viderBaseEntAdmin.php',
    'action_ajouterEnsAdmin' => 'actions/actions_Administration/action_ajouterEnsAdmin.php',
    'action_formEnsAdmin' => 'actions/actions_Administration/action_formEnsAdmin.php',
    'action_enregistrerNouvelAdmin' => 'actions/actions_Administration/action_enregistrerNouvelAdmin.php',
    'action_enregistrerPromoAdmin' => 'actions/actions_Administration/action_enregistrerPromoAdmin.php',
    'action_enregistrerPromoDUAdmin' => 'actions/actions_Administration/action_enregistrerPromoDUAdmin.php',
    'action_enregistrerPromoDUTAdmin' => 'actions/actions_Administration/action_enregistrerPromoDUTAdmin.php',
    'action_enregistrerPromoLPAdmin' => 'actions/actions_Administration/action_enregistrerPromoLPAdmin.php',
    'action_importerEtudDUTAdmin' => 'actions/actions_Administration/action_importerEtudDUTAdmin.php',
    'action_importerEtudLPAdmin' => 'actions/actions_Administration/action_importerEtudLPAdmin.php',
    'action_importerEtudDUAdmin' => 'actions/actions_Administration/action_importerEtudDUAdmin.php',
    'action_afficherListeEtudDUTAdmin' => 'actions/actions_Administration/action_afficherListeEtudDUTAdmin.php',
    'action_afficherListeEtudLPAdmin' => 'actions/actions_Administration/action_afficherListeEtudLPAdmin.php',
    'action_afficherListeEtudDUAdmin' => 'actions/actions_Administration/action_afficherListeEtudDUAdmin.php',
    'action_definirCommeDemissionnaire' => 'actions/actions_Administration/action_definirCommeDemissionnaire.php',
    'action_supprimerEntAdmin' => 'actions/actions_Administration/action_supprimerEntAdmin.php',
    'action_modifierEntAdmin' => 'actions/actions_Administration/action_modifierEntAdmin.php',	
    'action_enregistrerModifEntreprise' => 'actions/actions_Administration/action_enregistrerModifEntreprise.php',	
    'action_enregistrerEtudiantDUT' => 'actions/actions_Administration/action_enregistrerEtudiantDUT.php',	
    'action_enregistrerEtudiantLP' => 'actions/actions_Administration/action_enregistrerEtudiantLP.php',	
    'action_enregistrerEtudiantDU' => 'actions/actions_Administration/action_enregistrerEtudiantDU.php',	
    'action_supprimerEnseignantAdmin' => 'actions/actions_Administration/action_supprimerEnseignantAdmin.php',	
    'action_afficherMonSuivi' => 'actions/actions_Etudiant/action_afficherMonSuivi.php', 							//actions etudiant
    'action_afficherDetailEntreprise' => 'actions/actions_Etudiant/action_afficherDetailEntreprise.php',
    'action_afficherFormAjout' => 'actions/actions_Etudiant/action_afficherFormAjout.php',
    'action_afficherPromo' => 'actions/actions_Etudiant/action_afficherPromo.php',
    'action_afficherVueEntrepriseEtud' => 'actions/actions_Etudiant/action_afficherVueEntrepriseEtud.php',
    'action_afficherVueMensuelle' => 'actions/actions_Etudiant/action_afficherVueMensuelle.php',
    'action_ajouterDémarche' => 'actions/actions_Etudiant/action_ajouterDémarche.php',
    'action_modifierDemarcheEtudiant' => 'actions/actions_Etudiant/action_modifierDemarcheEtudiant.php',
    'action_supprimerDémarche' => 'actions/actions_Etudiant/action_supprimerDémarche.php',
    'action_validerAjoutDémarche' => 'actions/actions_Etudiant/action_validerAjoutDémarche.php',
    'action_validerModifDémarche' => 'actions/actions_Etudiant/action_validerModifDémarche.php',
    'action_validerSuppression' => 'actions/actions_Etudiant/action_validerSuppression.php',
    'action_suppressionDemarcheEntrepriseEtudiant' => 'actions/actions_Etudiant/action_suppressionDemarcheEntrepriseEtudiant.php',
    'action_ajouterDemarche' => 'actions/actions_Etudiant/action_ajouterDemarche.php',
    'action_suppressionDemarcheEtudiant' => 'actions/actions_Etudiant/action_suppressionDemarcheEtudiant.php',                                                  // actions responsable
    'action_afficherSuiviPromoHebdoResp' => 'actions/actions_Responsable/action_afficherSuiviPromoHebdoResp.php',
    'action_afficherSuiviUnEtudiantResp' => 'actions/actions_Responsable/action_afficherSuiviUnEtudiantResp.php',
    'action_afficherSuiviPromoMensuelResp' => 'actions/actions_Responsable/action_afficherSuiviPromoMensuelResp.php',
    'action_enregistrerCommentaire' => 'actions/actions_Responsable/action_enregistrerCommentaire.php',
    'action_changerEtatValidation' => 'actions/actions_Responsable/action_changerEtatValidation.php'
);

// ETATS
// On definit l'etat initial de l'application puis
// Pour chaque etat on donne son nom et la liste des actions autorisees
// lorsque l'application est dans cet etat

$etat_initial = 'etat_authentification';

$etats = array();

$etats['etat_authentification'] = array(
    'modeleVueAafficher' => 'modeleVue',
    'actionsAutorisees' => array('action_initialiser', 'action_Connexion','action_afficherPromoAdmin', 'action_afficherMonSuivi','action_afficherSuiviPromoHebdoResp','action_choixPromo'));

$etats['etat_A_Promotions'] = array(
    'modeleVueAafficher' => 'modeleVue',
    'actionsAutorisees' => array('action_initialiser', 'action_afficherEntAdmin', 'action_definirCommeDemissionnaire', 'action_afficherPromoAdmin', 'action_importerEtudDUTAdmin', 'action_importerEtudLPAdmin', 'action_importerEtudDUAdmin', 'action_afficherListeEtudDUTAdmin', 'action_afficherListeEtudLPAdmin', 'action_afficherListeEtudDUAdmin', 'action_enregistrerPromoDUAdmin', 'action_enregistrerPromoDUTAdmin', 'action_enregistrerPromoLPAdmin', 'action_afficherEnsAdmin', 'action_afficherPermAdmin', 'action_enregistrerPromoAdmin','action_enregistrerEtudiantDUT','action_enregistrerEtudiantDU', 'action_enregistrerEtudiantLP' ));

$etats['etat_A_Entreprises'] = array(
    'modeleVueAafficher' => 'modeleVue',
    'actionsAutorisees' => array('action_initialiser', 'action_afficherEntAdmin', 'action_afficherPromoAdmin', 'action_afficherEnsAdmin', 'action_afficherPermAdmin', 'action_completerBaseEntAdmin', 'action_viderBaseEntAdmin','action_supprimerEntAdmin','action_modifierEntAdmin', 'action_enregistrerModifEntreprise'));

$etats['etat_A_Enseignants'] = array(
    'modeleVueAafficher' => 'modeleVue',
    'actionsAutorisees' => array('action_initialiser', 'action_afficherEntAdmin', 'action_afficherPromoAdmin', 'action_afficherEnsAdmin', 'action_afficherPermAdmin', 'action_ajouterEnsAdmin', 'action_formEnsAdmin', 'action_enregistrerNouvelAdmin','action_supprimerEnseignantAdmin'));

$etats['etat_E_SuiviPromotion'] = array(
    'modeleVueAafficher' => 'modeleVue',
    'actionsAutorisees' => array('action_initialiser', 'action_afficherMonSuivi', 'action_afficherPromo','action_ajouterDemarche', 'action_afficherVueEntrepriseEtud'));

$etats['etat_E_SuiviEtudiant'] = array(
    'modeleVueAafficher' => 'modeleVue',
    'actionsAutorisees' => array('action_initialiser', 'action_afficherMonSuivi','action_ajouterDemarche', 'action_afficherPromo', 'action_afficherVueEntrepriseEtud','action_suppressionDemarcheEtudiant','action_ajouterDémarche','action_afficherFormAjout','action_modifierDemarcheEtudiant','action_afficherDetailEntreprise','action_suppressionDemarcheEntrepriseEtudiant'));

$etats['etat_R_SuiviPromotion'] = array(
    'modeleVueAafficher' => 'modeleVue',
    'actionsAutorisees' => array('action_initialiser','action_afficherSuiviPromoHebdoResp','action_afficherSuiviPromoMensuelResp','action_afficherSuiviUnEtudiantResp'));

$etats['etat_R_SuiviPersoEtudiant'] = array(
    'modeleVueAafficher' => 'modeleVue',
    'actionsAutorisees' => array('action_initialiser','action_afficherSuiviPromoHebdoResp', 'action_afficherSuiviPromoMensuelResp','action_afficherSuiviUnEtudiantResp','action_enregistrerCommentaire','action_changerEtatValidation'));
	
	
	
// AUTRES PARAMETRES   
// Titre general de l'application
$titreApplication = 'Gomamosa';


// configuration de l'affichage  des erreurs/warning de php
// En phase de developpement :
ini_set("error_reporting", E_ALL ^ E_NOTICE);  // afficher toutes les erreurs (E_All) sauf (^) les notices (E_NOTICE)
// En phase de release :
// ini_set("error_reporting",0); 
?>
