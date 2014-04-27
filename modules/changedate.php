<?php

function changedateusfr($dateus) {
    $datefr = $dateus{8} . $dateus{9} . "-" . $dateus{5} . $dateus{6} . "-" . $dateus{0} . $dateus{1} . $dateus{2} . $dateus{3};
    return $datefr;
}

function changedatefrus($datefr) {
    $dateus = $datefr{6} . $datefr{7} . $datefr{8} . $datefr{9} . "-" . $datefr{3} . $datefr{4} . "-" . $datefr{0} . $datefr{1};
    return $dateus;
}

function changedatefrTab($dateus) {
    $datefr = $dateus{8} . $dateus{9} . "-" . $dateus{5} . $dateus{6} . "-" . $dateus{0} . $dateus{1} . $dateus{2} . $dateus{3};
    $dateShort = $datefr{0} . $datefr{1} . "/" . $datefr{3} . $datefr{4};
    return $dateShort;
}

function lundiCorrespondantFr($date1) {
    $j = $date1{0} . $date1{1};
    $m = $date1{3} . $date1{4};
    $an = $date1{6} . $date1{7} . $date1{8} . $date1{9};
    //num du jour
    $numJour = date('w', mktime(0, 0, 0, $m, $j, $an));

    $dateLundi = $date1;
    if ($numJour != 1) {
        // recup du lundi precedent
        $dateLundi = date('d-m-Y', mktime(0, 0, 0, date('m'), date('d') - date('N') + 1, date('Y')));
    }
    $dateLundi = changedatefrus($dateLundi);
    return $dateLundi;
}

function moisDepuisDate($date1) {

// Traitement Mois! récup de du mois en Francais
    $mois = explode('-', $date1);
    $mois = $mois[1];

    switch ($mois) {
        case '01':
            $moisOK = "Janvier";
            break;
        case '02':
            $moisOK = "Février";
            break;
        case '03':
            $moisOK = "Mars";
            break;
        case '04':
            $moisOK = "Avril";
            break;
        case '05':
            $moisOK = "Mai";
            break;
        case '06':
            $moisOK = "Juin";
            break;
        case '07':
            $moisOK = "Juillet";
            break;
        case '08':
            $moisOK = "Août";
            break;
        case '09':
            $moisOK = "Septembre";
            break;
        case '10':
            $moisOK = "Octobre";
            break;
        case '11':
            $moisOK = "Novembre";
            break;
        case '12':
            $moisOK = "Décembre";
            break;
    }

    return $moisOK;
}

function diffDates($date1, $date2) {
    $datetime1 = new DateTime($date1);
    $datetime2 = new DateTime($date2);
    $interval = $datetime1->diff($datetime2);
    return $interval->format('%a');
}

?>
