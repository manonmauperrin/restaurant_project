<?php 

namespace Models;

class OpeningHour extends Database
{
    public function getHoraires()
    {
        return $this -> findAll("SELECT id, days, hours FROM openingHour");
    }
    
    public function updateHoraires(string $hours, string $days)
    {
        return $this -> query("UPDATE openingHour SET hours = ? WHERE days = ?", [$hours, $days]);
    }
}
