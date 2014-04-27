<?php

// controleur generique

// Initialisation du controleur
include "classeControleur.php";

$controleur = new Controleur("config.php");
// $controleur->activerModeDebug();

// Le controleur identifie l'action demandee par le client
$requeteUtilisateur = $controleur->getRequeteUtilisateur();

// Le controleur determine l'etat courant
$etatCourant = $controleur->getEtatCourant();

if ($controleur->modeDebug())
{
	echo "<font size=1> <b> [mode debug] : Etat courant de l'application : $etatCourant </b></font><br/>";
	echo "<font size=1> <b> [mode debug] : Action demand&eacute;e : $requeteUtilisateur </b></font><br/>";
}

// Le controleur verifie si l'action est valide par rapport a l'etat courant
if (!$controleur->estValide($requeteUtilisateur, $etatCourant)) // enchainement anormal
{
	$validite = "invalide. Compl&eacute;tez le fichier de config ou v&eabruneaucute;rifiez les noms de vos actions.";
	$controleur->DefinirCommeInvalide($requeteUtilisateur);
}
else
$validite = "valide.";

if ($controleur->modeDebug())
	echo "<font size=1> <b> [mode debug] : Dans l'&eacute;tat courant, et selon le fichier config.php, l'action demand&eacute;e est jug&eacute;e $validite</b></font> <br/>";


// Le controleur delegue l'execution de la requete demandee a l'action qui sait faire
$controleur->deleguerTraitementRequete($requeteUtilisateur);

if ($controleur->modeDebug())
	echo "<font size=1> <b> [mode debug] : Execution de l'action demand&eacute;e ...</b></font> <br/>";

// Le controleur determine le nouvel etat courant en fonction de la facon
// dont le traitement de la requete s'est deroulee
$etatCourant = $controleur->getEtatCourant();
if ($controleur->modeDebug())
	echo "<font size=1> <b> [mode debug] : Apr&egrave;s execution le nouvel &eacute;tat de l'application est :   $etatCourant.</b></font> <br/><br/>";


// Le controleur retourne la reponse en fonction du nouvel etat courant
$controleur->retournerVueReponse($etatCourant);
exit (0);
?>


