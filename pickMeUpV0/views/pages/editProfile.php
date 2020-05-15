<?php
require_once "models/functions.php";
$user=getOneUser($_SESSION['user_id']);
$pass=$_SESSION['userPass'];
    ?>
<div id="editProfileDiv">
<form id="registerForm2" method="POST">
    <div id="editLevo">
            <label>Your first name</label><br>
            <input type="text" name="fnameEdit" id="tbFnameEdit" value="<?=$user->fname?>" readonly /><br>
            <label>Your last name</label><br>
            <input type="text" name="lnameEdit" id="tbLnameEdit" value="<?=$user->lname?>" readonly /><br>
       
            
            <label>New username</label><br>
            <input type="text" name="usernameEdit" id="tbUsernameEdit" value="<?=$user->username?>"/><br>
            <div class="nevidljivEdit">You have to choose city!</div>
            <label>New password </label><br>
            <input type="password" name="passwordEdit" id="tbPassEdit" value="<?=$pass?>"/><br>
            <div class="nevidljivEdit">You have to choose city!</div>
</div>
<div id="editDesno">
            <label>New email</label><br>
            <input type="text" name="emailEdit" id="tbEmailEdit" value="<?=$user->email?>"/><br>
            <div class="nevidljivEdit">You have to choose city!</div>
            <label>Your city</label><br>
            <select id="ddlCityEdit" name="ddlCityEdit"><br>
                <option value="0" class="others">Choose your city</option>
            <?php
                include "models/getCities.php";
             ?>
     
            </select><br>
            <label>Your university</label><br>
            <select id="ddlUniversityEdit"><br>
            <option value="0" class="others">Choose your university</option>
     

            </select>
            <input type="hidden" id="hiddenId" name="hiddenId" value="<?=$user->id?>"/>
            <input type="hidden" id="hiddenIdCity" name="hiddenIdCity" value="<?=$user->idCity?>"/>
            <input type="hidden" id="hiddenUni" name="hiddenUni" value="<?=$user->idUni?>"/>
            <input type="button" id="btnEdit" name="editProf" value="Save changes"/>
</div>
 </form>

</div>