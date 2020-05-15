<?php

$cities = executeQuery("SELECT * FROM cities");

foreach($cities as $city):
?>


<option value="<?= $city->id ?>" class="others"><?= $city->city ?></option>


<?php endforeach; ?>