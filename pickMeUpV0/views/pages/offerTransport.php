<?php
require_once "models/functions.php";
$user=getOneUser($_SESSION['user_id']); 
?><div id="feedBackOffer"></div>
<input type="hidden" value="<?=$user->id?>" name="hiddenIdUsrOffer" id="hiddenIdUsr"/>
<div id="offerTransport">
    <input type="hidden" value="<?=$user->idUni?>" id="hiddenIdUniOffer"/>
<h3>Please choose and select your transportation info. When someone join to your post, you will get a verification email.
    <p>Going from <input type="text" id="goingFrom" name="goingFrom"/> to <span class="unidIdoferr"><?=$user->userUni?></span>
    <div id="offerInp">
        <i class="fa fa-calendar" aria-hidden="true"></i>
<input type="date" name="datumTransportOffer" id="datumTransportOffer"/>
<i class="fa fa-clock-o" aria-hidden="true"></i>
<input type="time" name="vremeTransportOffer" id="vremeTransportOffer"/>
        <input type="button" name="btnOffer" value="Offer" id="btnOffer"/>  
            <div id="seatNumbers">
            <i class="fa fa-car" aria-hidden="true"></i>  Choose number of seats  : <input type="number" name="numberOffer" id="numberOff" value="0"/>
            </div>
</div>
    
    <div id="additionalInfo">
        <h4>Additional informations for passengers:
            <textarea id="dodatno">
        </textarea>
    </div>
    </div>

</div>