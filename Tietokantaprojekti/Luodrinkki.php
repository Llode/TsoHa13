<?php
$otsikko = 'Drinkkikone - pick your poison!';
require_once 'apu.php';
varmistus();
oikkavarmistus();
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
        <a href="drinkkilista.php">Takaisin</a>
        <h2>Taikuroi oma juomasi!</h2>
        <p>Täytä allaolevat kentät</p>
        <form action="Luodrinkkifunktiot.php?luo" method="POST">
            <fieldset>
                <legend>Täytä kaikki kentät - tai älä.</legend>
                <label for="juomannimi">Drinkin nimi:</label>
                <input type="text" name="juomannimi" id="jnimi" />
                <label for="juomannimi">Vaihtoehtoinen nimi:</label>
                <input type="text" name="altinnimi" id="altnimi" />

                <?php
                $aineet = array();
                $ainemaarat = array();
                for ($i = 0, $imax = 10; $i < $imax; $i++) {
                    ?>
                    <div>
                        <?= $i + 1 ?>
                        <label for="aineennimi">Aines:</label>
                        <input type="text" name="aineennimi[]"  id="aineennimi"
                               <label for="aineidenmaara">    määrä:</label>
                        <input type="text" name="aineenmaara[]"  id="ainemaara"
                    </div>
                    <?php
                }
                ?>
                <div>
                    <textarea name="ohje" id="ohje" rows="8" cols="50">Kirjoita ohje tähän!</textarea>
                    <input type="submit" value = "Luo!" />
                </div>
            </fieldset>
        </form>
    </body>
</html>