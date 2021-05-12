<?php

    namespace Controllers;
    
    abstract class LayOutController
    {
        protected $table;
        
        public function __construct()
        {
            $this -> table = [];
            $this->displayOpeningHour();
            
        }
        
        public function displayOpeningHour()
        {
            $model = new \Models\OpeningHour();
        
            $hours = $model -> getHoraires();
            
            //[
            //    ['texte'=>'Lun-Mar','horaire'=>'9AM-10PM'],
            //    ['texte'=>'Mer-Jeu','horaire'=>'8AM-10PM']
            //]
            $table = [];
            
            foreach($hours as $hour)
            {
                $find=false;
                foreach($table as $index => $tab)
                {
                    if($hour['hours'] == $tab['horaire']){
                        if(!stristr($tab['texte'],'&')){
                            $tab['texte']=substr($tab['texte'],0,3).' & '.substr($hour['days'],0,3);
                        }
                        else
                        {
                            $tab['texte']=$tab['texte'].' & '.substr($hour['days'],0,3); 
                        }
                        
                        $find = true;
                        $table[$index] = $tab;
                        
                    }
                    
                }
                
                if(!$find)
                {
                    $table[]=  ['texte'=>$hour['days'],'horaire'=>$hour['hours']];
                }
                
            }
            $this -> table = $table;
            
        }
    }