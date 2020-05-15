<?php
header("Content-type:application/json");
$code=404;
require_once  "../config/connection.php";
$upit="SELECT *,u.id AS userID,p.id AS partId FROM users u INNER JOIN parts p ON u.idPart=p.id";
$rezultat=executeQuery($upit);
if($rezultat){
    $code=200;
}
http_response_code($code);
echo json_encode($rezultat);
