<div id="logo"> 
	<a href="controleur.php?action=action_afficherPromoAdmin"><h1> Gomamosa </h1></a>
</div>

<div id="utilisateur"> 
	<a href="controleur.php?action=action_afficherPromoAdmin"><h1> Admin </h1></a>
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
		<li><a href="controleur.php?action=action_afficherPromoAdmin">Promotions</a></li>
		<li><a href="controleur.php?action=action_afficherEntAdmin">Entreprises</a></li>
		<li><a href="controleur.php?action=action_afficherEnsAdmin">Enseignants</a></li>
	</ul>
</nav>