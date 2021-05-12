<?php

namespace Controllers;

class MenusFrontController
{   
    
    public function display()
    {
        $model = new \Models\Category();
        
        $categories = $model -> getMealsCategories();
        
        
        $model0 = new \Models\Category();
        
        $others = $model0 -> getOthersCategories();
        
        
        $model2 = new \Models\Meals();
        
        $meals = $model2 -> getMealsIsDish();
        
        $template = "views/menus.phtml";
        include 'views/layout.phtml';
    }
    
    public function getOthersById($id)
	{
	    $model2 = new \Models\Meals();
        
        return $model2 -> getMealsByCategory($id);
	}
}