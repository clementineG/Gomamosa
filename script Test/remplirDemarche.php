<?php

function randomDate($startDate,$endDate){
    $days = round((strtotime($endDate) - strtotime($startDate)) / (60 * 60 * 24));
    $n = rand(0,$days);
    return date("Y-m-d",strtotime("$startDate + $n days"));    
}

function remplirDemarche(){
$tabEtud=array('bachigar','cgourp','lmoyen','msanche9','cmagre1','msibe1','mcapdev6','fgaultie','cdavid4','afeldis','aolaizol','vbouziat','vcordobe','ldumouch');

	// Connexion BD
    // Parametres de connexion a la base de donnees
    $bd = array('sgbd'=>'mysql',
               'login'=>'root', 
               'motdepasse'=>'pwd',
               'host'=>'localhost',
               'nomBase'=>'gomamosa');
    $_SESSION['bd']=$bd;
    $dns = $bd['sgbd'] . ':host=' . $bd['host'] . ';dbname=' . $bd['nomBase'];
    // Connexion au SGBD
    $connexion = new PDO($dns, $bd['login'], $bd['motdepasse']);
	
	
	$i=0;
	while($i!=300){
		//Selection de la forme de démarche
			$selec = rand(1,4);
			switch($selec){
				case 1:
			
					$forme="mail";
					break;
						
				case 2:
					
					$forme="tel";
					break;
					
				case 3:
			
					$forme="fax";
					break;
                                case 4:
			
					$forme="rdv";
					break;
					
			}
		
		//Selection de l'état de la démarche
			$selec = rand(1,2);
			switch($selec){
				case 1:
					
					$etat="Abandonnée";
					break;
						
				case 2:
					
					$etat="En cours";
					break;
				
			}
			
		//Selection de la date
			$date=randomDate('2012-11-19', '2013-03-04'); // a fixer
			
		//Selection de la date de relance
			$dateRelance=randomDate($date,'2013-03-04'); // a fixer
			
		//Selection d'une entreprise
			$entreprise= rand(1,105); //a fixer
		
		//Selection d'un étudiant
			$etudiant= rand(0, 13); //a fixer
			$etudiant=$tabEtud[$etudiant];
		//Sélection d'un contact
			$contact= rand(1 , 8); //a fixer
			
		// requete d'insertion
			$connexion->query("INSERT INTO demarche VALUES('','$forme','$etat','','$date','$dateRelance','$contact','$entreprise','$etudiant',0)");
			$i++;
	}		
}
remplirDemarche();
?>