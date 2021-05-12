<?php

namespace Models;

class Menus extends Database
{
    public function getAllMenus():array
    { //Peut être des inner/left JOIN à faire avec la table category
        return $this -> findAll("SELECT menus.id, title, src, alt, price, name, idCategory, description FROM menus

        INNER JOIN category ON menus.idCategory = category.id");
    }
    
    public function getMenuById(int $id):array
    { //Peut être des inner/left JOIN à faire avec la table category
        return $this -> findOne("SELECT id, title, src, alt, price, idCategory FROM menus WHERE id=?", [$id]);
    }
    
    public function updateMenu(string $title, string $src, string $alt, int $price, int $idCategory,int $id)
    {
        return $this -> query("UPDATE menus SET 
        title = ?,
        src = ?,
        alt = ?,
        price = ?, 
        idCategory = ?
        WHERE id = ?", [$title, $src, $alt, $price, $idCategory, $id]
        );
    }
    
    public function createNewMenu(string $title, string $src, string $alt, int $price, int $idCategory)
    {
        return $this -> query("INSERT INTO menus (title, src, alt, price, idCategory) 
        VALUES (?, ?, ?, ?, ?)", [$title, $src, $alt, $price, $idCategory]);
    }
    
    public function deleteMenuById(int $id)
    {
    return $this -> query("DELETE FROM menus 
    	WHERE id = ?", [$id]);
    }
    
    
}