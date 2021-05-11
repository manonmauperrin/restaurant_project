<?php
//utilisation pour eviter les conflits avec autoloader
namespace Controllers;

class AccueilController
{
    //methode d'affichage template de base
	public function display()
	{
	    //instanciation du model pour appeler les méthodes
	    $model = new \Models\Menus();
        //appel de la méthode du model Menus
        $menus = $model -> getAllMenus();
	   
		//appeler la vue 
		$template = "views/accueil.phtml";
		include 'views/layout.phtml';
	}
	//methode pour recuperer les plats en fonction de la catégorie des menus
	public function getMealByMenu($id)
	{
	    $model2 = new \Models\Meals();
        
        return $model2 -> getMealsByCategory($id);
	}
	//méthode pour se déconnecter
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