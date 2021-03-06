<?php

//index.php?page=jeu
session_start();

spl_autoload_register(function($class)
{
	include str_replace("\\","/", lcfirst($class)) . '.php';
});

//ACCUEIL
//index.php?page=accueil OU index.php



//vérifier si j'ai un paramètre page
if(isset($_GET['page']))
{
	//tester les valeurs possibles pour le paramètre
	switch($_GET['page'])
	{
		case 'login':
		    $controller = new Controllers\LogInController();
	        $controller -> display();
			break;
		case 'signUp':
			$controller = new Controllers\SignUpController();
			break;
		case 'book':
		    $controller = new Controllers\BookController();
	        $controller -> display();
			break;
		case 'backOffice':
		    $controller = new Controllers\BackOfficeController();
	        $controller -> display();
			break;
		case 'hour':
		    $controller = new Controllers\OpeningHourController();
	        $controller -> display();
			break;
		case 'menus':
			$controller = new Controllers\ListeMenusController();
			break;
		case 'menusFront':
		    $controller = new Controllers\MenusFrontController();
	        $controller -> display();
			break;
		case 'meals':
			$controller = new Controllers\ListeMealsController();
			break;
		case 'categories':
			$controller = new Controllers\ListeCategoriesController();
			break;

		default:
			include 'controllers/accueil.php';
	}
}

else
{
	//Afficher la page d'accueil
	$controller = new Controllers\AccueilController();
	$controller -> checkLog();
	$controller -> display();
	
}