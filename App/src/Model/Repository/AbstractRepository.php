<?php
namespace App\Gleaubal\Model\Repository;
use App\Gleaubal\Model\DataObject\AbstractDataObject;

abstract class AbstractRepository {
    // Méthode renvoyant la liste des objets
    public function selectAll() : array {
        $pdoStatement = DatabaseConnection::getPdo()->query("SELECT * FROM " . $this->getNomTable() . ";");
        foreach ($pdoStatement as $objetFormatTableau){
            $tableauObjets[] = $this->construire($objetFormatTableau);
        }
        return $tableauObjets;
    }

    protected abstract function getNomTable() : string;
    protected abstract function getNomClePrimaire() : string;
    protected abstract function getNomsColonnes() : array;
    protected abstract function construire(string $objetFormatTableau) : AbstractDataObject;
    public function select(string $valeurClePrimaire): ?AbstractDataObject {
        $sql = "SELECT * FROM " . $this->getNomTable() . " WHERE " . $this->getNomClePrimaire() . " = :valeurClePrimaireTag";
        // Préparation de la requête
        $pdoStatement = DatabaseConnection::getPdo()->prepare($sql);
        $values = array(
            "valeurClePrimaireTag" => $valeurClePrimaire
        );
        // On donne les valeurs et on exécute la requête
        $pdoStatement->execute($values);
        // On récupère les résultats comme précédemment
        // Note: fetch() renvoie false si pas d'objet correspondant
        $objet = $pdoStatement->fetch();
        if ($objet == false) {
            return null;
        }
        else {
            return $this->construire($objet);
        }
    }
    // Méthode permettant de supprimer un objet de la liste en identifiant sa clé primaire saisi en paramètre
    public function delete(string $valeurClePrimaire) : void {
        $sql = "DELETE FROM " . $this->getNomTable() . " WHERE " . $this->getNomClePrimaire() . " = :valeurClePrimaireTag;";
        $pdoStatement = DatabaseConnection::getPdo()->prepare($sql);
        $params = array(
            "valeurClePrimaireTag" => $valeurClePrimaire
        );
        $pdoStatement->execute($params);
    }
}