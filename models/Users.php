<?php

namespace Models;

class Users extends Database
{
	//les méthodes qui effectuent des requêtes SQL sur la table JEUX
	public function getUsersByIdentifiant($email):array
	{
		return $this -> findOne("SELECT id, password, email, nom, prenom FROM admin WHERE email = ?", $email);
	}

}