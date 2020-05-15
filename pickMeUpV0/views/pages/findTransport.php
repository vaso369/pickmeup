<?php
require_once "models/functions.php";
$user=getOneUser($_SESSION['user_id']); 
?>
<div id="findTransport">
    <div id="userTransport">
        <input type="hidden" id="idUniFind" name="idUniFind" value="<?=$user->idUni?>"/>
        <p class="userTransportInfo">Please select date. Your search will be based on your university <span><?= $user->userUni?></span></p>
        <div id="transportInp">
        <i class="fa fa-calendar" aria-hidden="true"></i>
<input type="date" name="datumTransport" id="datumTransport"/>
<i class="fa fa-clock-o" aria-hidden="true"></i>
<input type="time" name="vremeTransport" id="vremeTransport"/>
        <input type="button" name="btnTransport" value="Search" id="btnTransport"/>
</div>
    <div id="feedBackSearch"></div>
    </div>
</div>