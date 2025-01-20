<?php
class Cours {
    private int $id;
    private string $titre;
    private string $description;
    private int $teacherId;
    private array $tags = []; 
    private string $categorie; 
    private string $conetentLink;
    public function __construct(int $id, string $titre, string $description, int $teacherId, string $categorie) {
        $this->id = $id;
        $this->titre = $titre;
        $this->description = $description;
        $this->teacherId = $teacherId;
        $this->categorie = $categorie;
    }

  
    public function getId(): int {
         return $this->id; 
        }

    public function getTitre(): string {
         return $this->titre; 
        }

    public function getDescription(): string {
         return $this->description; 
        }

    public function getTeacherId(): int {
         return $this->teacherId; 
        }

    public function getCategorie(): string {
         return $this->categorie; 
        }

   
    public function ajouterTag(Tag $tag): void {
        $this->tags[] = $tag;
    }

    public function getTags(): array {
        return $this->tags;
    }

    
    public function inscrireEtudiant(int $studentId): void {
        $this->inscriptions[] = $studentId;
    }

    public function getInscriptions(): array {
        return $this->inscriptions;
    }
}