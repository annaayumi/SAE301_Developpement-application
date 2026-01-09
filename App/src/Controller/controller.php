<?php

class Controller {


    public static function UsePage(string $Vue) : void {
        require dirname(__DIR__)."/view/$Vue";// Charge la vue 
    }

    public static function ChangeLang(string $lang) : void {
        require dirname(__DIR__)."/view/$lang";// Charge la vue 
    }
    
     
}

?>