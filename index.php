<?php

spl_autoload_register(function ($DataBase) {
    include $DataBase . '.php';
});


//index.php?page=jeu
session_start();


include "controllers/AccueilController.php";
include "controllers/LogInController.php";

include 'models/Database.php';
// include "models/Admin.php";
// include "models/Booking.php";
// include "models/Category.php";
// include "models/Config.php";
// include "models/Meal.php";
// include "models/Menus.php";
// include "models/OpeningHour.php";
// include "models/Slider.php";
// include "models/Users.php";

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
		case 'admin':
		    $controller = new Controllers\AdminController();
	        $controller -> display();
			break;
		case 'users':
		    $controller = new Controllers\UsersController();
	        $controller -> display();
			break;
		// case 'BackOffice':
		//     $controller = new Controllers\BackOfficeController();
	 //       $controller -> display();
		// 	break;
		default:
			include 'controllers/accueil.php';
	}
}

else
{
	//Afficher la page d'accueil
	$controller = new Controllers\AccueilController();
	$controller -> display();
}