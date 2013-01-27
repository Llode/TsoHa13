<?php
$otsikko = 'Drinkkikone - luo tunnukset';
?>
<h2>Luo uusi tunnus</h2>
<p>Luo tunnus käyttääksesi palvelua!</p>

<form action="Kayttajatunnukset.php?Luo" method="POST">
    <fieldset>
        <legend>Anna uusi käyttäjätunnus ja salasana</legend>
        <label for="tunnus">Käyttäjätunnus:</label>
        <input type="text" name="tunnus" id="tunnus" />
        <label for="salasana">Salasana:</label>
        <input type="password" name="salasana" id="salasana" />
        <input type="submit" value="Luo tunnus" />
    </fieldset>
</form>

?>