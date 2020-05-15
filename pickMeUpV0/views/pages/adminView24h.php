<?php
require_once "models/functions.php";
$niz=pagePercents();
    ?>
<div id="stat24">
<div id="headingAdm"><p><strong>PAGE PERCENTS</strong></p></div>
<p class="pages">Page <strong>REGISTER</strong> : <?=$niz[0];?>%</p>
<p class="pages">Page <strong>EDIT</strong> : <?=$niz[1];?>%</p>
<p class="pages">Page <strong>LOGIN</strong> : <?=$niz[2];?>%</p>
<p class="pages">Page <strong>FIND</strong> : <?=$niz[3];?>%</p>
<p class="pages">Page <strong>OFFER</strong> : <?=$niz[4];?>%</p>
<p class="pages">Page <strong>ABOUT</strong> : <?=$niz[5];?>%</p>
<p class="pages">Page <strong>HOME</strong> : <?=$niz[6];?>%</p>
<p class="pages">Page <strong>ADMIN</strong> : <?=$niz[7];?>%</p>
</div>