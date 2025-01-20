<?php
require_once 'crud.php';
require_once '../models/tag.php';

class TagDAO extends Crud {
    protected $table = 'tags';

    public function __construct() {
        parent::__construct();
    }

    public function createTag(Tag $tag) {
        $data = [
            'name' => $tag->getName()
        ];
        $result = $this->create($data);
    
        if ($result) {
            error_log("Tag created successfully: " . $tag->getName());
        } else {
            error_log("Failed to create tag: " . $tag->getName());
        }
    
        return $result;
    }

    public function getAllTags() {
        return $this->read(['id', 'name']);
    }

    public function updateTag(Tag $tag) {
        $data = [
            'id' => $tag->getId(),
            'name' => $tag->getName()
        ];
        return $this->update($data);
    }

    public function deleteTag($id) {
        $data = ['id' => $id];
        return $this->delet($data);
    }
    public function findTagById($id) {
        $data = ['id' => $id];
        return $this->findBy($data);
    }
}