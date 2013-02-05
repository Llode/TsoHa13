<?php
$otsikko = 'Drinkkikone - kirjaudu sisään';
?>
<h2>Kirjautuminen</h2>
<p>Kirjaudu sisään!</p>

<form action="Kayttajatunnukset.php?sisaan" method="POST">
    <fieldset>
        <legend>Kirjaudu sisään</legend>
        <label for="tunnus">Käyttäjätunnus:</label>
        <input type="text" name="tunnus" id="tunnus" />
        <label for="salasana">Salasana:</label>
        <input type="password" name="salasana" id="salasana" />
        <input type="submit" value="Sisään!" />
    </fieldset>
</form>
<a href="/../tunnustenluonti.php">Luo tunnukset tästä!</a>
<?php ?>