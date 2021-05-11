<?php

namespace Controllers;


class ListeMealsController
{
    use SessionController;
    
    public  function __construct()
    {
        $this -> redirectIfNotAdmin();

        if(isset($_GET['action']) && $_GET['action'] == 'create')
        {
            $this -> displayForm();
        }
        else if(isset($_GET['action']) && $_GET['action'] == 'update')
        {
            $this -> displayForm();
        }
        else if(isset($_GET['action']) && $_GET['action'] == 'delete')
        {
            $this -> deleteMeal();
        }
        else
        {
            $this -> display();
        }
    }
    
    public function createMeal()
    {
        $model = new \Models\Meals();
        
        $createMeal = $model -> createNewMeal($_POST['name'], $_POST['src'], $_POST['akt'], $_POST['idCategory']);
    }
    
    public function deleteMeal()
    {
        $model = new \Models\Meals();
        
        $deleteMeal = $model -> deleteMealById($_GET['id']);
        
        header('location:meals');
        exit;
    }
    
    public function display()
    {
        //appeller la vue
        $model = new \Models\Meals();
        
        $meals = $model -> getAllMeals();
        
        $template = "views/listeMeals.phtml";
        include 'views/layout.phtml';
    }
    
    public function displayForm()
    {
        if(isset($_GET['action']) && $_GET['action'] == 'update')
        {
            $model2 = new \Models\Meals();
        
            $meal = $model2 -> getMealById($_GET['id']);
            
            if(!empty($_POST))
            {
                $model3 = new \Models\Meals();
                
                if(empty($_FILES['src']['name']))
                {
                    $image = $_POST['oldSrc'];
                }
                else
                {
                    $image = "assets/img/{$_FILES['src']['name']}";
                    move_uploaded_file ($_FILES['src']['tmp_name'], $image);
                }
                
                $updateMeal = $model3 -> updateMeal($_POST['title'], $image, $_POST['alt'], $_POST['idCategory'], $_GET['id']);
                
                header('location:meals');
        	    exit;
            }
        }
        else
        {
            if(!empty($_POST))
            {
                $model3 = new \Models\Meals();
                
                $image = "assets/img/{$_FILES['src']['name']}";
                move_uploaded_file ($_FILES['src']['tmp_name'], $image);
                
                $createMeal = $model3 -> createNewMeal($_POST['title'], $image, $_POST['alt'], $_POST['idCategory']);
                
                header('location:meals');
        	    exit;
            }
        }
        
        //appeller la vue
        $model = new \Models\Category();
        
        $categories = $model -> getMealsCategories();
        
        $template = "mealsUpdateForm.phtml";
        include 'views/layout.phtml';
    }
    
}