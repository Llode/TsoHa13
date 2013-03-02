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
        $kysely = $this->valmistele('INSERT INTO KAYTTAJAT WHERE Kayttaja_ID = ? (Lupa) VALUES (?)');
        if ($kysely->execute(array($kayttajaID, $arvo))) {
            return true;
        } else
            return false;
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

    public function haeJuomanAlt($nimi) {
        $kysely = $this->haeAltinID($nimi);
        if ($kysely) {
            $vastaus = $this->valmistele('SELECT * FROM JUOMAT WHERE JuomaID = ? ORDER BY Juomannimi');
            if ($vastaus->execute(array($kysely))) {
                return $vastaus->fetchAll(PDO::FETCH_OBJ);
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
        } else {
            haeAltinID($nimi);
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

    public function lisaaJuoma($nimi, $ohje, $lisaaja) {
        if ($this->haeJuoma($nimi)) {
            return null;
        } else {
            $kysely = $this->valmistele('INSERT INTO JUOMAT (Lisannyt, Juomannimi, Ohje)
                                        VALUES (?, ?, ?) RETURNING JuomaID');
            if ($kysely->execute(array($lisaaja, $nimi, $ohje))) {
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

    private function valmistele($sqllause) {
        return $this->_pdo->prepare($sqllause);
    }

}

require dirname(__file__) . '/../asetukset.php';

$kyselija = new Kyselyt($pdo);
?>
