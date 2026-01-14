<?php
namespace App\Gleaubal\Model\DataObject;
class Releve /*extends AbstractDataObject */{
    // Attributs
    private int $id_releve;
    private string $id_plateforme;
    private string $plateforme_type;
    private string $plateforme_type_desc;
    private string $unite;
    private string $latitude;
    private string $longitude;
    private string $date;
    private float $valeur;


    // Getters

    public function getIdReleve() : int {
        return $this->id_releve;
    }

    public function getIdPlateforme() : string {
        return $this->id_plateforme;
    }

      public function getPlateformeType() : string {
        return $this->plateforme_type;
    }

      public function getPlateformeTypeDesc() : string {
        return $this->plateforme_type_desc;
    }

    public function getUnite() : string {
        return $this->unite;
    }

    public function getLatitude() : string {
        return $this->latitude;
    }

    public function getLongitude() : string {
        return $this->longitude;
    }

    public function getDate() : string {
        return $this->date;
    }

    public function getValeur() : float {
        return $this->valeur;
    }

    // Constructeur
    public function __construct(
        int $id_releve,
        string $id_plateforme,
        string $plateforme_type,
        string $plateforme_type_desc,      
        string $unite,
        string $latitude,
        string $longitude,
        string $date,
        float $valeur,
    ) {
        $this->id_releve = $id_releve;
        $this->id_plateforme = $id_plateforme;
        $this->plateforme_type = $plateforme_type;
        $this->plateforme_type_desc = $plateforme_type_desc;
        $this->unite = $unite;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->date = $date;
        $this->valeur = $valeur;


   
    }
}
    
