<?php
function afficherDate($dateUSA){
	// découpe la date
	$date=explode($dateUSA,'-');
	//retourne la nouvelle date
	return $date[2]."/".$date[1];
}


function dateToMonth($dateYmd){
$month=jdmonthname ( cal_to_jd(CAL_GREGORIAN, date("d"),date("m"), date("Y")),0 );

	switch ($month) {
		case 'Jan':
			$month="Janvier";
			break;
		case 'Feb':
			$month="F�vrier";
			break;
		case 'Mar':
			$month="Mars";
			break;
		 case 'Apr':
			$month="Avril";
			break;
		case 'May':
			$month="Mai";
			break;
		case 'Jun':
			$month="Juin";
			break;
		 case 'Jul':
			$month="Juillet";
			break;
		case 'Aug':
			$month="Ao�t";
			break;
		case 'Sep':
			$month="Septembre";
			break;
		 case 'Oct':
			$month="Octobre";
			break;
		case 'Nov':
			$month="Novembre";
			break;
		case 'Dec':
			$month="D�cembre";
			break;
	}


	return $month;
}
?>