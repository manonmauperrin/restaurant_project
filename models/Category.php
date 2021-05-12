<?php

namespace Models;

class Category extends Database
{
    public function getMealsCategories():array
    { //Peut être des inner/left JOIN à faire avec la table category
        return $this -> findAll("SELECT id, name, isDish, description from category WHERE isDish = 1");
    }
    
    public function getOthersCategories():array
    { //Peut être des inner/left JOIN à faire avec la table category
        return $this -> findAll("SELECT id, name, isDish, description from category WHERE isDish = 0");
    }
    
    public function getCategoryById(int $id):array
    {
        return $this -> findOne("SELECT id, name, isDish, description FROM category where id=?", [$id]);
    }
    
    public function getAllCategories():array
    { //Peut être des inner/left JOIN à faire avec la table category
        return $this -> findAll("SELECT id, name, isDish, description from category");
    }
    
    public function updateCategory(string $name, int $isDish, string $description, int $id)
    {
        return $this -> query("UPDATE category SET
        name = ?,
        isDish = ?,
        description = ?
        WHERE id = ?", [$name, $isDish, $description, $id]);
    }
    
    public function createNewCategory(string $name, int $isDish, string $description)
    {
        return $this -> query("INSERT INTO category (name, isDish, description) 
        VALUES (?, ?, ?)",[$name, $isDish, $description]);
    }
    
    public function deleteCategoryById(int $id)
    {
        return $this -> query("DELETE FROM category WHERE id = ?", [$id]);
    }

}