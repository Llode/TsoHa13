<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<?php
require_once 'apu.php';
varmistus();
adminvarmistus();
$kayttajalista = $kyselija->listaaKayttajat();
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
        
        <ul class="drinkkilista">
            <?php foreach ($kayttajalista as $kayttaja) { ?>
                <li>  <h3><?php echo $kayttaja->tunnus; ?></h3>  
                    <a href="<?php echo "annaoikeudet.php?kayttaja=" . $kayttaja->kayttaja_id ?>"> [Anna julkaisuoikeudet] </a>
                    <a href="<?php echo "poistaoikeudet.php?kayttaja=" . $kayttaja->kayttaja_id ?>"> [Poista julkaisuoikeudet] </a>
                    <a href="<?php echo "juomalistaus.php?kayttaja=" . $kayttaja->kayttaja_id ?>" > [Lisätyt juomat] </a></li>
            <?php } ?>
        </ul>
    </body>
</html>
