<?php

namespace Models;

class Category extends Database
{
    public function getAllCategories():array
    { //Peut être des inner/left JOIN à faire avec la table category
        return $this -> findAll("SELECT id, name, isDish, description from category WHERE isDish = 1");
    }
}