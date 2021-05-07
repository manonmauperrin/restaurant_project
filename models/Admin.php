<?php

namespace Models;

class Admin extends Database
{
	//les méthodes qui effectuent des requêtes SQL sur la table JEUX
	public function getAdminByEmail($email):array
	{
		return $this -> findOne("SELECT id, password, email, nom, prenom FROM admin WHERE email = ?", $email);
	}
}