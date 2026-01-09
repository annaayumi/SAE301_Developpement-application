<?php
namespace App\Gleaubal\Model\DataObject;
class Releve extends AbstractDataObject {
    // Attributs
    private int $id_releve;
    private int $id_mesure;
    private string $id_plateforme;
    private string $latitude;
    private string $longitude;
    private string $date;
    private float $valeur;

    // Getters

    public function getIdReleve() : int {
        return $this->id_releve;
    }

    public function getIdMesure() : int {
        return $this->id_mesure;
    }

    public function getIdPlateforme() : string {
        return $this->id_plateforme;
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

    public function formatTableau() : array {
        return array(
            "IdReleveTag" => $this->id_releve,
            "IdMesureTag" => $this->id_mesure,
            "IdPlateformeTag" => $this->id_plateforme,
            "latitudeTag" => $this->latitude,
            "longitudeTag" => $this->longitude,
            "dateTag" => $this->date,
            "valeurTag" => $this->valeur
        );
    }

    // Constructeur
    public function __construct(
        int $id_releve,
        int $id_mesure,
        string $id_plateforme,
        string $latitude,
        string $longitude,
        string $date,
        float $valeur
    ) {
        $this->id_releve = $id_releve;
        $this->id_mesure = $id_mesure;
        $this->id_plateforme = $id_plateforme;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->date = $date;
        $this->valeur = $valeur;
    }
}