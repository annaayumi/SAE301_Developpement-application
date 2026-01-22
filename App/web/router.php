<?php
    require_once '../src/Controller/controller.php';
    require_once '../src/Lib/Psr4AutoloaderClass.php';

    $loader = new App\Gleaubal\Lib\Psr4AutoloaderClass();
    $loader->addNamespace('App\Gleaubal',__DIR__.'/../src');
    $loader->register();

    use App\Gleaubal\Model\Repository\DatabaseConnection;


    $action = $_GET['action'] ?? 'UsePage_index';
    $lang = $_GET['lang'] ?? 'Francais';

    // verify checkbox toggle (filtres carte)


    if(isset($_GET['date_checkbox'])){
        
        $date = "";
        $annee = $_GET['annee'] ?? "";
        $mois = $_GET['mois'] ?? "";

        // annee + mois concat
        if ((int)$mois < 10 and $mois != ""){
            $mois = "0".$mois;
            $date = $annee."-".$mois;
        }
    }

    if(isset($_GET['unite_checkbox'])){
        $unite = $_GET['unite'];
    }
    if(isset($_GET['plateforme_checkbox'])){
        $plateforme = $_GET['plateforme'];
    }

    // page carte avec filtres
    if ((isset($unite) or isset($date) or isset($plateforme)) and $action == 'UsePage_carte'){

        $dataSet = DatabaseConnection::doQuery_with_filters($date ?? "",$unite ?? [],$plateforme ?? []);

        //var_dump($dataSet);
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

        
        if($action == 'UsePage_carte'){
            if($lang == "Francais"){Controller::UsePage('carte.php');}
            if($lang == "English"){Controller::UsePage('map.php');}

        }

        // Use page donnees

    if($action == 'UsePage_donnees'){
        if($lang == "Francais"){Controller::UsePage('donnees.php');}
        if($lang == "English"){Controller::UsePage('data.php');}
    }

    // Use page Sources de données & formats proposés  

    if($action == 'UsePage_sources'){
        if($lang == "Francais"){Controller::UsePage('sources_fr.php');}
        if($lang == "English"){Controller::UsePage('sources_en.php');}
    }

    // Use page Missions du projet 
    
    if($action == 'UsePage_missions'){
        if($lang == "Francais"){Controller::UsePage('missions_fr.php');}
        if($lang == "English"){Controller::UsePage('missions_en.php');}
    }


        // Use page Graphique
    if ($action == 'UsePage_graphique') {
        $idPlateforme = $_GET['idPlateforme'] ?? '';

        if ($idPlateforme == '') {
            die("Paramètre idPlateforme manquant.");
        }

        $series = DatabaseConnection::doQuery_avg_by_year_for_platform($idPlateforme);

        if ($lang == "Francais") {
            Controller::UsePage('graphique.php', [
                'idPlateforme' => $idPlateforme,
                'series' => $series
            ]);
        }

        if ($lang == "English") {
            Controller::UsePage('graph.php', [
                'idPlateforme' => $idPlateforme,
                'series' => $series
            ]);
        }
    }

}
?>