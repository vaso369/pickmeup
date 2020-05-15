<?php
function last24() {
 $date = date('d-m-Y H:i:s');
 $niz=[];
$nizOdDatuma=explode(" ",$date);
$datum=$nizOdDatuma[0];
$datumNiz=explode(".",$datum);
$datumDan=(int)$datumNiz[0];
$nas_fajl="log.txt";
$sadrzaj=@fopen($nas_fajl,"r");
$brojRedova=count($sadrzaj);
for(i=0;i<$brojRedova;i++){
    $razdvojen=explode("\t",$sadrzaj[$i]);
    $datumLog=(int)$razdvojen[1];
    if($datumLog==$datumDan){
        array_push($niz,$sadrzaj[i]);
    }
}
return $niz;
}