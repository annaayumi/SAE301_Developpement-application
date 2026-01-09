<?php
    namespace App\Gleaubal\Web;
    use App\Gleaubal\Controller\Controller as Controller;

    $action = $_GET['action'] ?? 'UsePage_index';
    $lang = $_GET['lang'] ?? 'Francais';


    // Use page Index

    if($action == 'UsePage_index'){
        if($lang == "Francais"){Controller::UsePage('index_fr.php');}
        if($lang == "English"){Controller::UsePage('index_en.php');}
    }

    // Use page A propos

    if($action == 'UsePage_apropos'){
        if($lang == "Francais"){Controller::UsePage('apropos.php');}
        if($lang == "English"){Controller::UsePage('about.php');}
    }

    // Use page Contenu A propos

    if($action == 'UsePage_phenomenes'){
        if($lang == "Francais"){Controller::UsePage('phenomenes.php');}
        if($lang == "English"){Controller::UsePage('phenomenon.php');}
    }


    // Use page Contact

    if($action == 'UsePage_contact'){
        if($lang == "Francais"){Controller::UsePage('contact_fr.php');}
        if($lang == "English"){Controller::UsePage('contact_en.php');}
    }


    // Use page Carte

    if($action == 'UsePage_carte'){
        if($lang == "Francais"){Controller::UsePage('carte.php');}
        if($lang == "English"){Controller::UsePage('map.php');}
    }



    // Use page donnees

    if($action == 'UsePage_donnees'){
        if($lang == "Francais"){Controller::UsePage('donnees.php');}
        if($lang == "English"){Controller::UsePage('data.php');}
    }

<<<<<<< HEAD
    // Use page phenomenes

    if($action == 'UsePage_phenomenes'){
        if($lang == "Francais"){Controller::UsePage('phenomenes.php');}
        if($lang == "English"){Controller::UsePage('phenomenon.php');}
    }


=======
>>>>>>> f3595f04db08990eb7a35c03d4a9de21c927f256
?>