<?php

namespace Models;

class Admin extends DataBase
{
	//les méthodes qui effectuent des requêtes SQL sur la table JEUX
	public function getAdminByEmail(string $email):?array
	{
		return $this -> findOne("SELECT id, password, email, nom, prenom FROM admin WHERE email = ?", [$email]);
	}
}