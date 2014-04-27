<?php
include ("/modules/jpgraph-3.5.0b1/src/jpgraph.php");
include ("/modules/jpgraph-3.5.0b1/src/jpgraph_line.php");
 $log=$_SESSION['loginEt'];


// requetes
$connexion=  connexionBase();
$selectPromo="SELECT nomProm FROM etudiant WHERE login='$log'";
$resultat = $connexion->query($selectPromo);
$resultat->setFetchMode(PDO::FETCH_OBJ);
$ligne = $resultat->fetch();
$nomProm = $ligne->nomProm;
$selectDateDeb="SELECT dateDebut FROM promotion WHERE nomProm='$nomProm'";
$resultatdate = $connexion->query($selectDateDeb);
$resultatdate->setFetchMode(PDO::FETCH_OBJ);
$ligne = $resultatdate->fetch();
$dateDebut = $ligne->dateDebut;
$reqNB="SELECT COUNT(code) FROM demarche WHERE (loginEtud='$log') AND ( date between '$dateDebut' AND  '$dateFin')";
$resultatnb = $connexion->query($reqNB);
$resultatnb->setFetchMode(PDO::FETCH_OBJ);
$ligne = $resultatnb->fetch();
$nbDem = $ligne->code;


 $ydata = $_SESSION['tabDemarches'];
//
//$ydata = array(0,3,2,8,4,1,0,6,5,2);

// Creation du graphique
$graph = new Graph(300,200); 
$graph->SetScale("textlin");

// Création du système de points
$lineplot=new LinePlot($ydata);

// On rajoute les points au graphique
$graph->Add($lineplot);

// Affichage
$graph->Stroke();

?>