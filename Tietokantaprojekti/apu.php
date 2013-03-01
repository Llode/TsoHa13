<?php

require_once 'luokat/Kyselyt.php';
require_once 'luokat/Sessio.php';

function ohjaa($osoite) {
    header("Location: $osoite");
    exit;
}

function kirjautunut() {
    global $Sessio;
    return isset($Sessio->kayttaja_ID);
}

function varmistus() {
    if (!kirjautunut()) {
        ohjaa('index.php');
    }
}
//function oikkavarmistus() {
//    $lupa = $kyselija->haeKayttajanOikeudet($Sessio->kayttaja_ID);
//    if($lupa === 0) {
//        ohjausmsg();
//        ohjaa('drinkkilista.php');
//    }
//}

?>
