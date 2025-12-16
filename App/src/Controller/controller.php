<?php


class controller{

    public static function UsePage(string $Vue) : void {
        require "../view/$Vue"; // Charge la vue
    }
     
}

?>