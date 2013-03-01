<?php
require_once 'apu.php';

varmistus();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Drinkkikone - Teretulemast!</title>
        <link href="sivu.css" rel="stylesheet" type="text/css">
    </head>
    <body>

        <?php
        $drinkki_id = $_GET['resepti'];
        if ($drinkki_id) {
            $aineslista = $kyselija->haeKaikkiAineet($drinkki_id);
            $drinkkiohje = $kyselija->haeJuomanResepti($drinkki_id);
        }
        ?>
        <ul>
        <?php foreach($aineslista as $aines) { ?>
            <li><p><?php echo $ainesnimi = $kyselija->haeAines($aines->ainesid);?></p> <p><?php echo $ainesmaara = $aines->maara; ?></p></li>
        <?php } ?>
        </ul>
        <div> <?php echo $drinkkiohje; ?></div>

    </body>
</html>
