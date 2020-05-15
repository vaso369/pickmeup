<?php
require_once "../config/connection.php";
header("Content-type:application/json");
$code=404;
$data=null;
if(isset($_POST['send'])){
    $trId=$_POST['trId'];
    $usrId=$_POST['usrId'];
    $adresa=$_POST['adress'];
    $upit="INSERT INTO transport_passenger VALUES ($trId,$usrId,'$adresa');UPDATE transports SET seatNumbers=seatNumbers-1 WHERE id=$trId";
        $stat=$conn->prepare($upit);
        try{
            $code=$stat->execute()?201:500;
        }
        catch(PDOException $e){
          echo $e->getMessage();
            $code=409;
            catchErrors("joinTransport.php ->".$e->getMessage());
        }
    }
    http_response_code($code);
    echo json_encode($data);