<?php
require_once 'apu.php';


varmistus();

$juomalista = $kyselija->haeKaikkiJuomat();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Drinkkikone - Teretulemast!</title>
        <link href="sivu.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <ul class="drinkkilista">
            <?php foreach ($juomalista as $juoma) { ?>
                <li>  <a href="<?php echo "Resepti.php?resepti=".$juoma->JuomaID ?>"> <?php echo $juoma->juomannimi;?> </a> </li>
            <?php } ?>
        </ul>
        <a class="uloskirjautuminen" href="Kayttajatunnukset.php?ulos">ulos</a>
        
        <div class="resepti-ikkuna" >
            <iframe src="Resepti.php" name="resepti"></iframe>
        </div>
    </body>
</html>
