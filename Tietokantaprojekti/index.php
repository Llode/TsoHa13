<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Drinkkikone - Teretulemast!</title>
        <link href="sivu.css" rel="stylesheet" type="text/css">
    </head>
    <body>

        <?php
        $otsikko = 'Drinkkikone - kirjaudu sisään';
        ?>

        <form class="kirjautuminen" action="Kayttajatunnukset.php?sisaan" method="POST">
            <h2>Kirjaudu sisään!</h2>

            <label for="tunnus">Käyttäjätunnus:</label>
            <input type="text" name="tunnus" id="tunnus" />
            <label for="salasana">Salasana:</label>
            <input type="password" name="salasana" id="salasana" />
            <input type="submit" value="Sisään!" />
            <p class="signuplinkki"><a href="/../tunnustenluonti.php">Luo tunnukset tästä!</a></p>
        </form>

        <?php ?>
    </body>
</html>
