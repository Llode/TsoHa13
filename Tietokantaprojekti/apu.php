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
        ohjaa('Kirjautuminen.php');
    }
}

?>
