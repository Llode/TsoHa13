<?php
$otsikko = 'Drinkkikone - pick your poison!';
?>
<h2>Taikuroi oma juomasi!</h2>
<p>Täytä allaolevat kentät</p>
<form action="Luodrinkkifunktiot.php" method="POST">
    <fieldset>
        <legend>Täytä kaikki kentät</legend>
        <label for="juomannimi">Drinkin nimi:</label>
        <input type="text" name="juomannimi" id="jnimi" />
        <label for="aineidenmaara">Aineiden määrä:</label>
        <input type="integer" name="aineidenmaara" id="ainemaara" />
        <?php
        for ($i = 0; $imax = ainemaara; $i < $imax, $i++) {
            ?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td><input type="text" name="aineennimi" value=<?= $aineet[$i]['aineennimi']?></td>
                <td><input type="text" name="aineenmaara" value=<?= $aineet[$i]['aineenmaara']?></td>
            </tr>
            <?php
        }
        ?>
    </fieldset>
</form>