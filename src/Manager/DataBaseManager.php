<?php

namespace App\Manager;

use PDO;
use PDOException;

class DatabaseManager
{
    // Instance unique de la connexion DB
    private static ?PDO $pdo = null;

    /**
     * Connexion à la base de données et renvoi de la connexion PDO.
     * Utilisation interne uniquement.
     
     */
    private static function connectDB(): PDO
    {
        $host = 'localhost';        // Hôte de la base de données
        $dbName = 'fleuriste';      // Nom de la base de données
        $user = 'root';             // Utilisateur MySQL
        $password = 'mysqltests';   // Mot de passe MySQL

        try {
            // Création de l'objet PDO et renvoi de la connexion
            return new PDO(
                "mysql:host=$host;dbname=$dbName;charset=utf8",
                $user,
                $password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Activation des exceptions pour les erreurs
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Mode de récupération des données en tableau associatif

                ]
            );
        } catch (PDOException $e) {
            // Gestion des erreurs de connexion
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    /**
     * Retourne l'instance unique de PDO
     * Utilisation dans les classes enfants avec self::getConnexion();
     * 
     * @return PDO
     */
    protected static function getConnexion(): PDO
    {
        // Vérification de l'existence de la connexion avant de la créer
        if (self::$pdo === null) {
            // Si la connexion n'existe pas, créer une nouvelle connexion
            self::$pdo = self::connectDB();
        }

        // Retourner l'instance de PDO existante ou nouvellement créée
        return self::$pdo;
    }
}
?>
