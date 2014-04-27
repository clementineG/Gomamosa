<?php

// -------------------------------------------------------
// R?cup?rer les donn?es d'entr?es n?cessaires a? l'action
// -------------------------------------------------------
// aucune donn?e n?cessaire
// -------------------------------------------------------
// Ex?cuter l'action
// -------------------------------------------------------

// Eléments d'identification LDAP
$monDN = "ou=people, dc=univ-pau, dc=fr";

// $serveurLDAP = "ldap.univ-pau.fr"; // annuaire LDAP de l'université non accessible depuis Iparla (mais accessible depuis Larrun)
$serveurLDAP = "mendibel.iutbayonne.univ-pau.fr"; // réplica de annuaire LDAP de l'UPPA hébergé sur Mendibel (accessible depuis Iparla)

$login='etchever';

$ds = ldap_connect ($serveurLDAP);

if ($ds){
   
   $uid="(&(supannetudiplome={SISE}9012335)(supannetucursusannee={SUPANN}X1))";
   $sr = ldap_search ($ds, $monDN, $uid);
   $info = ldap_get_entries ($ds, $sr);
  
	$connexion=connexionBase();
	
for ($i=0; $i<$info["count"]; $i++){
    
    $login=$info[$i]["uid"][0]; 			//log
    $nom=$info[$i]["sn"][0];			//nom
    $prenom=$info[$i]["givenname"][0];		//prenom

	$connexion->query("INSERT INTO etudiant VALUES('$login','$nom','$prenom',0,'DU')");
	
   }
      

     ldap_close ($ds);
}
else
{
    $notification= "Impossible de se connecter au serveur LDAP, la promotion de DU TIC n'a pas pu être importé.";
}




$notification="La promotion de DU TIC a bien été modifiée";

// -------------------------------------------------------
// D?finir le nouvel ?tat de l'application
// -------------------------------------------------------
$_SESSION['etat'] = 'etat_A_Promotions';
// Définition des données dynamiques de la vue.
$donneesVue['notification'] = $notification;
// D?finition des donn?es structurelles de la vue
$donneesVue['titre'] = $titreApplication;
$donneesVue['zone_haute'] = $vuesElementaires['vueElementaire_enteteAdmin'];
$donneesVue['zone_notif'] = $vuesElementaires['vueElementaire_notification'];
$donneesVue['zone_principale'] = $vuesElementaires['vueElementaire_promoAdmin'];
$donneesVue['style'] = $feuillesDeStyle['styleAdmin'];

// Enregistrement des donn?es de la vue dans la session
$_SESSION['donneesVue'] = $donneesVue;
?>	