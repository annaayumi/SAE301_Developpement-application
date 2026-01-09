<?php
namespace App\Gleaubal\Model\Repository;

use App\Gleaubal\Model\DataObject\AbstractDataObject;
use App\Gleaubal\Model\DataObject\Releve as Releve;

class ReleveRepository extends AbstractRepository {
    // Fonction permettant de récuperer le nom de la table
    public function getNomTable(): string
    {
     return 'releve';
    }

    // Fonction permettant de récuperer le nom de la cle primaire
    public function getNomClePrimaire(): string
    {
     return 'id_releve';
    }

    // Fonction permettant de récuperer les noms des colonnes
    public function getNomsColonnes(): array
    {
     return ['id_releve', 'id_mesure','id_plateforme','latitude','longitude','date','valeur'];
    }

    // Méthode permettant de créer un objet Releve
    public function construire($releveTableau) : Releve
    { 
        return new Releve($releveTableau['id_releve'], $releveTableau['id_mesure'], $releveTableau['id_plateforme'], $releveTableau['latitude'], $releveTableau['longitude'], $releveTableau['date'], $releveTableau['valeur']);
    }
}