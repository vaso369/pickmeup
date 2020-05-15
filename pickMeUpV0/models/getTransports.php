<?php
header("Content-type:application/json");
$code=404;
require_once  "../config/connection.php";
$upit="SELECT *,t.id AS idT,us.id AS userId,un.id AS uniId FROM transports t INNER JOIN users us ON t.idDriver=us.id INNER JOIN universities un ON t.idUni=un.id ORDER BY t.id DESC LIMIT 3";
$rezultat=executeQuery($upit);
if($rezultat){
    $code=200;
}
http_response_code(200);
echo json_encode($rezultat);
