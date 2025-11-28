<?php declare(strict_types=1);
/**
 * DBConnect.php
 *
 * Fournit une connexion PDO unique à la base de données.
 * Charge les variables d'environnement via phpdotenv
 * et expose une méthode statique getPDO() utilisée par les managers.
 *
 * Date : Mercredi 26 novembre 2025
 * Maj  : Vendredi 28 novembre 2025
 * Auteur : Salem Hadjali
 */

namespace App\Database;

use Dotenv\Dotenv;
use PDO;
use PDOException;




class DBConnect
{
    private static ?PDO $pdo = null;


    public static function getPDO(): PDO
    {
        if (self::$pdo !== null) {
            return self::$pdo;
        }

        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load();

        $host = $_ENV['DB_HOST'];
        $db   = $_ENV['DB_DATABASE'];
        $port = $_ENV['DB_PORT'];
        $user = $_ENV['DB_USERNAME'];
        $pass = $_ENV['DB_PASSWORD'];

        $dsn = "mysql:host={$host}:{$port};dbname={$db};charset=utf8mb4";

        try {
            self::$pdo = new PDO($dsn, $user, $pass, [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ]);

            return self::$pdo;
        } catch (PDOException $e) {
            echo "Erreur de connexion à la base de données.\n";
            exit(1);
        }
    }
}
