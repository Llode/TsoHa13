<?php

require_once 'apu.php';

if (isset($_GET['luoTunnus'])) {
    $kayttaja = $kyselija->lisaaKayttajaKantaan($_POST['tunnus'], $_POST['salasana']);
    if ($kayttaja) {
        $sessio->kayttaja_ID = $kayttaja->id;
        ohjaa('index.php');
    } else {
        ohjaa('tunnustenluonti.php');
    }
    
} elseif (isset($_GET['sisaan'])) {
    $kayttaja = $kyselija->tunnistaKayttaja($_POST['tunnus'], $_POST['salasana']);
    if ($kayttaja) {
        $sessio->kayttaja_ID = $kayttaja->id;
        ohjaa('index.php');
    } else {
        ohjaa('kirjautuminen.php');
    }
    
} elseif (isset($_GET['ulos'])) {
    unset($sessio->kayttaja_ID);
    ohjaa('index.php');
} else {
    die('DERP');
}
?>
