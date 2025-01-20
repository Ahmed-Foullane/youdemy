<?php



class Utilisateur {
    protected int $id = 0;
    protected string $name = "";
    protected string $password = "";
    protected string $email = "";
    
    protected array $cours = [];
    protected string $role;

    public function __construct() {
       
    }

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getCours(): array {
        return $this->cours;
    }

    public function getRole(): string {
        return $this->role;
    }

    
    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function setPassword(string $password): void {
        $this->password = $password;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function setCours(array $cours): void {
        $this->cours = $cours;
    }

    public function addCours(string $cour): void {
        $this->cours[] = $cour;
    }

    public function setRole(Role $role): void {
        $this->role = $role;
    }
    
    public function __toString(): string {
        return "(user) => id: " . $this->id .
               ", name: " . $this->name .
               ", password: " . $this->password .
               ", email: " . $this->email .
               ", role: " . $this->role .
               ", cours: [" . implode(", ", $this->cours) . "]";
    }
}