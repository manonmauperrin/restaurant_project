<?php

namespace Controllers;

class OpeningHourController
{
    public function display()
    {
	    //instanciation du model pour appeler les méthodes
	    $model = new \Models\OpeningHour();
        //appel de la méthode du model Menus
        $hours = $model -> getHoraires();
        
        if(!empty($_POST))
            { var_dump($_POST);
            
                $model3 = new \Models\OpeningHour();
                
                foreach($_POST as $day => $post)
                {
                    $updateHours = $model3 -> updateHoraires($post, $day);
                }
                
                
                header('location:Back-Office');
        	    exit;
            }
		//appeler la vue 
		$template = "views/openingHour.phtml";
		include 'views/layout.phtml';
    }
    
}
