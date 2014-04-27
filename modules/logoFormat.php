<?php
function imageFormatDemarche($img){
    if ($img=='tel')
        $imgFormat='./images/tel.png';
    if($img=='mail')
        $imgFormat='./images/enveloppe.png';
    if($img=='site')
        $imgFormat='./images/site.png';
    if($img=='rdv')
        $imgFormat='./images/rdv.png';
    if($img=='fax')
        $imgFormat='./images/fax.png';
    if($img=='courrier')
        $imgFormat='./images/letter.png';
    if($img=='demission')
        $imgFormat='./images/demission.png';
    
    return $imgFormat;
}
?>
