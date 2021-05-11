<?php
namespace Controllers;


class BackOfficeController 
{
    public  function __construct()
    {
        $this -> session = new SessionController();
        if($this -> session -> isAdmin() == false)
        {
            header('location:index.php');
        	exit;
        }
    }
    public function display()
	{
		//méthode qui permet d'afficher la page d'accueil
		
		//appeler la vue 
		$template = "views/backOffice.phtml";
		include 'views/layout.phtml';
	}
}