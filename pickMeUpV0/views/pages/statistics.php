<?php
require_once "models/functions.php";
$niz=last24();


    ?>
<div id="statistics">
    <div id="heading24"><p><strong>LAST 24h</strong></p></div>
    <p class="pages24">Page <strong>REGISTER</strong> : <?=$niz[0];?> visits</p>
<p class="pages24">Page <strong>EDIT</strong> : <?=$niz[1];?> visits</p>
<p class="pages24">Page <strong>LOGIN</strong> : <?=$niz[2];?> visits</p>
<p class="pages24">Page <strong>FIND</strong> : <?=$niz[3];?> visits</p>
<p class="pages24">Page <strong>OFFER</strong> : <?=$niz[4];?> visits</p>
<p class="pages24">Page <strong>ABOUT</strong> : <?=$niz[5];?> visits</p>
<p class="pages24">Page <strong>HOME</strong> : <?=$niz[6];?> visits</p>
<p class="pages24">Page <strong>ADMIN</strong> : <?=$niz[7];?> visits</p>
</div>