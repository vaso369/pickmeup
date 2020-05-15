<?php

$menu = executeQuery("SELECT * FROM menu");

foreach($menu as $item):
?>


<li><?=$item->fafa?>&nbsp;<strong><a href="index.php?page=<?=$item->page?>" class="<?=$item->class?>"><?=$item->item?></a></strong></li>


<?php endforeach; ?>