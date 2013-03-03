<?php

/**
 * Description of lisaaKayttaja
 *
 * @author lode
 */
class Kyselyt {

    private $_pdo;

    public function __construct($pdo) {
        $this->_pdo = $pdo;
    }

    public function tunnistaKayttaja($tunnus, $salasana) {
        $kysely = $this->valmistele('SELECT kayttaja_ID FROM KAYTTAJAT WHERE 
                                     Tunnus = ? AND Salasana = ?');
        if ($kysely->execute(array($tunnus, $salasana))) {
            return $kysely->fetchColumn();
        } else {
            return null;
        }
    }

    public function lisaaKayttajaKantaan($tunnus, $salasana) {
        $kysely = $this->valmistele('INSERT INTO KAYTTAJAT (Tunnus, Salasana, Lupa)
                                    VALUES (?, ?, ?) RETURNING Kayttaja_ID');
        if ($kysely->execute(array($tunnus, $salasana, '0'))) {
            return $kysely->fetchColumn();
        }
        return false;
    }

    public function lisaaKayttajalleOikeudet($kayttajaID, $arvo) {
        $kysely = $this->valmistele('UPDATE KAYTTAJAT SET lupa = ? WHERE Kayttaja_ID = ?');
        if ($kysely->execute(array($arvo, $kayttajaID))) {
            return true;
        } else
            return false;
    }

    public function lisaaJuomanTekija($nimi, $lisaaja) {
        $kysely = $this->valmistele('UPDATE JUOMAT SET Lisannyt = ? WHERE juomannimi = ?');
        if ($kysely->execute(array($lisaaja, $nimi))) {
            return true;
        } else {
            return false;
        }
    }

    public function haeKayttajanOikeudet($kayttajaID) {
        $kysely = $this->valmistele('SELECT Lupa FROM KAYTTAJAT WHERE kayttaja_ID = ?');
        if ($kysely->execute(array($kayttajaID))) {
            return $kysely->fetchColumn();
        } else
            return false;
    }

    public function listaaKayttajat() {
        $kysely = $this->valmistele('SELECT * FROM KAYTTAJAT ORDER BY Kayttaja_ID');
        if ($kysely->execute()) {
            return $kysely->fetchAll(PDO::FETCH_OBJ);
        }
        return false;
    }

    public function haeKaikkiJuomat() {
        $kysely = $this->valmistele('SELECT * FROM JUOMAT ORDER BY juomannimi');
        if ($kysely->execute()) {
            return $kysely->fetchAll(PDO::FETCH_OBJ);
        }
        return false;
    }
    
        public function haeKayttajanJuomat($kayttajaid) {
        $kysely = $this->valmistele('SELECT * FROM JUOMAT WHERE Lisannyt = ? ORDER BY juomannimi');
        if ($kysely->execute(array($kayttajaid))) {
            return $kysely->fetchAll(PDO::FETCH_OBJ);
        }
        return false;
    }

    public function haeKaikkiAineet($juomaid) {
        $kysely = $this->valmistele('SELECT * FROM OSAT WHERE JuomaID = ? ORDER BY ainesid');
        if ($kysely->execute(array($juomaid))) {
            return $kysely->fetchAll(PDO::FETCH_OBJ);
        }
        return false;
    }

    public function haeJuoma($nimi) {
        $kysely = $this->valmistele('SELECT * FROM JUOMAT WHERE Juomannimi = ?
                                    ORDER BY Juomannimi');
        if ($kysely->execute(array($nimi))) {
            return $kysely->fetchAll(PDO::FETCH_OBJ);
        } else {
            return $this->haeJuomanAlt($nimi);
        }
    }

    public function haeJuomanNimi($id) {
        $kysely = $this->valmistele('SELECT juomannimi FROM JUOMAT WHERE JuomaID = ?');
        if ($kysely->execute(array($id))) {
            return $kysely->fetchColumn();
        } else {
            return false;
        }
    }

    public function haeJuomanAlt($nimi) {
        $kysely = $this->haeJuomaID($nimi);
        if ($kysely) {
            $vastaus = $this->valmistele('SELECT Nimi FROM NIMET WHERE JuomaID = ?');
            if ($vastaus->execute(array($kysely))) {
                return $vastaus->fetchColumn();
            }
        } else {
            return false;
        }
    }

    public function haku($parametri) {
        $kysely = $this->valmistele('SELECT JuomaID FROM JUOMAT WHERE juomannimi LIKE "%' . $parametri . '%"
            OR SELECT ainesID FROM AINES WHERE ainesnimi LIKE "%' . $parametri . '%"');
        if ($kysely->exectue(array())) {
            return $kysely->fetchAll(PDO::FETCH_OBJ);
        } else {
            return false;
        }
    }

    public function haeJuomaID($nimi) {
        $kysely = $this->valmistele('SELECT JuomaID FROM JUOMAT WHERE Juomannimi = ?');
        if ($kysely->execute(array($nimi))) {
            return $kysely->fetchColumn();
//        } else {
//            haeAltinID($nimi);
        }
    }

    public function haeAltinID($nimi) {
        $kysely = $this->valmistele('SELECT JuomaID FROM NIMET WHERE Nimi = ?');
        if ($kysely->execute(array($nimi))) {
            return $kysely->fetchColumn();
        } else {
            return null;
        }
    }

    public function haeaineID($aines) {
        $kysely = $this->valmistele('SELECT ainesID FROM AINES WHERE ainesnimi = ?');
        if ($kysely->execute(array($aines))) {
            return $kysely->fetchColumn();
        } else {
            return false;
        }
    }

    public function haeAines($aineID) {
        $kysely = $this->valmistele('SELECT ainesnimi FROM AINES WHERE ainesID = ?');
        if ($kysely->execute(array($aineID))) {
            return $kysely->fetchColumn();
        } else {
            return false;
        }
    }

    public function haeAinesMaara($ainesID) {
        $kysely = $this->valmistele('SELECT maara FROM OSAT WHERE ainesID = ?');
        if ($kysely->execute(array($ainesID))) {
            return $kysely->fetchColumn();
        } else {
            return false;
        }
    }

    public function haeJuomanResepti($juomaid) {
        $kysely = $this->valmistele('SELECT ohje FROM JUOMAT WHERE juomaid = ?');
        if ($kysely->execute(array($juomaid))) {
            return $kysely->fetchColumn();
        } else {
            return false;
        }
    }

    public function lisaaJuoma($nimi, $ohje) {
        if ($this->haeJuoma($nimi)) {
            return null;
        } else {
            $kysely = $this->valmistele('INSERT INTO JUOMAT (Juomannimi, Ohje)
                                        VALUES (?, ?) RETURNING JuomaID');
            if ($kysely->execute(array($nimi, $ohje))) {
                return $kysely->fetchColumn();
            }
        }
    }

    public function lisaaAinesKantaan($aines) {
        $kysely = $this->valmistele('INSERT INTO AINES (ainesnimi) VALUES (?) 
                                    RETURNING ainesID');
        if ($kysely->execute(array($aines))) {
            return $kysely->fetchColumn();
        }
    }

    public function lisaaJuomaanAines($juomaid, $aines, $maara) {

        if ($this->haeaineID($aines)) {
            $aines_id = $this->haeaineID($aines);
        } else {
            $aines_id = $this->lisaaAinesKantaan($aines);
        }
        var_dump($juomaid);

        $kysely = $this->valmistele('INSERT INTO OSAT (JuomaID, ainesID, maara)
                                    VALUES (?, ?, ?) RETURNING JuomaID');
        if ($kysely->execute(array($juomaid, $aines_id, $maara))) {
            return $kysely->fetchColumn();
        }
    }

    public function lisaaJuomalleNimi($juoma, $alt) {
        $drinkki_id = $this->haeJuomaID($juoma);

        $kysely = $this->valmistele('INSERT INTO NIMET (JuomaID, NIMI)
                                        VALUES (?, ?)');
        if ($kysely->execute(array($drinkki_id, $alt))) {
            return $kysely->fetchColumn();
        }
    }

    public function poistaDrinkki($juomannimi) {
        if ($this->haeJuoma($juomannimi)) {
            $juomanid = $this->haeJuomaID($juomannimi);

            $kysely = $this->valmistele('DELETE FROM JUOMAT WHERE juomannimi = ?');
            if ($kysely->execute(array($juomannimi))) {
                $kysely2 = $this->valmistele('DELETE FROM NIMET WHERE JuomaID = ?');
                if ($kysely2->execute(array($juomanid))) {
                    $kysely3 = $this->valmistele('DELETE FROM OSAT WHERE JuomaID = ?');
                    if ($kysely3->execute(array($juomanid))) {
                        return true;
                    } else
                        return false;
                }
            }
        }
    }

    private function valmistele($sqllause) {
        return $this->_pdo->prepare($sqllause);
    }

}

require dirname(__file__) . '/../asetukset.php';

$kyselija = new Kyselyt($pdo);
?>
