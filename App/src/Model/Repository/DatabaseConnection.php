<?php
namespace App\Gleaubal\Model\Repository;
use App\Gleaubal\Config\Conf as Conf;
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
        $this->login, $this->password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
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
}
?>
