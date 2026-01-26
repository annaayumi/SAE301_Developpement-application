<?php
    require_once '../src/Controller/controller.php';
    require_once '../src/Lib/Psr4AutoloaderClass.php';

    $loader = new App\Gleaubal\Lib\Psr4AutoloaderClass();
    $loader->addNamespace('App\Gleaubal',__DIR__.'/../src');
    $loader->register();

    use App\Gleaubal\Model\Repository\DatabaseConnection;

    $found = false;


    $action = $_GET['action'] ?? $_POST['action'] ??'UsePage_index';
    $lang = $_GET['lang'] ?? $_POST['lang'] ??'Francais';




    // Use page Contact

    if($action == 'UsePage_contact'){
        $found = true;

        if(isset($_POST['pseudo'])){
            $pseudo = $_POST['pseudo'];
            $commentaire = $_POST['commentaire'];
            $note = $_POST['note'];

            DatabaseConnection::insertAvis($pseudo,$commentaire,$note);            
        }
        $liste_avis = DatabaseConnection::getAvis();
        if($lang == "Francais"){Controller::UsePage('contact_fr.php',['liste_avis' => $liste_avis]);}
        if($lang == "English"){Controller::UsePage('contact_en.php',['liste_avis' => $liste_avis]);}
    }


    // Use page carte
    if ($action == 'UsePage_carte'){
        $found = true;
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

        $dataSet = [];

        if(isset($_GET['unite_checkbox'])){
            $unite = $_GET['unite']??NULL;
        }
        if(isset($_GET['plateforme_checkbox'])){
            $plateforme = $_GET['plateforme']??NULL;
        }
        if(isset($_GET['unite']) or isset($date) or isset($_GET['plateforme'])){
            $dataSet = DatabaseConnection::doQuery_with_filters($date ?? "",$unite ?? [],$plateforme ?? []);
        }
        
        if($lang == "Francais"){Controller::UsePage('carte.php',['dataSet' => $dataSet]);}
        if($lang == "English"){Controller::UsePage('map.php',['dataSet' => $dataSet]);}
       
    }
    


    // Use page Index

        if($action == 'UsePage_index'){
            $found = true;
            if($lang == "Francais"){Controller::UsePage('index_fr.php');}
            if($lang == "English"){Controller::UsePage('index_en.php');}
        }

    // Use page A propos    

        if($action == 'UsePage_apropos'){
            $found = true;
            if($lang == "Francais"){Controller::UsePage('apropos.php');}
            if($lang == "English"){Controller::UsePage('about.php');}
        }

    // Use page Contenu A propos

        if($action == 'UsePage_phenomenes'){
            $found = true;
            if($lang == "Francais"){Controller::UsePage('phenomenes.php');}
            if($lang == "English"){Controller::UsePage('phenomenon.php');}
        }

        // Use page Sources de données & formats proposés  

        if($action == 'UsePage_sources'){
            $found = true;
            if($lang == "Francais"){Controller::UsePage('sources_fr.php');}
            if($lang == "English"){Controller::UsePage('sources_en.php');}
        }

        // Use page Missions du projet 
        
        if($action == 'UsePage_missions'){
            $found = true;
            if($lang == "Francais"){Controller::UsePage('missions_fr.php');}
            if($lang == "English"){Controller::UsePage('missions_en.php');}
        }


    // Use page donnees

    if($action == 'UsePage_donnees'){
        $found = true;
        if($lang == "Francais"){Controller::UsePage('donnees.php');}
        if($lang == "English"){Controller::UsePage('data.php');}
    }
    


    // Use page Graphique
    if ($action == 'UsePage_graphique') {
        $found = true;
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

    if ($found == false) {
        http_response_code(404);

        if ($lang == "Francais") {
                if($lang == "Francais"){Controller::UsePage('error.php');}

        exit;
        }

    }
?>