<?php
require_once 'crud.php';
require_once '../models/category.php';

class CategoryDAO extends Crud {
    protected $table = 'categories'; 

    public function __construct() {
        parent::__construct();
    }

    public function createCategory(Categorie $category) {
        $data = [
            'name' => $category->getName()
        ];
        return $this->create($data);
    }

    public function getAllCategories() {
        return $this->read(['id', 'name']);
    }

    public function updateCategory(Categorie $category) {
        $data = [
            'id' => $category->getId(),
            'name' => $category->getName()
        ];
        return $this->update($data);
    }

    public function deleteCategory($id) {
        $data = ['id' => $id];
        return $this->delet($data); 
    }

    public function findCategoryById($id) {
        $data = ['id' => $id];
        return $this->findBy($data);
    }
}
