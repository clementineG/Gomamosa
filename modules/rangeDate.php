<?php

function dateRange($first, $last, $step , $format ) { 

    $dates = array();
    $current = strtotime($first);
    $last = strtotime($last);

    while( $current <= $last ) { 

        $dates[] = date($format, $current);
        $current = strtotime($step, $current);
    }

    return $dates;
}

?>
