<?php
namespace App\Gleaubal\Model\Repository;
use App\Gleaubal\Model\Repository\DatabaseConnection;
use PDO;


class AvisRepository {

    public static function insertAvis(string $pseudo, string $commentaire, int $note): void {

        $pdo = DatabaseConnection::getConnection();

        $stmt = $pdo->prepare(
            "INSERT INTO avis (pseudo, commentaire, note)
             VALUES (:pseudo, :commentaire, :note)"
        );

        $stmt->execute([
            'pseudo' => $pseudo,
            'commentaire' => $commentaire,
            'note' => $note
        ]);
    }

    public static function getAvis(): array {
        $db = DatabaseConnection::getPDO();
        return $db->query("SELECT * FROM avis ORDER BY created_at DESC")->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>