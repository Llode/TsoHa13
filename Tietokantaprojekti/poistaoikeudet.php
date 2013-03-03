<?php

require_once 'apu.php';
varmistus();
adminvarmistus();

$kayttajaid = $_GET['kayttaja'];
$kayttajanoikat = $kyselija->haeKayttajanOikeudet(kayttajaid);
if ($kayttajanoikat != 2) {
    $adminoi = $kyselija->lisaaKayttajalleOikeudet($kayttajaid, 0);
} else {
    ohjaa('virhesivu.php');
}


if ($adminoi) {
    echo "muokkaaminen onnistui!";
    ohjaa('adminsivu.php');
} else
    die("HURRRRP")
?>
