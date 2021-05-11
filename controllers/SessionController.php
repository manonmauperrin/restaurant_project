<?php

namespace Controllers;

//class SessionController
//{
    // public function isAdmin():bool
    // {
    //     if(isset($_SESSION['admin']))
    //     {
    //         return true;
    //     }
    //     else
    //     return false;
    // }
    
//}

Trait SessionController
{
	public function redirectIfNotAdmin()
	{
		if(!isset($_SESSION['admin']))
		{
			header('location:index.php');
		}
	}
}
