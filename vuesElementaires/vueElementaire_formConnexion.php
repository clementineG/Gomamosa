<div id=formulaireConnexion>
</br>  
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
<label> Identification ldap </label>
<form method="post" action="controleur.php?action=action_Connexion">
<p>Identifiant : <input type="text" name="login" /></p>
<p>Mot de passe : <input type="password" name="pass" /></p>
<p><input type="submit" /></p>
</form>
</div>

<?php

	// choix de l'interface à ouvrir en cas d'identification correcte (Temporaire)
	echo '<a style="position:absolute; top: 90%; left:15%;" href="controleur.php?action=action_afficherPromoAdmin " > Ouvrir l\'interface administrateur </a>';
        echo '<a style="position:absolute; top: 90%; left:40%;" href="controleur.php?action=action_afficherMonSuivi " > Ouvrir l\'interface étudiant </a>';
       	echo '<a style="position:absolute; top: 90%; left:60%;" href="controleur.php?action=action_afficherSuiviPromoHebdoResp" > Ouvrir l\'interface responsable </a>';




?>