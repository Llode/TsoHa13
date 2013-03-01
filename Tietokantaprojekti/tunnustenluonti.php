<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Drinkkikone - Teretulemast!</title>
        <link href="sivu.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        
        <?php
        $otsikko = 'Drinkkikone - luo tunnukset';
        ?>

        <form class="kirjautuminen" action="Kayttajatunnukset.php?luoTunnus" method="POST">
            <h2>Luo uusi tunnus</h2>

            <label for="tunnus">Käyttäjätunnus:</label>
            <input type="text" name="tunnus" id="tunnus" />
            <label for="salasana">Salasana:</label>
            <input type="password" name="salasana" id="salasana" />
            <input type="submit" value="Luo tunnus" />
            <p class="signuplinkki"><a href="/../index.php">Kirjaudu sisään tästä!</a></p>
        </form>
        
        <?php ?>
    </body>
</html>