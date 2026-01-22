<?php
use App\Gleaubal\Model\Repository\AvisRepository;
class Controller {

    public static function UsePage(string $Vue, array $passed_vars = []) : void {
        extract($passed_vars);
        require dirname(__DIR__)."/view/$Vue";// Charge la vue 
    }
    
}
?>