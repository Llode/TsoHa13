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
                                     Tunnus = ? AND salasana = ?');
        if($kysely->execute(array($tunnus, $salasana))) {
            return $kysely->fetchObject();
        } else {
            return null;
        }
    }

    public function lisaaKayttajaKantaan($tunnus, $salasana) {
        $kysely = $this->valmistele('INSERT INTO KAYTTAJAT (Tunnus, Salasana)
                                    VALUES (?, ?)');
        if ($kysely->execute(array($tunnus, $salasana))) {
            return $kysely->fetchObject();
        }
        return false;
    }
    

    public function haeKaikkiJuomat(){
        $kysely = $this->valmistele('SELECT * FROM JUOMAT ORDER BY NIMI');
        if($kysely->execute()){
            return $kysely->fetchAll(PDO::FETCH_OBJ);
        }
        return false;
    }
    
    public function haeJuoma($nimi) {
        $kysely = $this->valmistele('SELECT * FROM JUOMAT WHERE Juomannimi like ?
                                    ORDER BY Juoma');
        if ($kysely->execute(array($nimi))) {
            return $kysely->fetchAll(PDO::FETCH_OBJ);
        } else {
            haeJuomanAlt($nimi);
        }
    }

    public function haeJuomanAlt($nimi) {
        $kysely = $this->valmistele('SELECT * FROM NIMET WHERE Nimi like ? 
                                        ORDER BY Nimi');
        if ($kysely->execute(array($nimi))) {
            return $kysely->fetchAll(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    }

    public function haeJuomaID($nimi) {
        $kysely = $this->valmistele('SELECT JuomaID FROM JUOMAT WHERE Juomannimi = ?');
        if ($kysely->execute(array($nimi))) {
            return $kysely->fetchObject();
        } else {
            haeAltinID($nimi);
        }
    }

    public function haeAltinID($nimi) {
        $kysely = $this->valmistele('SELECT JuomaID FROM NIMET WHERE Nimi = ?');
        if ($kysely->execute(array($nimi))) {
            return $kysely->fetchObject();
        } else {
            return null;
        }
    }

    public function haeaineID($aines) {
        $kysely = $this->valmistele('SELECT ainesID FROM AINES WHERE ainesnimi = ?');
        if ($kysely->execute(array($aines))) {
            return $kysely->fetchObject();
        } else {
            return null;
        }
    }

    public function haeAines($ainesID){
        $kysely = $this->valmistele('SELECT ainesnimi FROM AINES WHERE ainesID = ?');
        if($kysely->execute(array($ainesID))) {
            return $kysely->fetchObject();
        } else {
            return null;
        }
    }
    
    public function lisaaJuoma($nimi, $ohje) {
        if ($this->haeJuoma($nimi)) {
            return null;
        } else {
            $kysely = $this->valmistele('INSERT INTO JUOMAT (Juoma, Ohje)
                                        VALUES (?, ?) RETURNING JuomaID');
            if ($kysely->execute(array($nimi, $ohje))) {
                return $kysely->fetchObject()->JuomaID;
            }
        }
    }

    public function lisaaAinesKantaan($aines) {
        $kysely = $this->valmistele('INSERT INTO AINES (aines) VALUES (?) 
                                    RETURNING ainesID');
        if ($kysely->execute(array($aines))) {
            return $kysely->fetchObject()->ainesID;
        }
    }

    public function lisaaJuomaanAines($juoma, $aines, $maara) {
        $drinkki_id = $this->haeJuomanID($juoma);

        if ($this->haeaineID($aines)) {
            $aines_id = $this->haeaineID($aines);
        } else {
            $aines_id = $this->lisaaAinesKantaan($aines);
        }

        $kysely = $this->valmistele('INSERT INTO OSAT (JuomaID, ainesID, maara)
                                    VALUES (?, ?, ?) RETURNING JuomaID');
        if ($kysely->execute(array($drinkki_id, $aines_id, $maara))) {
            return $kysely->fetchObject()->JuomaID;
        }
    }

    public function lisaaJuomalleNimi($juoma, $alt) {
        $drinkki_id = $this->haeJuomanID($juoma);

        $kysely = $this->valmistele('INSERT INTO NIMET (JuomaID, NIMI)
                                        VALUES (?, ?)');
        if ($kysely->execute(array($drinkki_id, $alt))) {
            return $kysely->fetchOject();
        }
    }
    


    private function valmistele($sqllause) {
        return $this->_pdo->prepare($sqllause);
    }
    
}

require dirname(__file__).'/../asetukset.php';

$kyselija = new Kyselyt($pdo);
?>
