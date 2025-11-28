<?php declare(strict_types=1);

namespace App\Manager;

use App\Database\DBConnect;
use App\Entity\Contact;
use PDO;



class ContactManager
{
    /**
     * Retourne un tableau d'objets Contact
     */
    public function findAll(): array
    {
        $pdo = DBConnect::getPDO();
        $stmt = $pdo->query("SELECT * FROM contact ORDER BY id ASC");

        $rows = $stmt->fetchAll();

        $contacts = [];

        foreach ($rows as $row) {
            $contacts[] = new Contact(
                (int) $row['id'],
                $row['name'],
                $row['email'],
                $row['phone_number']
            );
        }

        return $contacts;
    }

    /**
     * Retourne un contact par son ID, ou null s'il n'existe pas.
     */
    public function findById(int $id): ?Contact
    {
        $pdo = DBConnect::getPDO();

        $stmt = $pdo->prepare("SELECT * FROM contact WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch();

        if (!$row) {
            return null;
        }

        return new Contact(
            (int) $row['id'],
            $row['name'],
            $row['email'],
            $row['phone_number']
        );
    }
   
    
}
