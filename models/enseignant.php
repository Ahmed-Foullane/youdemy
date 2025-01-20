<?php

class Enseignant extends Utilisateur {
    private array $coursCrees = []; 

    public function __construct() {
        parent::__construct("teacher");
    }

    public function ajouterCours(Cours $cours): void {
        $this->coursCrees[] = $cours;
    }

    public function getCoursCrees(): array {
        return $this->coursCrees;
    }

    public function __toString(){
        return parent::__toString();
    }
}