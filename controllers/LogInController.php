<?php

namespace Controllers;

class LogInController
{
	//déclarer une propriété dans une classe (private = sans heritage)
	private $message;
	
	public function __construct()
	{
		//instancie une porpriété message vide
		$this -> message = "";
		
		//verif si formulaire est rempli lancement methode check 
		if(!empty($_POST))
        {
        	$this -> check();
        }
        
        //si je suis connecter (admin/user) redirection page accueil (pour pas pouvoir se reconnecter (=incohérent))
        if(isset($_SESSION['admin']) || isset($_SESSION['users']))
		{
			//redirection
			header('location:index.php');
			exit;
		}
	}
	
	//affichage
	public function display()
	{
		$template = "views/connectForm.phtml";
		include 'views/layout.phtml';
		//appeler la vue 
	}
	//verif champs vides/ confirm mdp
	public function check()
    {
        //soumission du formulaire de connexion
    	
    	$email = $_POST['email'];
    	$pw = $_POST['pw'];
    	
    	//instance POO
    	$model = new \Models\Admin();
    	$model2 = new \Models\Users();
    	
    	//aller chercher les infos de l'utilisateur/ident qui essaye de se connecter
    	$admin = $model -> getAdminByEmail($email);
    	$user = $model2 -> getUsersByEmail($email);
    	
    	//check identifiant
    	if(!$admin && !$user)
    	{
    		$this -> message = "Mauvais email";
    	}
    	else
    	{
    		//vérifier le mot de passe
    		if(password_verify($pw,$admin['password']))
    		{
    			//le mot de passe correcpond
    			//connecter l'utilisateur
    			$_SESSION['admin'] = $admin['prenom'].' '.$admin['nom'];
    			//redirige vers la page tableau de bord du backoffice
    			header('location:index.php');
    			exit;
    		}
    		
    		else if(password_verify($pw,$user['password']))
    		{
    			//le mot de passe correcpond
    			//connecter l'utilisateur
    			$_SESSION['users'] = $user['firstName'].' '.$user['lastName'];
    			//redirige vers la page tableau de bord du backoffice
    			header('location:index.php');
    			exit;
    		}
    		else
    		{
    			$this -> message = "Mauvais mot de passe";
    		}
    		
    		
    	}
    	
    }
}