<?php
require_once "../config/connection.php";
header("Content-type:application/json");
$code=404;
if(isset($_POST['send'])){
    $idUni=$_POST['idUni'];
    $datum=$_POST['datum'];
    $vreme=$_POST['vreme'];
    $upit="SELECT *,t.id AS idT,us.id AS userId,un.id AS uniId FROM transports t INNER JOIN users us ON t.idDriver=us.id INNER JOIN universities un ON t.idUni=un.id WHERE t.dateDept='$datum' AND t.timeDept='$vreme' AND t.idUni=$idUni";
$rezultat=executeQuery($upit);
$code=201;
if(count($rezultat)==0){
    $rezultat=executeQuery("SELECT *,t.id AS idT,us.id AS userId,un.id AS uniId FROM transports t INNER JOIN users us ON t.idDriver=us.id INNER JOIN universities un ON t.idUni=un.id WHERE t.idUni=$idUni ORDER BY us.id DESC LIMIT 3");
    $code=202;
}

}
http_response_code($code);
echo json_encode($rezultat);