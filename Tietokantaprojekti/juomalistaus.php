<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<?php
require_once 'apu.php';
varmistus();
adminvarmistus();
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
        <a href="adminsivu.php">Takaisin</a>
        <?php
        $kayttajaid = $_GET['kayttaja'];
        ?>
        <ul class="drinkkilista">

            <?php
            $juomalista = $kyselija->haeKayttajanJuomat($kayttajaid);
            foreach ($juomalista as $juoma) {
                ?>
                <li>  <a href="<?php echo "Resepti.php?resepti=" . $juoma->juomaid ?>"> <?php echo $juoma->juomannimi; ?> </a> 
                    <a href="<?php echo "poistadrinkki.php?nimi=" . $juoma->juomannimi ?>"> [poista] </a> </li>
            <?php } ?>
        </ul>
    </body>
</html>
