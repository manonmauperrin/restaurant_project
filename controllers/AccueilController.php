<?php
namespace Controllers;

class AccueilController
{
	public function display()
	{
		//appeler la vue 
		$template = "views/accueil.phtml";
		include 'views/layout.phtml';
	}
	
    public function checkLog()
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