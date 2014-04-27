<?php
$donneesVue = $_SESSION['donneesVue'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

    <head>
        <title><?php echo $donneesVue['titre'] ?></title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link type="text/css" rel="stylesheet" href="<?php echo $donneesVue['style'] ?>"/>    

        <!-- Librairies pour les tables -->
        <link rel="stylesheet" type="text/css" href="feuillesDeStyle/table/demo_page.css" />
        <link rel="stylesheet" type="text/css" href="feuillesDeStyle/table/demo_table.css" />
        <link rel="stylesheet" type="text/css" href="feuillesDeStyle/table/demo_table_jui.css" />

        <script type="text/javascript" src="js/table/jquery.js"></script>
        <script type="text/javascript" src="js/table/jquery.dataTables.js"></script>
        <script type="text/javascript" src="js/table/util.js"></script>



    </head>



    <body>
        <div id="bloc_haut"> 
            <?php require_once($donneesVue['zone_haute']); ?>
        </div>

        <div id="bloc_notif"> 
            <?php require_once($donneesVue['zone_notif']); ?>
        </div>

        <div id="bloc_principal"> 
            <?php require_once($donneesVue['zone_principale']); ?>
        </div>
    </body>

</html>