<?php

function randomDate($startDate,$endDate){
    $days = round((strtotime($endDate) - strtotime($startDate)) / (60 * 60 * 24));
    $n = rand(0,$days);
    return date("Y-m-d",strtotime("$startDate + $n days"));    
}

function remplirCommentaire(){
$tabEtud=array('bachigar','cgourp','lmoyen','msanche9','cmagre1','msibe1','mcapdev6','fgaultie','cdavid4','afeldis','aolaizol','vbouziat','vcordobe','ldumouch');
$tabComment=array('Tu devrais faire plus d�marches par t�l�phone','Actualise ton tableau de bord d�s que tu auras la r�ponse de ton entretient!','N\'oublies pas de relancer Total pour �tre sur de leur position pour ce stage','Tu devrais renvoyer un mail aux entreprises dont tu n\'as pas de nouvelles',' Consid�rant la date actuelle, je pense que tu as du retard sur les recherches de stages! Il faut r�agir!','Il ne reste que 3 semaines pour valider les stages, il faut faire plus de recherches pour avoir des r�sultats');
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
	while($i!=30){
	
		//Selection d'un commentaire
			$comment= rand(0, 5); //a fixer
			$comment=$tabComment[$comment];
			
		//Selection de la date
			$date=randomDate('2012-11-19', '2013-03-04'); // a fixer
		
		// D�finition Responsable
		$loginresp='etchever';
		
		//Selection d'un �tudiant
			$etudiant= rand(0, 13); //a fixer
			$etudiant=$tabEtud[$etudiant];
		
			
		// requete d'insertion
			$connexion->query("INSERT INTO commenter VALUES('','$comment','$date','$loginresp','$etudiant')");
			$i++;
	}		
}
remplirCommentaire();
?>