<h2 style=" font-size: 1.3em;">Gestion des entreprises </h2>

<p>Vider la liste d'entreprises et en importer une nouvelle </p></br>
<form id="formVider" ENCTYPE="multipart/form-data" action="controleur.php?action=action_viderBaseEntAdmin" METHOD="POST">
    <input type="file" name="fchNouvelleBase"> 
    <input type="submit" value="Importer une liste">
</form>
</br>
<p>Conserver la liste d'entreprises et la compléter</p> </br>
<form id="formCompleter" ENCTYPE="multipart/form-data" action="controleur.php?action=action_completerBaseEntAdmin" METHOD="POST">
    <input type="file" name="fchCompleteBase"> 
    <input type="submit" value="Importer une liste">
</form>
<h4 style=" font-weight: bold;font-style: oblique;font-size: 1.3em;"> Tableau des entreprises : </h4>
<div class="content_table">
    <table id="table_jquery" class="display">
        <thead>
            <tr>
                <th>Nom entreprise</th>
                <th>Adresse</th>
                <th>Code Postal</th>
                <th>Ville</th>
                <th>Pays</th>
                <th>Opérations</th>
            </tr>
        </thead>
        <tbody>
           <?php affichageEntAdmin(); ?>
        </tbody>
        <?php
        $codeE = $_GET['code'];
        $_SESSION['code'] = $codeE;
        ?>
    </table>
</div>


<?php $_SESSION['donneesVue'] = $donneesVue; ?>