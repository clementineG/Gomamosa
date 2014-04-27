<?php

	
	$connexion=connexionBase();
	$login=$_SESSION['loginUtilisateur'];
	$DUT="SELECT loginResp FROM promotion WHERE nom='DUT' ";
	$DU="SELECT loginResp FROM promotion WHERE nom='DU' ";
	$LP="SELECT loginResp FROM promotion WHERE nom='LP' ";
	
	$resDUT=$connexion->query($DUT);
	$resDUT->setFetchMode(PDO::FETCH_OBJ);
	$ligne=$resDUT->fetch();
	$resDUT=$ligne->nom;
	
	$resDU=$connexion->query($DU);
	$resDU->setFetchMode(PDO::FETCH_OBJ);
	$ligne=$resDU->fetch();
	$resDU=$ligne->nom;
	
	$resLP=$connexion->query($LP);
	$resLP->setFetchMode(PDO::FETCH_OBJ);
	$ligne=$resLP->fetch();
	$resLP=$ligne->nom;
	
	if($resDUT==$login){
	?> 
	<a style="position:absolute; top: 90%; left:40%;" href="controleur.php?action=action_afficherSuiviPromoHebdoResp&amp;statut=<?php echo'DUT' ?>" > DUT </a> 
	<?php }
	if($resDU==$login) {
	 ?> <a style="position:absolute; top: 90%; left:40%;" href="controleur.php?action=action_afficherSuiviPromoHebdoResp&amp;statut=<?php echo'DU' ?> " > DU </a>
	<?php}
	if($resDUT==$login) {
	 ?> <a style="position:absolute; top: 90%; left:40%;" href="controleur.php?action=action_afficherSuiviPromoHebdoResp&amp;statut=<?php echo'LP' ?> " > LP </a>
	<?php }

?>