<?php

require_once 'luokat/Tietokantakysely.php';
require_once 'luokat/Sessio.php';

function ohjaa($osoite) {
    header("Location: $osoite");
    exit;
}

function kirjautunut() {
    global $sessio;
    return isset($sessio->kayttaja_ID);
}

function varmistus() {
    if (!kirjautunut()) {
        ohjaa('kirjautuminen.php');
    }
}

?>
