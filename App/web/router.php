<?php
    require_once '../src/Controller/controller.php';

    $action = $_GET['action'];

    // Use page Index

    if($action == 'UsePage_index'){
        controller::UsePage('index.php');
    }

    // Use page A propos

    if($action == 'UsePage_apropos'){
        controller::UsePage('apropos.php');
    }

    // Use page Contenu A propos
    if($action == 'UsePage_contenu_a_propos'){
        controller::UsePage('contenu_a_propos.php');
    }

    // Use page Contact
    if($action == 'UsePage_contact'){
        controller::UsePage('contact.php');
    }

    // Use page Carte
    if($action == 'UsePage_carte'){
        controller::UsePage('carte.php');
    }


    // Use page donnees
    if($action == 'UsePage_donnees'){
        controller::UsePage('donnees.php');
    }

?>