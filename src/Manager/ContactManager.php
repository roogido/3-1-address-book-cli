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
   
    /**
     * 
     * Création d'un nouveau contact
     */    
    public function create(string $name, string $email, string $phone): Contact
    {
        $pdo = DBConnect::getPDO();

        $stmt = $pdo->prepare("
            INSERT INTO contact (name, email, phone_number)
            VALUES (:name, :email, :phone)
        ");

        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':phone', $phone) ;

        $stmt->execute();

        $id = (int) $pdo->lastInsertId();

        return new Contact($id, $name, $email, $phone);
    }

    /**
     * Suppression d'un contact à partir de son id
     */       
    public function delete(int $id): bool
    {
        $pdo = DBConnect::getPDO();

        $stmt = $pdo->prepare("DELETE FROM contact WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    
}
