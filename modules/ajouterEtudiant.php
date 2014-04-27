<?php

function ajouterEtudiant($login,$nom,$prenom,$promo){

$connexion=connexionBase();
$connexion->query("INSERT INTO etudiant VALUES('$login','$nom','$prenom',0,'$promo')");
$connexion=null;
}

?>