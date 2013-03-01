<?php

require_once 'apu.php';

if (trim($_POST['juomannimi']) != "") {

    $drinkki = $kyselija->lisaaJuoma($_POST['juomannimi'], $_POST['ohje']);
    if (trim($_POST['altinnimi']) != "") {
        $drinkki2 = $kyselija->lisaaJuomalleNimi($_POST['juomannimi'], $_POST['altinnimi']);
    }
    for ($i = 0, $imax = 10; $i < $imax; $i++) {
        if (trim($_POST['aineennimi'][$i]) != "") {
            $drinkki1 = $kyselija->lisaaJuomaanAines($drinkki, $_POST['aineennimi'][$i], $_POST['aineenmaara'][$i]);
        }
    }
}
ohjaa('drinkkilista.php');
?>
