<?php
require_once "../config/connection.php";
header("Content-type:application/json");
$code=404;
$data=null;
if(isset($_POST['send'])){
    $idUni=$_POST['idUni'];
    $idUsr=$_POST['idUsr'];
    $goingFrom=$_POST['goingFrom'];
    $datum=$_POST['datum'];
    $vreme=$_POST['vreme'];
    $brojSedista=$_POST['brojSedista'];
    $dodatno=$_POST['dodatno'];
    $upit="INSERT INTO transports VALUES (NULL,'$goingFrom','$datum','$vreme',$brojSedista,$idUsr,$idUni,'$dodatno')";
        $stat=$conn->prepare($upit);
        try{
            $code=$stat->execute()?201:500;
        }
        catch(PDOException $e){
          echo $e->getMessage();
            $code=409;
            catchErrors("offerTransport.php ->".$e->getMessage());
        }
    }
    http_response_code($code);
    echo json_encode($data);