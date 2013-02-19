<?php
$otsikko = 'Drinkkikone - pick your poison!';
require_once 'apu.php';
varmistus();
?>

<h2>Taikuroi oma juomasi!</h2>
<p>Täytä allaolevat kentät</p>
<form action="Luodrinkkifunktiot.php?luo" method="POST">
    <fieldset>
        <legend>Täytä kaikki kentät - tai älä.</legend>
        <label for="juomannimi">Drinkin nimi:</label>
        <input type="text" name="juomannimi" id="jnimi" />

        <?php
        $aineet = array();
        $ainemaarat = array();
        for ($i = 0, $imax = 10; $i < $imax; $i++) {
            ?>
            <div>
                <?= $i + 1 ?>
                <label for="aineennimi">Aines:</label>
                <input type="text" name="aineennimi[]"  id="aineennimi"
                <label for="aineidenmaara">määrä:</label>
                <input type="text" name="aineenmaara[]"  id="ainemaara"
            </div>
            <?php
        }
        ?>
        <div>
            <textarea name="ohje" id="ohje" rows="8" cols="50">Kirjoita ohje tähän!</textarea>
       <input type="submit" value = "luo!" />
        </div>
    </fieldset>
</form>
