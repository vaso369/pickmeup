<?php
require_once "models/functions.php";
$user=getOneUser($_SESSION['user_id']);

    ?>
      
     <input type="hidden" value="<?=$user->id?>" name="hiddenIdUsr" id="hiddenIdUsr"/>
   <div id="pagination"></div>
<div id="userHome">
<div id="feedBackJoin"></div>
   
<div class="unvisible">
           <p>Please enter your departure address: <input type="text" id="joinAdr" name="joinAdr"/>
        </div>
</div>