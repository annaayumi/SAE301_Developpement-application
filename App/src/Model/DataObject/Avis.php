<?php
namespace App\Gleaubal\Model\DataObject;
class Avis{
    // Attributs
    private int $id;
    private string $pseudo;
    private string $commentaire;
    private int $note;
    private string $created_at;
    

    // Getters

    public function getId() : int {
        return $this->id;
    }

    public function getPseudo() : string {
        return $this->pseudo;
    }

      public function getCommentaire() : string {
        return $this->commentaire;
    }

      public function getNote() : int {
        return $this->note;
    }
    public function getCreated_at() : string {
        return $this->created_at;
    }


    // Constructeur
    public function __construct(
        int $id,
        string $pseudo,
        string $commentaire,
        int $note,
        string $created_at     

    ) {
        $this->id = $id;
        $this->pseudo = $pseudo;
        $this->commentaire = $commentaire;
        $this->note = $note;
        $this->created_at = $created_at;


   
    }
}
    
