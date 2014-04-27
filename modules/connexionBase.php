<?php
function connexionBase(){
// Connexion BD
    // Parametres de connexion a la base de donnees
    $bd = array('sgbd'=>'mysql',
               'login'=>'root', 
               'motdepasse'=>'',
               'host'=>'localhost',
               'nomBase'=>'gomamosa');
    $_SESSION['bd']=$bd;
    $dns = $bd['sgbd'] . ':host=' . $bd['host'] . ';dbname=' . $bd['nomBase'];
    // Connexion au SGBD
    $connexion = new PDO($dns, $bd['login'], $bd['motdepasse']);
    return $connexion;
}
?>
    