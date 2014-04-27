<div id="logo"> 
    <a href="controleur.php?action=action_afficherMonSuivi"><h1> Gomamosa </h1></a>
</div>

<div id="utilisateur"> 
    <h1> Etudiant </h1>
</div>	

<div id="nom">
	<?php echo '<img style=" width:15%;" src="./images/user.png"> '.$_SESSION['prenomUtilisateur']."<br />"; 

	 echo $_SESSION['nomUtilisateur']."<br />"; ?>
</div>

<div id="deconnexion">
    <a href="controleur.php?action=action_initialiser"><img style=" width:12%;" src="./images/deco.png"> Déconnexion</a>
</div>

<nav>
    <ul>
        <li><a href="controleur.php?action=action_afficherMonSuivi">Consulter mon suivi</a></li>
        <li><a href="controleur.php?action=action_afficherPromo">Consulter l'avancement de la promotion</a></li>
    </ul>
</nav>