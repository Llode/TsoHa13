<?php
$otsikko = 'Drinkkikone - luo tunnukset';
?>

<form action="kirjaudu.php?sisaan" method="POST">
<fieldset>
<legend>Anna uusi käyttäjätunnus ja salasana</legend>
<label for="tunnus">Käyttäjätunnus:</label>
<input type="text" name="tunnus" id="tunnus" />
<label for="salasana">Salasana:</label>
<input type="password" name="salasana" id="salasana" />
<input type="submit" value="Kirjaudu" />
</fieldset>
</form>

