<?php

namespace Models;

class Users extends Database
{
	//les méthodes qui effectuent des requêtes SQL sur la table JEUX
	public function getUsersByEmail($email):array
	{
		return $this -> findOne("SELECT id, password, email, lastName, firstName, phone FROM users WHERE email = ?", [$email]);
	}
}