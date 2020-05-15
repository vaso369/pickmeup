<?php 
require_once "../config/connection.php";
echo "radi";
session_start(); 
if(isset($_POST['btnLogin'])){
		
    $username=$_POST["usernameLogin"];
    $pass=md5($_POST["passLogin"]);
    $upit="SELECT u.id,u.email,u.username,u.fname,u.lname,p.part,u.idPart FROM users u INNER JOIN parts p ON u.idPart=p.id WHERE u.username=:username AND u.pass=:pass";
    $stmt=$conn->prepare($upit);
    $stmt->bindParam(":username",$username);
    $stmt->bindParam(":pass",$pass);
    try{
    $stmt->execute();
    
    $user=$stmt->fetch();
   
    if($user){
        $upit2="UPDATE users SET active=1 WHERE username=:username AND pass=:pass";
        $statement=$conn->prepare($upit2);
        $statement->bindParam(":username",$username);
        $statement->bindParam(":pass",$pass);
        $statement->execute();
        $_SESSION["user_name"] = $user->fname;
        $_SESSION['username'] = $user->username;
        $_SESSION['userPassCrypt'] = $user->pass;
        $_SESSION["user_id"] = $user->id;
        $_SESSION['user']=$user;
        $_SESSION['userPart']=$user->idPart;
        $_SESSION['userPass']=$_POST["passLogin"];
        if($user->idPart == 1){
            header("Location: index.php?page=admin");
        } else {
            header("Location: index.php?page=login");
            
        }
    }
    else{
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'auditorne.php@gmail.com';
        $mail->Password = 'Sifra123';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('mediumteam44@gmail.com', 'Atention');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject= "Atention";
        $mail->Body = "Someone has tried to login in your account,
       please change password";
        $mail->send();
        header("Location:../../index.php?page=home");
    }
}
catch(PDOException $ex){
    http_response_code(500);
    echo json_encode(['Greska' => "Greska". $ex->getMessage()]);
    catchErrors("login.php ->".$ex->getMessage());
}