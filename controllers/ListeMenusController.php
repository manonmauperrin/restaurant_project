<?php

namespace Controllers;

class ListeMenusController
{   
    use SessionController;
    
    public  function __construct()
    {
        $this -> redirectIfNotAdmin();

        // $this -> session = new SessionController();
        
        // if($this -> session -> isAdmin() == false)
        // {
        //     header('location:index.php');
        // 	exit;
        // }
        
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
            $this -> deleteMenu();
        }
        else
        {
            $this -> display();
        }
    }
    
    public function createMenu()
    {
        $model = new \Models\Menus();
        
        $createMenu = $model -> createNewMenu($_POST['title'], $_POST['src'], $_POST['alt'], $_POST['price'], $_POST['idCategory']);
    }
    
    public function deleteMenu()
    {
        $model = new \Models\Menus();
        
        $deleteMenu = $model -> deleteMenuById($_GET['id']);
        
        header('location:menus');
        exit;
    }

    public function display()
    {
        //appeller la vue
        $model = new \Models\Menus();
        
        $menus = $model -> getAllMenus();
        
        $template = "views/listeMenus.phtml";
        include 'views/layout.phtml';
    }
    
    public function displayForm()
    {
        if(isset($_GET['action']) && $_GET['action'] == 'update')
        {
            $model2 = new \Models\Menus();
        
            $menu = $model2 -> getMenuById($_GET['id']);
            
            if(!empty($_POST))
            {
                $model3 = new \Models\Menus();
                
                if(empty($_FILES['src']['name']))
                {
                    $image = $_POST['oldSrc'];
                }
                else
                {
                    $image = "assets/img/{$_FILES['src']['name']}";
                    move_uploaded_file ($_FILES['src']['tmp_name'], $image);
                }
                
                $updateMenu = $model3 -> updateMenu($_POST['title'], $image, $_POST['alt'], $_POST['price'], $_POST['idCategory'], $_GET['id']);
                
                header('location:menus');
        	    exit;
            }
        }
        else
        {
            if(!empty($_POST))
            {
                $model3 = new \Models\Menus();
                
                $image = "assets/img/{$_FILES['src']['name']}";
                move_uploaded_file ($_FILES['src']['tmp_name'], $image);
                
                $createMenu = $model3 -> createNewMenu($_POST['title'], $image, $_POST['alt'], $_POST['price'], $_POST['idCategory']);
                
                header('location:menus');
        	    exit;
            }
        }
        
        //appeller la vue
        $model = new \Models\Category();
        
        $categories = $model -> getMealsCategories();
        
        $template = "menusUpdateForm.phtml";
        include 'views/layout.phtml';
    }
}