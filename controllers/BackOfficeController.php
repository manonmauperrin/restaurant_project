<?php
namespace Controllers;


class BackOfficeController 
{
    use SessionController;
    
    public  function __construct()
    {
        $this -> redirectIfNotAdmin();
    }
    public function display()
	{
		//méthode qui permet d'afficher la page d'accueil
		
		//appeler la vue 
		$template = "views/backOffice.phtml";
		include 'views/layout.phtml';
	}
}