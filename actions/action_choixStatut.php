<?php
$login=$_SESSION['loginUtilisateur'];


switch($statut){
case 'administrateur':
					$notification="Bonjour, vous êtes correctement connecté en tant qu'administrateur";
                    // -------------------------------------------------------
                    // Définir le nouvel état de l'application
                    // -------------------------------------------------------
                    $_SESSION['etat'] = 'etat_A_Promotions';
                    // Définition des données dynamiques de la vue.
                    $donneesVue['notification'] = $notification;
                    // Définition des données structurelles de la vue
                    $donneesVue['titre'] = $titreApplication;
                    $donneesVue['zone_haute'] = $vuesElementaires['vueElementaire_enteteAdmin'];
                    $donneesVue['zone_notif'] = $vuesElementaires['vueElementaire_notification'];
                    $donneesVue['zone_principale'] = $vuesElementaires['vueElementaire_promoAdmin'];
                    $donneesVue['style'] = $feuillesDeStyle['styleAdmin'];


break;

case 'responsable':
					$connexion=connexionBase();
					$reqNbPromo="SELECT nom FROM promotion WHERE loginResp='$login'";
					$result=$connexion->query($reqNbPromo);
					$nbResp = $result->rowCount();
					
					$result->setFetchMode(PDO::FETCH_OBJ);
					$ligne=$result->fetch();
					$statut=$ligne->nom;
							
					if($nbResp==1){
					$_SESSION['statut']=$statut;
					$notification = "Bonjour, vous vous êtes correctement connecté en tant que responsable";
                    // -------------------------------------------------------
                    // Définir le nouvel ?tat de l'application
                    // -------------------------------------------------------
                    $_SESSION['etat'] = 'etat_R_SuiviPromotion';
                    // Définition des données dynamiques de la vue.
                    $donneesVue['notification'] = $notification;
                    // Définition des données structurelles de la vue
                    $donneesVue['titre'] = $titreApplication;
                    $donneesVue['zone_haute'] = $vuesElementaires['vueElementaire_enteteResp'];
                    $donneesVue['zone_notif'] = $vuesElementaires['vueElementaire_notification'];
                    $donneesVue['zone_principale'] = $vuesElementaires['vueElementaire_suiviPromoHebdoResp'];
                    $donneesVue['style'] = $feuillesDeStyle['styleResp'];
					}
					else{
		     		// -------------------------------------------------------
                    // Définir le nouvel ?tat de l'application
                    // -------------------------------------------------------
                    $_SESSION['etat'] = 'etat_authentification';
                    // Définition des données dynamiques de la vue.
                    $donneesVue['notification'] = $notification;
                    // Définition des données structurelles de la vue
                    $donneesVue['titre'] = $titreApplication;
                    $donneesVue['zone_haute'] = $vuesElementaires['vueElementaire_enteteAvantCo'];
                    $donneesVue['zone_notif'] = $vuesElementaires['vueElementaire_notification'];
                    $donneesVue['zone_principale'] = $vuesElementaires['vueElementaire_choixPromo'];
                    $donneesVue['style'] = $feuillesDeStyle['styleAdmin'];
					
					}
break;


?>



