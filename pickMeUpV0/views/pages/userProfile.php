<?php
require_once "models/functions.php";
$user=getOneUser($_SESSION['user_id']);

    ?>
<div id="userProfile">
    <div id="userName">

    <strong><p><i class="fa fa-circle" aria-hidden="true"></i>
<?= $user->username;  ?></p></strong>
    </div>
    <div id="userImage">
        <img src="<?=$user->picture;?>" alt="User profile picture"/>
    </div>
    <div id="addPhoto">
    <form action="models/updatePicture.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" value="<?=$user->id?>" name="userId"/>
    <p class="addPht"><i class="fa fa-camera" aria-hidden="true"></i>Add profile picture:</p><input type="file" name="userPhoto" id="userPhoto"/> 
    </div>
    <div id="userAbout">
        <div class="userLeft">
       <strong><p class="label"><span>Your first name: </span>
           <?= $user->fname;  ?>
       </p> </strong> 
       <strong><p class="label"><span>Your last name:</span> <?= $user->lname;  ?></p> </strong> 
       <strong><p class="label"><span>Your email:</span> <?= $user->email;  ?></p> </strong> 
        </div>  
        <div class="userRight">
        <strong><p class="label"><span>Your city:</span> <?= $user->userCity;  ?></p> </strong> 
        <strong><p class="label"><span>Your university:</span> <?= $user->userUni;  ?></p> </strong> 
        </div>
        <input type="submit" value="Save" id="btnSavePh" name="btnSavePh"/></form>
        <div id="editProfile">
        <a href="index.php?page=edit" class="editPr"><i class="fa fa-edit"></i> Edit your info</a>
        </div>
      

        <?php
	if(isset($_SESSION['user'])):
	?>
	
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<input type="submit" value="Logout" id="dugmeLgo" name="logout"/>
			</form>
	
    <?php endif;?>
   
    </div>
</div>
<div id="exportExcell">
        
        <a href="#">Export all transports to Excell</a>
</div>
