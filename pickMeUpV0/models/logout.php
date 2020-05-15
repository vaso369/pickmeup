<?php 
if(isset($_POST['logout'])){
    session_start();
    $upit3="UPDATE users SET active=0 WHERE username=:username AND pass=:pass";
        $statement2=$conn->prepare($upit3);
        $statement2->bindParam(":username",$_SESSION['username']);
        $statement2->bindParam(":pass",md5($_SESSION['userPass']));
        $izvrseno=$statement2->execute();
       if($izvrseno){
    unset($_SESSION['user']);
    unset($_SESSION['userPart']);
    header("Location:index.php?page=home");
       }
}