<div id="logo"> 
    <a href="controleur.php?action=action_afficherSuiviPromoHebdoResp"><h1> Gomamosa </h1></a>
</div>

<div id="utilisateur"> 
    <a href="controleur.php?action=action_afficherSuiviPromoHebdoResp"><h1> Responsable </h1></a>
</div>	

<div id="nom">
    <?php echo '<img style=" width:15%;" src="./images/user.png"> '.$_SESSION['prenomUtilisateur']; ?></br>

    <?php echo $_SESSION['nomUtilisateur']; ?>
</div>

<div id="deconnexion">
    <a href="controleur.php?action=action_initialiser"><img style=" width:12%;" src="./images/deco.png"> Déconnexion</a>
</div>

