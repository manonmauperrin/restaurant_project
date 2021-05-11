<?php

namespace Models;

class Users extends Database
{
	//les méthodes qui effectuent des requêtes SQL sur la table JEUX
	public function getUsersByEmail(string $email):?array
	{
		return $this -> findOne("SELECT id, password, email, lastName, firstName, phone FROM users WHERE email = ?", [$email]);
	}
	
	public function createNewUser(string $email, string $firstname, string $lastname, int $phone, string $password)
    {
        return $this -> query("INSERT INTO users (email, firstName, lastName, phone, password) 
        VALUES (?, ?, ?, ?, ?)", [$email, $firstname, $lastname, $phone, $password]);
    }
}