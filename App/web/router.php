<?php
    require_once '../src/Controller/controller.php';
    require_once '../src/Lib/Psr4AutoloaderClass.php';

    $loader = new App\Gleaubal\Lib\Psr4AutoloaderClass();
    $loader->addNamespace('App\Gleaubal',__DIR__.'/../src');
    $loader->register();

    use App\Gleaubal\Model\Repository\DatabaseConnection;



    $action = $_GET['action'] ?? 'UsePage_index';
    $lang = $_GET['lang'] ?? 'Francais';

    // filtres carte
    $annee = $_GET['annee'] ?? "";
    $mois = $_GET['mois'] ?? "01";
    $unite = $_GET['unite'] ?? ""; 
    $plateforme = $_GET['platforme'] ?? "";



    // page carte avec filtres
    if ($unite != "" or $annee != "" or $plateforme != ""){


        $dataSet = DatabaseConnection::doQuery_with_filters($annee,$mois,$unite,$plateforme);

        if($lang == "Francais"){Controller::UsePage('carte.php',['dataSet' => $dataSet]);}
        if($lang == "English"){Controller::UsePage('map.php',['dataSet' => $dataSet]);}
        
    }
    else{
        


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


        /*
        if ($filtre != NULL ){
            // faire requete sql
        }

        $values = [
            'latitude' => 0.5,
            'longitude' => 0.5,
            'valeur' => 9, 
            'unite' => 9, 
            'date' => 9, 
            'id_plateforme' => 9,
            'unite' => 9,
            'desc' => 9
        ];*/

        
        if($action == 'UsePage_carte'){
            if($lang == "Francais"){Controller::UsePage('carte.php');}
            if($lang == "English"){Controller::UsePage('map.php');}

        }



        // Use page donnees

        if($action == 'UsePage_donnees'){
            if($lang == "Francais"){Controller::UsePage('donnees.php');}
            if($lang == "English"){Controller::UsePage('data.php');}
        }
    }

?>