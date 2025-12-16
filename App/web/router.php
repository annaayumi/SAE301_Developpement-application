<?php
    require_once 'controller.php';

    $action = $_GET['action'];

    // Use page Index

    if($action == 'UsePage_index'){
        controller::UsePage('index.php');
    }

    // Use page A propos

    if($action == 'UsePage_a_propos'){
        controller::UsePage('a_propos.php');
    }

    // Use page Contenu A propos
    if($action == 'UsePage_Contenu_a_Propos'){
        controller::UsePage('Contenu_a_propos.php');
    }

    // Use page Contact
    if($action == 'UsePage_contact'){
        controller::UsePage('contact.php');
    }

    // Use page Carte
    if($action == 'UsePage_carte'){
        controller::UsePage('carte.php');
    }

?>