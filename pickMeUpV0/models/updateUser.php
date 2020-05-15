<?php
require_once "../config/connection.php";

header("Content-type:application/json");
$code=404;
$data=null;
if(isset($_POST['send'])){

    $id=$_POST['id'];
    require_once "../models/functions.php";
    $user=getOneUser($id);
    $grad=($_POST['city']==$user->idCity)?$user->idCity:$_POST['city'];
    $faks=($_POST['uni']==$user->idUni)?$user->idUni:$_POST['uni'];
    if($faks==0){
        $faks=$user->idUni;
    }
    $email=($_POST['email']==$user->email)?$user->email:$_POST['email'];
   $username=($_POST['username']==$user->username)?$user->username:$_POST['username'];
   
    $pass=(md5($_POST['pass'])==$user->pass)?$user->pass:md5($_POST['pass']);
    


   
        $upit="UPDATE users SET idCity=$grad,idUni=$faks,email='$email',username='$username',pass='$pass' WHERE id=$id";
        $stat=$conn->prepare($upit);
        try{
            $code=$stat->execute()?201:500;
        }
        catch(PDOException $e){
          echo $e->getMessage();
            $code=409;
            catchErrors("updateUser.php ->".$e->getMessage());
        }
    }
http_response_code($code);
echo json_encode($data);
?>