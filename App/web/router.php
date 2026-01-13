<?php
    require_once '../src/Controller/controller.php';

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


?>