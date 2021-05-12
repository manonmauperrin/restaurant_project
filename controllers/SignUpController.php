<?php

namespace Controllers;

class SignUpController
{
	//déclarer une propriété dans une classe
	private $message;
	
	public function __construct()
	{
		$this -> message = "";
		
		if(!empty($_POST))
        {
        	$this -> check();
        }
        else{
        	$this->display();
        }
        if(isset($_SESSION['admin']) || isset($_SESSION['users']))
		{
			header('location:index.php');
			exit;
		}
	}
	public function display()
	{
	    $firstName = '';
    	$lastName = '';
    	$email = '';
    	$tel = '';
	    
		$template = "views/signUp.phtml";
		include 'views/layout.phtml';
		//appeler la vue 
	}
	
	public function createUser($email, $firstName, $lastName, $tel, $pwhash)
    {
        if(!empty($_POST))
        {
        $model = new \Models\Users();
        
        $createUser = $model -> createNewUser($email, $firstName, $lastName, $tel, $pwhash);
        
        header('location:login');
        exit;
        }
    }
    
    public function check()
    {

    	$firstName = $_POST['firstName'];
    	$lastName = $_POST['lastName'];
    	$email = $_POST['email'];
    	$tel = $_POST['tel'];
    	$pw = $_POST['pw'];
    	$pw2 = $_POST['confirmPw'];
    	
    	if(empty($firstName) || empty($lastName) || empty($email) || empty($tel) || empty($pw) || empty($pw2))
    	{
    	    $this -> message = "Champ vide";
    	}
    	
    	else
    	{
    	   if($pw == $pw2)
    	    {
    	    $pwhash = password_hash($pw, PASSWORD_DEFAULT);
    	    $this -> createUser($email, $firstName, $lastName, $tel, $pwhash);
    	    }
        	else
    	    {
    	    $this -> message = "Mots de passe ne correspondent pas";
    	    } 
    	}
    	
    	 
		$template = "views/signUp.phtml";
		include 'views/layout.phtml';
    	
    }
    	
}