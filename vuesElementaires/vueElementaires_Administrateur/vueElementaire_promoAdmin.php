<!-- Librairies Datepicker -->
<link rel="stylesheet" type="text/css" href="feuillesDeStyle/datepicker/Aristo/Aristo.css">
<script type="text/javascript" src="js/calendrier/jquery-1.8.3.js"></script>
<script type="text/javascript" src="js/calendrier/jquery-ui.js"></script>
<script type="text/javascript" src="modules/calendar.js"></script>

﻿<h2 style=" font-size: 1.3em;">Gestion des promotions </h2>


<!-- ---------- 		DUT INFO		------------ -->
<?php
// Rsécupération des données dans la BD
$connexion=connexionBase();
$reqDateDUT="SELECT * FROM promotion WHERE (nom='DUT')";
$resultats = $connexion->query($reqDateDUT);
$resultats->setFetchMode(PDO::FETCH_OBJ);
$ligne=$resultats->fetch();
$debDUT=$ligne->dateDebut;
$finDUT=$ligne->dateFin;

$connexion=null;
 ?>

<form id="formPromo" class="formGestPromo" method=post action="controleur.php?action=action_enregistrerPromoDUTAdmin"> <br/>
    &nbsp;&nbsp;<span class="serie">DUT informatique</span><br/><br/><br/>
    <table id="formdut">
        <tr>
            <td>Responsable</td>
            <td>
                <select id="respDUT" name="respDUT">
                    <?php RemplirListeEnseignant('DUT') ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Début période recherche</td>
            <td>
                <p><input readonly type="text" value="<?php echo changedateusfr($debDUT)?>" id="debutDUT" name="debutDUT" class="datepicker" /></p>
            </td>
        </tr>
        <tr>
        <tr>
            <td>Fin période recherche</td>
            <td>
                <p><input readonly type="text" value="<?php echo changedateusfr($finDUT)?>" id="finDUT" name="finDUT" class="datepicker" /></p>
            </td>
        </tr>
        <tr colspan=2>
            <td class="impDUT">
                <a style="text-decoration: none;" href="controleur.php?action=action_importerEtudDUTAdmin"><input type="button" value="Importer les étudiants"/></a>
            </td>
        </tr>
        <tr colspan=2>
            <td class="affDUT">
                <a style="text-decoration: none;" href="controleur.php?action=action_afficherListeEtudDUTAdmin"><input type="button" value="Afficher liste des étudiants"/></a>
            </td>
        </tr>
        

    <tr>
        <td class="enrDUT">
            <input type="submit" value="enregistrer"/>
        </td>
    </tr>
</table></br>
</form>


<!-- ---------- 		LP SIL		------------ -->
<form id="formPromo2" class="formGestPromo" method=post action="controleur.php?action=action_enregistrerPromoLPAdmin"> </br>

&nbsp;&nbsp;<span class="serie">LP SIL</span><br/><br/>

<?php
// Rsécupération des données dans la BD
$connexion=connexionBase();
$reqDateDUT="SELECT * FROM promotion WHERE (nom='LP')";
$resultats = $connexion->query($reqDateDUT);
$resultats->setFetchMode(PDO::FETCH_OBJ);
$ligne=$resultats->fetch();
$debLP=$ligne->dateDebut;
$finLP=$ligne->dateFin;

$connexion=null;
 ?>

<table id="formlp">
    <tr>
        <td>Responsable</td>
        <td>
            <select id="respLP" name="respLP">
                <?php RemplirListeEnseignant('LP') ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>Début période recherche</td>
        <td>
            <input readonly type=text value="<?php echo changedateusfr($debLP)?>" name="debutLP" id="debutLP" class="datepicker">
        </td>
    </tr>
    
    <tr>
        <td>Fin période recherche</td>
        <td>
            <input readonly type=text value="<?php echo changedateusfr($finLP)?>" name="finLP" id="finLP" class="datepicker">
        </td>
    </tr>
    <tr colspan=2>
        <td class="impLP">
			<a style="text-decoration: none;" href="controleur.php?action=action_importerEtudLPAdmin"><input type="button" value="Importer les étudiants"></a>
        </td>
    </tr>
    <tr colspan=2>
        <td class="affLP">
            <a style="text-decoration: none;" href="controleur.php?action=action_afficherListeEtudLPAdmin"><input type="button" value="Afficher liste des étudiants"></a>
        </td>
    </tr>
    <tr>
        <td class="enrLP">
            <input type="submit" value="enregistrer"/>
        </td>
    </tr></br>
</table></br>
</form>




<!-- ---------- 		DU TIC		------------ -->
<form id="formPromo3" class="formGestPromo" method=post action="controleur.php?action=action_enregistrerPromoDUAdmin"> </br>

&nbsp;&nbsp;<span class="serie">DU TIC</span><br/><br/><br/>

<?php
// Rsécupération des données dans la BD
$connexion=connexionBase();
$reqDateDUT="SELECT * FROM promotion WHERE (nom='DU')";
$resultats = $connexion->query($reqDateDUT);
$resultats->setFetchMode(PDO::FETCH_OBJ);
$ligne=$resultats->fetch();
$debDU=$ligne->dateDebut;
$finDU=$ligne->dateFin;

$connexion=null;
 ?>

<table id="formdu">
    <tr>
        <td>Responsable</td>
        <td>
            <select id="respDU" name="respDU">
                <?php RemplirListeEnseignant('DU') ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>Début période recherche</td>
        <td>
            <input readonly type=text value="<?php echo changedateusfr($debDU)?>" name="debutDU" id="debutDU" class="datepicker" >
        </td>
    </tr>
    <tr>
    <tr>
        <td>Fin période recherche</td>
        <td>
            <input readonly type=text value="<?php echo changedateusfr($finDU)?>" name="finDU" id="finDU" class="datepicker">
        </td>
    </tr>
    <tr colspan=2>
        <td class="impDU">
			<a style="text-decoration: none;" href="controleur.php?action=action_importerEtudDUAdmin"><input type="button" value="Importer les étudiants"></a>
		</td>
    </tr>
    <tr colspan=2>
        <td class="affDU">
            <a style="text-decoration: none;" href="controleur.php?action=action_afficherListeEtudDUAdmin"><input type="button" value="Afficher liste des étudiants"></a>
        </td>
    </tr>
    <tr>
        <td class="enrDU">
            <input type="submit" value="enregistrer"/>
        </td>
    </tr>
</table></br>

</form>
