<?php
require_once 'apu.php';
varmistus();
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
        <?php
        if (isset($_POST['submit'])) {
            if (isset($_GET['go'])) {

                $nimi = $_POST['nimi'];
                $tulos = $kyselija->haeJuoma($nimi);
                if (!$tulos) {
                    echo 'Anteeksi, ei osumia.';
                } else {
                    foreach ($tulos as $juoma) {
                        ?>
                    <li>  <a href="<?php echo "Resepti.php?resepti=" . $juoma->juomaid ?>"> <?php echo $juoma->juomannimi; ?> </a> </li>
                    <?php
                }
            }
        }
    }
    ?>
    </body>
</html>
