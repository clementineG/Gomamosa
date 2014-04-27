<?php
function ajouterEntrepriseTest($connexion,$nomEnt,$tel,$adresse,$cp,$ville,$pays){
		//cr�ation de la requete
		$requete = "INSERT INTO entreprise VALUES ('','$nomEnt','$adresse','$ville','$cp','$pays');";
		
		// utilisation de la requ�te sur la base de donn�es
		$connexion ->query($requete);
                
                }
?>