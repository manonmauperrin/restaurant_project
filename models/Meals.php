<?php

namespace Models;

class Meals extends Database
{
    public function getAllMeals():array
    {
        return $this -> findAll("SELECT meal.id, meal.name, src, alt, idCategory FROM meal
        INNER JOIN category ON meal.idCategory = category.id ");
    }
    
    public function getMealsByCategory(int $id):array
    {
        return $this -> findAll("SELECT meal.id, meal.name, src, alt, idCategory FROM meal
        WHERE idCategory = ?", [$id]);
    }
    
    public function getMealById(int $id):array
    {
        return $this -> findOne("SELECT id, name, src, alt, idCategory FROM meal where id=?", [$id]);
    }
    
    public function updateMeal(string $name, string $src, string $alt, int $idCategory, int $id)
    {
        return $this -> query("UPDATE meal SET
        name = ?,
        src = ?,
        alt = ?,
        idCategory = ?
        WHERE id = ?", [$name, $src, $alt, $idCategory, $id]);
    }
    
    public function createNewMeal(string $name, string $src, string $alt, int $idCategory)
    {
        return $this -> query("INSERT INTO meal (name, src, alt, idCategory) 
        VALUES (?, ?, ?, ?)",[$name, $src, $alt, $idCategory]);
    }
    
    public function deleteMealById(int $id)
    {
        return $this -> query("DELETE FROM meal WHERE id = ?", [$id]);
    }
}