<?php

require_once 'apu.php';
varmistus();
adminvarmistus();

$kayttajaid = $_GET['kayttaja'];
$adminoi = $kyselija->lisaaKayttajalleOikeudet($kayttajaid, 0);

if ($adminoi) {
    echo "muokkaaminen onnistui!";
    ohjaa('adminsivu.php');
} else
    die("HURRRRP")
?>
