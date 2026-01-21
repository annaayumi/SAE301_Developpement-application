<?php
namespace App\Gleaubal\Model\Repository;
use App\Gleaubal\Config\Conf as Conf;

use App\Gleaubal\Model\DataObject\Releve;

use PDO;
class DatabaseConnection {
    // Attributs
    private $pdo;
    private $hostname;
    private $databaseName;
    private $login;
    private $password;
    private static $instance = null;
    // Constructeur
    public function __construct() {
        $this->hostname = Conf::getHostname();
        $this->databaseName = Conf::getDatabase();
        $this->login = Conf::getLogin();
        $this->password = Conf::getPassword();
        // Connexion à la base de données
        // Le dernier argument sert à ce que toutes les chaines de caractères
        // en entrée et sortie de MySql soit dans le codage UTF-8
        $this->pdo = new PDO("mysql:host=$this->hostname;dbname=$this->databaseName",
            $this->login, $this->password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
        );
        // On active le mode d'affichage des erreurs, et le lancement d'exception
        // en cas d'erreur
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    // Getters
    public static function getPdo() {
        return static::getInstance()->pdo;
    }
    // getInstance s'assure que le constructeur sera appelé une seule fois.
    // L'unique instance crée est stockée dans l'attribut $instance
    private static function getInstance() {
        if (is_null(static::$instance)) {
            // Appel du constructeur
            static::$instance = new DatabaseConnection();
        }
        return static::$instance;
    }


    public static function doQuery_with_filters(string $date, string $unite , string $plateforme){
        
        

        $sql = "
        select releves.id_releve, mesure.unite, releves.id_plateforme, type_plateforme.type, 
        type_plateforme.desc, releves.latitude, releves.longitude, releves.date, releves.valeur 
        from releves
        join mesure on releves.id_mesure = mesure.id_mesure
        join plateforme on releves.id_plateforme = plateforme.id
        join type_plateforme on plateforme.id_type = type_plateforme.id_type";

        

        // check filters, concat and bind param
        if ($date != "") { 
            $sql = $sql." where releves.date = :date";
        }

        if ($unite != "") {
            if ($date != ""){
                $sql = $sql." and ";
            }
            else{
                $sql = $sql." where ";
            }

            $sql = $sql." mesure.unite = :unite";

        }

        if ($plateforme != "")  {

            if ($date != "" or $unite != ""){
                $sql = $sql." and ";
            }
            else{
                $sql = $sql." where ";
            }

            $sql = $sql." type_plateforme.type = :plateforme";

        }
        

        $sql = $sql." ;";

        // prep sql
        $PdoStatement = DatabaseConnection::getPdo()->prepare($sql);
        
        if ($date != "") { 
        $PdoStatement->bindParam(':date',$date, PDO::PARAM_STR);}

        if ($unite != "") { 
        $PdoStatement->bindParam(':unite',$unite, PDO::PARAM_STR);}

        if ($plateforme != "") { 
        $PdoStatement->bindParam(':plateforme',$plateforme, PDO::PARAM_STR);}
        

        // exec
        $PdoStatement->execute();

        // create dataset
        $DataSet = [];

        foreach ( $PdoStatement as $row ){
            $tempObj = new Releve(
                    $row['id_releve'], 
                    $row['id_plateforme'], 
                    $row['type'], 
                    $row['desc'], 
                    $row['unite'], 
                    $row['latitude'],
                    $row['longitude'],
                    $row['date'],
                    $row['valeur']);

            $DataSet[] = $tempObj;
  
        }
        return $DataSet;
       
    }

    public static function doQuery_avg_by_year_for_platform(string $idPlateforme): array {
    $pdo = DatabaseConnection::getPdo();

    $sql = "
            SELECT
    r.date AS periode,             
    m.unite AS unite,
    AVG(r.valeur) AS moyenne
    FROM releves r
    JOIN mesure m ON m.id_mesure = r.id_mesure
    WHERE r.id_plateforme = :idp
    GROUP BY periode, unite
    ORDER BY periode ASC;
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([':idp' => $idPlateforme]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>
