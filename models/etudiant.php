<?php
class Etudiant extends Utilisateur {
    private array $coursInscrits = [];

    public function __construct() {
        parent::__construct("student");
    }

    public function inscrireAuCours(int $coursId): void {
        $this->coursInscrits[] = $coursId;
    }

    public function getCoursInscrits(): array {
        return $this->coursInscrits;
    }

    public function __toString(){
        return parent::__toString();
    }
}


