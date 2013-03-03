<?php
require_once 'apu.php';
varmistus();
adminvarmistus();

$nimi = $_GET['nimi'];
$Poisto = $kyselija->poistaDrinkki($nimi);

if($kyselija) {
    ohjaa('drinkkilista.php');
}
 else {
die(AAAAAAAAAAA);    
}

?>
