<?php

namespace Controllers;

class LogInController
{
	public function display()
	{
		//méthode qui permet d'afficher la page d'accueil
		
		
		//appeler la vue 
		
		$template = "views/connectForm.phtml";
		include 'views/layout.phtml';
	}
	
	public function check()
    {
        // if(isset($_GET['action']) && $_GET['action'] == 'deco')
        // {
        // 	//je déconnecte l'utilisateur
        // 	session_destroy();
        // 	header('location:index.php');
        // 	exit;
        // }
        
        //soumission du formulaire de connexion
        if(!empty($_POST))
        {
        	include 'models/admin.php';
        	
        	$email = $_POST['email'];
        	$pw = $_POST['pw'];
        	
        	//comparer avec ce que j'ai en bdd
        	
        	//aller chercher les infos de l'utilisateur/iden qui essaye de se connecter
        	$admin = getAdminByEmail($email);
        	
        	//si l'identifiant existe dans la base alors âdmin contiendra les infos de cet admin
        	
        	//sinon $admin contiendra false
        	
        	if(!$admin)
        	{
        		$message = "Mauvais identifiant";
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
        			header('location:index.php?page=autre');
        			exit;
        		}
        		else
        		{
        			$message = "Mauvais mot de passe";
        		}
        	}
        }
    }
}