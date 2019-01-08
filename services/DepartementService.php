<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DepartementService
 *
 * @author mosab
 */
include_once 'beans/Departement.php';
include_once 'connexion/Connexion.php';
include_once 'dao/IDao.php';

class DepartementService implements IDao {
    //put your code here
    private $connexion;
    
    function __construct() {
        $this->connexion = new Connexion();
    }

    
    public function create($o) {
        $query = "INSERT INTO Departement VALUES (NULL,?,?)";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getCode(),$o->getLibelle() )) or die('Error');
    
    }

    public function delete($id) {
        $query = "DELETE FROM Departement WHERE id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id)) or die("erreur delete");
    }

    public function findAll() {
        $query = "select * from Departement";
        $req = $this->connexion->getConnexion()->query($query);
        $f= $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }
    

    public function findById($id) {
        $query = "select * from Departement where id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id));  
        $res=$req->fetch(PDO::FETCH_OBJ);
        $fonction = new Departement($res->id,$res->code, $res->libelle);
        return $fonction;
    }

     public function findByIdApi($id) {
        $query = "select * from Departement where id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id));  
        $res=$req->fetch(PDO::FETCH_OBJ);
        return $res;
    }

    public function update($o) {
        $query = "UPDATE Departement SET libelle = ?,code=? where id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getLibelle(),$o->getCode(), $o->getId())) or die('Error');       
    }

}
