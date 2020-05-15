<?php
require_once "../config/connection.php";
header("Content-type:application/json");
$code=404;
if(isset($_POST['send'])){
    $id=$_POST['id'];
$upit ="SELECT * FROM universities WHERE idCity=$id";

$rezultat=executeQuery($upit);
$code=200;
echo json_encode($rezultat);
http_response_code($code);
}
