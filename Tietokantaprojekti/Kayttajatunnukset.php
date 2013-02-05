<?php

require_once 'apu.php';

if (isset($_GET['luoTunnus'])) {
    $kayttaja = $kyselija->lisaaKayttajaKantaan($_POST['tunnus'], $_POST['salasana']);
    if ($kayttaja) {
        $Sessio->kayttaja_ID = $kayttaja->id;
        ohjaa('index.php');
    } else {
        ohjaa('tunnustenluonti.php');
    }
    
} elseif (isset($_GET['sisaan'])) {
    $kayttaja = $kyselija->tunnistaKayttaja($_POST['tunnus'], $_POST['salasana']);
    if ($kayttaja) {
        $Sessio->kayttaja_ID = $kayttaja->id;
        ohjaa('index.php');
    } else {
        ohjaa('Kirjautuminen.php');
    }
    
} elseif (isset($_GET['ulos'])) {
    unset($Sessio->kayttaja_ID);
    ohjaa('index.php');
} else {
    die('DERP');
}
?>
