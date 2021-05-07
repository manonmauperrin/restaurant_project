<?php

namespace Controllers;

class SessionController
{
    public function isAdmin():bool
    {
        if(isset($_SESSION['admin']))
        {
            return true;
        }
        else
        return false;
    }
    
    
    
    
    
    
    
    
}