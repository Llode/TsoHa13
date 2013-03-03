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
        <a class="uloskirjautuminen" href="Kayttajatunnukset.php?ulos">ulos</a>
        <a href="adminsivu.php">Moderointisivu</a>
        <a href="Luodrinkki.php">Lisää drinkki arkistoon!</a>

        <ul class="drinkkilista">

            <h3>Haku</h3>
            <form method ="post" action="search.php?go" id="haku">
                <input type="text" name="nimi">
                <input type="submit" name="submit" value="Search">
            </form>

            <?php
            $juomalista = $kyselija->haeKaikkiJuomat();
            foreach ($juomalista as $juoma) {
                ?>
                <li>  <a href="<?php echo "Resepti.php?resepti=" . $juoma->juomaid ?>"> <?php echo $juoma->juomannimi; ?> </a> </li>
            <?php } ?>
        </ul>


        <!--        <div class="resepti-ikkuna" >
                    <iframe src="Resepti.php" name="resepti"></iframe>
                </div>-->
    </body>
</html>
