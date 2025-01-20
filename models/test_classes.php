<?php

require_once "models/categorie.php";
require_once "models/keywords.php";
require_once "models/tag.php";
require_once "models/role.php";
require_once "models/utilisateur.php";
require_once "models/administrateur.php";
require_once "models/enseignant.php";
require_once "models/etudiant.php";


class TestClasses {
    public function __construct() {
       
    }
    
     public function tagTest(){
        $tag = new Tag("#tag");
        $this->display($tag);
     }

     public function categoryTest(){
        $tag = new Categorie("drama");
        $this->display($tag);
     }

    public function roleTest(){
        $role = new Role("admin");
        $this->display($role);
    }

    public function userTest(){
        $user = new Utilisateur();
        $this->display($user);
    }
    public function adminTest(){
        $user = new Administrateur("admin");
        $this->display($user);
    }
    public function enseignantTest(){
        $user = new Enseignant();
        $this->display($user);
    }
    public function etudiantTest(){
        $user = new Etudiant();
        $this->display($user);
    }

    public function display($obj) {
        echo $obj;
        echo "<br />";
        echo "===========================================";
        echo "<br />";
    }

}