<?php

class Administrateur extends Utilisateur {
    public function __construct($role) {
        parent::__construct($role);
    }

    public function __toString(){
     return   parent::__toString();   
    }
}