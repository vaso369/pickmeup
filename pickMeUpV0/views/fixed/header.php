
<header id="header">
    <div class="wrapper">
        <?php
     
        if(isset($_GET['page'])){
            
            
            $pageH=$_GET['page'];
            if(($pageH!='about')&&($pageH!='register')&&($pageH!='home')):
                ?>
<div id="logo">
     <img src="assets/images/logopickmeup2.svg" alt="Logo pick me up"/>
    </div>
    <?php endif;}?>
            
    
       
    
    <div id="feedbackLogin">Now you can log in...</div>
    <?php
	if(!isset($_SESSION['user'])):
	?>
    <div id="logo">
    <a href="index.php"><img src="assets/images/logopickmeup2.svg" alt="Logo pick me up"/></a>
    </div>
    <div id="login">
        <form id="formLogin" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="text" name="usernameLogin" id="tbUsrLogin" placeholder="username..."/>
            <input type="password" name="passLogin" id="tbPassLogin" placeholder="password..."/>
            <input type="submit" value="Login" id="btnLogin" name="btnLogin"/>
        </form>
    </div>
    </div>
    <?php endif;?>

    
</header>

