<?php
function viderEntreprise($connexion){
		
		//cr�ation de la requete
		$requete = "TRUNCATE TABLE entreprise";
		
		// utilisation de la requ�te sur la base de donn�es
		$connexion ->query($requete);
		
}
?>
