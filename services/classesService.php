<?php

include_once 'beans/classes.php';
include_once 'connexion/Connexion.php';
include_once 'dao/IDao.php';

class classesService implements IDao {

    private $connexion;

    function __construct() {
        $this->connexion = new Connexion();
    }

    public function create($o) {
        $query = "INSERT INTO classes VALUES (NULL,?,?)";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getCode(), $o->getIdFiliere())) or die('Error');
    }

    public function delete($id) {
        $query = "DELETE FROM classes WHERE id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id)) or die("erreur delete");
    }

    public function findAll() {
        $query = "select c.id,c.code,f.code as cfil from classes c inner join filiere f on f.id = c.IdFiliere";
        $req = $this->connexion->getConnexion()->query($query);
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }

    public function countByFonction() {
        $query = "SELECT COUNT(*) as nbr,f.code as nomf FROM classes c INNER JOIN filiere f on c.idFiliere=f.id GROUP BY f.code";
        $req = $this->connexion->getConnexion()->query($query);
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }
    

    public function findById($id) {
        $query = "select * from classes where id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id));
        $res = $req->fetch(PDO::FETCH_OBJ);
        $classes = new classes($res->id, $res->code, $res->IdFiliere);
        return $classes;
    }

    // new function to get classes by filiereID
    public function findByIdFiliere($idfilier) {
        $query = "select c.id,c.code,f.code as cfil from classes c inner join filiere f on f.id = c.IdFiliere where f.code = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($idfilier));

        $res = $req->fetchAll(PDO::FETCH_OBJ);
        return $res;
    }

    public function findByIdApi($id) {
        $query = "select * from classes where id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id));
        $res = $req->fetch(PDO::FETCH_OBJ);
        return $res;
    }

    public function update($o) {
        $query = "UPDATE classes SET IdFiliere = ?,code=? where id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getIdFiliere(), $o->getCode(), $o->getId())) or die('Error');
    }

}
