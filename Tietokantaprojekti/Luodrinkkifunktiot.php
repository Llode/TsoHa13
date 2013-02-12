<?php

require_once 'apu.php';

if (trim($_POST['juomannimi']) != "") {
//    if (varmistus) {
    $drinkki = $kyselija->lisaaJuoma($_POST['juomannimi'], $_POST['ohje']);
    
    for ($i = 0, $imax = 10; $i < $imax; $i++) {
        if(trim($_POST['aineennimi'][$i]) != ""){
        $drinkki1 = $kyselija->lisaaJuomaanAines($drinkki, $_POST['aineennimi'][$i], $_POST['aineenmaara'][$i]);
        }
//    } else {
//        ohjaa('Kirjautuminen.php');
    }
    //ohjaa('index.php');
}
?>
