<?php

namespace Controllers;


class ListeCategoriesController
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
            $this -> deleteCategory();
        }
        else
        {
            $this -> display();
        }
    }
    
    public function createMeal()
    {
        $model = new \Models\Category();
        
        $createCategory = $model -> createNewCategorie($_POST['name'], $_POST['idDish'], $_POST['description']);
    }
    
    public function deleteCategory()
    {
        $model = new \Models\Category();
        
        $deleteCategory = $model -> deleteCategoryById($_GET['id']);
        
        header('location:categories');
        exit;
    }
    
    public function display()
    {
        //appeller la vue
        $model = new \Models\Category();
        
        $categories = $model -> getAllCategories();
        
        $template = "views/listeCategories.phtml";
        include 'views/layout.phtml';
    }
    
    public function displayForm()
    {
        if(isset($_GET['action']) && $_GET['action'] == 'update')
        {
            $model2 = new \Models\Category();
        
            $category = $model2 -> getCategoryById($_GET['id']);
            
            if(!empty($_POST))
            {
                $model3 = new \Models\Category();
                
                $updateCategory = $model3 -> updateCategory($_POST['title'], $_POST['isDish'], $_POST['desc'], $_GET['id']);
                
                header('location:categories');
        	    exit;
            }
        }
        else
        {
            if(!empty($_POST))
            {
                $model3 = new \Models\Category();
                
                $createCategory = $model3 -> createNewCategory($_POST['title'], $_POST['isDish'], $_POST['desc']);
                
                header('location:categories');
        	    exit;
            }
        }
        
        //appeller la vue
        $model = new \Models\Category();
        
        $categories = $model -> getAllCategories();
        
        $template = "categoriesUpdateForm.phtml";
        include 'views/layout.phtml';
    }
    
}