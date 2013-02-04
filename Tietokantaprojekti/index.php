<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Drinkkikone - Teretulemast!</title>
    </head>
    <body>

        <?php
        require_once 'apu.php';
        
        varmistus();
        $juomalista = $kyselija->haeJuoma('*');
        ?>

    </body>
</html>
