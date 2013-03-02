<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<?php
require_once 'apu.php';
varmistus();
adminvarmistus();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Drinkkikone - Teretulemast!</title>
        <link href="sivu.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <a class="uloskirjautuminen" href="Kayttajatunnukset.php?ulos">ulos</a>
        <a href="adminsivu.php">Takaisin</a>
        <?php
        $kayttajaid = $_GET['kayttaja'];
        // put your code here
        ?>
    </body>
</html>
