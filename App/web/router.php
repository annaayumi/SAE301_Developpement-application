<?php
    require_once '../src/Controller/controller.php';

    $action = $_GET['action'] ?? 'UsePage_index';
    $lang = $_GET['lang'] ?? 'Francais';


    // Use page Index

    if($action == 'UsePage_index'){
        if($lang == "Francais"){controller::UsePage('index_fr.php');}
        if($lang == "English"){controller::UsePage('index_en.php');}
    }

    // Use page A propos

    if($action == 'UsePage_apropos'){
        if($lang == "Francais"){controller::UsePage('apropos.php');}
        if($lang == "English"){controller::UsePage('about.php');}
    }

    // Use page Contenu A propos

    if($action == 'UsePage_phenomenes'){
        if($lang == "Francais"){controller::UsePage('phenomenes.php');}
        if($lang == "English"){controller::UsePage('phenomenon.php');}
    }


    // Use page Contact

    if($action == 'UsePage_contact'){
        if($lang == "Francais"){controller::UsePage('contact_fr.php');}
        if($lang == "English"){controller::UsePage('contact_en.php');}
    }


    // Use page Carte

    if($action == 'UsePage_carte'){
        if($lang == "Francais"){controller::UsePage('carte.php');}
        if($lang == "English"){controller::UsePage('map.php');}
    }



    // Use page donnees

    if($action == 'UsePage_donnees'){
        if($lang == "Francais"){controller::UsePage('donnees.php');}
        if($lang == "English"){controller::UsePage('data.php');}
    }

?>