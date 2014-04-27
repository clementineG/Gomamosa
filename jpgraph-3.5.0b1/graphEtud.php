<?php
include ("/src/jpgraph.php");
include ("/src/jpgraph_line.php");

$ydata = array(8,3,16,2,7,25,16);

// Creation du graphique
$graph = new Graph(650,400); 
$graph->SetScale("textlin");

// Création du système de points
$lineplot=new LinePlot($ydata);


// On rajoute les points au graphique
$graph->Add($lineplot);


// Affichage
$graph->Stroke();

?>