<?php

include ("/modules/jpgraph-3.5.0b1/src/jpgraph.php");
include ("/modules/jpgraph-3.5.0b1/src/jpgraph_line.php");
define('MYSQL_HOST', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PASS', 'pwd');
define('MYSQL_DATABASE', 'test');
$tableauAnnees = array();
$tableauNombreVentes = array();
$moisFr = array(1,2,3,4,5,6,7,8,9,10);
// *********************
// Production de donn�es
// *********************
$sql_ventes_par_mois = <<<EOF
SELECT semaine AS SEMAINE, nbDem  AS NB_DEMARCHE
FROM tablegraph
GROUP BY semaine
LIMIT 0 , 30
EOF;
$mysqlCnx = @mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASS) or die('Pb de connxion mysql');
@mysql_select_db(MYSQL_DATABASE) or die('Pb de s�lection de la base');
// Initialiser le tableau � 0 pour chaques mois ***********************
$tableauVentes2006 = array(0,0,0,0,0,0,0,0,0,0);
$mysqlQuery = @mysql_query($sql_ventes_par_mois, $mysqlCnx) or die('Pb de requ�te');
while ($row_mois = mysql_fetch_array($mysqlQuery, MYSQL_ASSOC)) {
$tableauVentes2006[$row_mois['SEMAINE']-1] = $row_mois['NB_DEMARCHE'];
}
// Contr�ler les valeurs du tableau
// printf('<pre>%s</pre>', print_r($tableauVentes2006,1));
// ***********************
// Cr�ation du graphique
// ***********************
// Cr�ation du conteneur
$graph = new Graph(600,350);
// Fixer les marges
$graph->img->SetMargin(40,30,50,40);
// Mettre une image en fond
//$graph->SetBackgroundImage("white",color);
// Lissage sur fond blanc (�vite la pixellisation)
$graph->img->SetAntiAliasing("white");
// A d�tailler
$graph->SetScale("textlin");
// Ajouter une ombre
$graph->SetShadow();
// Ajouter le titre du graphique
$graph->title->Set("Nombre de d�marche par semaine");
// Afficher la grille de l'axe des ordonn�es
$graph->ygrid->Show();
// Fixer la couleur de l'axe (bleu avec transparence : @0.7)
$graph->ygrid->SetColor('blue@0.7');
// Des tirets pour les lignes
$graph->ygrid->SetLineStyle('dashed');
// Afficher la grille de l'axe des abscisses
$graph->xgrid->Show();
// Fixer la couleur de l'axe (rouge avec transparence : @0.7)
$graph->xgrid->SetColor('red@0.7');
// Des tirets pour les lignes
$graph->xgrid->SetLineStyle('dashed');
// Apparence de la police
$graph->title->SetFont(FF_ARIAL,FS_BOLD,11);
// Cr�er une courbes
$courbe = new LinePlot($tableauVentes2006);
// Afficher les valeurs pour chaque point
$courbe->value->Show();
// Valeurs: Apparence de la police
$courbe->value->SetFont(FF_ARIAL,FS_NORMAL,9);
$courbe->value->SetFormat('%d');
$courbe->value->SetColor("red");
// Chaque point de la courbe ****
// Type de point
$courbe->mark->SetType(MARK_FILLEDCIRCLE);
// Couleur de remplissage
$courbe->mark->SetFillColor("green");
// Taille
$courbe->mark->SetWidth(3);
// Couleur de la courbe
$courbe->SetColor("blue");
$courbe->SetCenter();
// Param�trage des axes
$graph->xaxis->title->Set("Semaine");
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->SetTickLabels($moisFr);
// Ajouter la courbe au conteneur
$graph->Add($courbe);
$graph->Stroke();
?>