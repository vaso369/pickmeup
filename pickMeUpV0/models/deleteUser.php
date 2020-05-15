<?php
require_once "../config/connection.php";
require_once "functions.php";
header("Content-type:application/json");
$code=404;
$data=null;
if(isset($_POST['id'])){
   $id=$_POST['id'];
    $upit="DELETE FROM transport_passenger WHERE idPassenger=$id;DELETE FROM transports WHERE idDriver=$id;DELETE FROM users WHERE id=$id";
        $stat=$conn->prepare($upit);
        try{
            $code=$stat->execute()?201:500;
        }
        catch(PDOException $e){
          echo $e->getMessage();
            $code=409;
            catchErrors("deleteUser.php ->".$e->getMessage());
        }
    }
    http_response_code($code);
    echo json_encode($data);