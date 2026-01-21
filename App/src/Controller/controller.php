<?php
use App\Gleaubal\Model\Repository\AvisRepository;
class Controller {

    public static function UsePage(string $Vue, array $passed_vars = []) : void {
        extract($passed_vars);
        require dirname(__DIR__)."/view/$Vue";// Charge la vue 
    }

    public static function submitAvis(): void {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $pseudo = $_POST['pseudo'] ?? '';
            $commentaire = $_POST['commentaire'] ?? '';
            $note = $_POST['note'] ?? '';

            if ($pseudo !== '' && $commentaire !== '' && $note !== '') {
                AvisRepository::insertAvis(
                    htmlspecialchars($pseudo),
                    htmlspecialchars($commentaire),
                    (int)$note
                );
            }
        }
    }

    
}
?>