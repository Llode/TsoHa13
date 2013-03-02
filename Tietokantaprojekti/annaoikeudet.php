<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<?php
require_once 'apu.php';
varmistus();
adminvarmistus();

$kayttajaid = $_GET['kayttaja'];
$adminoi = $kyselija->lisaaKayttajalleOikeudet($kayttajaid, 1);

if ($adminoi) {
    echo "muokkaaminen onnistui!";
    ohjaa('adminsivu.php');
} else
    die("HURRRRP")
?>
