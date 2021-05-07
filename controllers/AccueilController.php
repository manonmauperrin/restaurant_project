<?php
namespace Controllers;

class AccueilController
{
	public function display()
	{
		//méthode qui permet d'afficher la page d'accueil
		
		
		
		//appeler la vue 
		
		$template = "views/accueil.phtml";
		include 'views/layout.phtml';
	}
	
	
	
    public function check()
    {
        if(isset($_GET['action']) && $_GET['action'] == 'deco')
        {
        	//je déconnecte l'utilisateur
        	session_destroy();
        	header('location:index.php');
        	exit;
        }
    }
}
//include les models qui ira chercher Meal / Menus / hours / Slider