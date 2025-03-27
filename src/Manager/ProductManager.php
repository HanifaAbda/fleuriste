<?php
namespace App\Manager;

use App\Model\Product;
/**
 * CarManager
 * Représente un gestionnaire de la table Car
 * Contient les méthodes et requêtes pour la table Car
 * Hérite de DatabaseManager, donc accès à la connexion PDO
 * via la méthode héritée statique getConnexion()
 */
class ProductManager extends DatabaseManager
{
    /**
     * Récupère toutes les lignes de la table Car
     * @return array Tableau d'instances Car.
     */
    public function selectAll(): array
    {
        //Récupération de la connexion PDO et requête SQL
        $requete = self::getConnexion()->prepare("SELECT * FROM product;");
        $requete->execute();

        $arrayProducts = $requete->fetchAll();
        //Créer un tableau qui contiendra les objets Car
        $products = [];
        //Boucle sur le tableau $arrayCars pour créer les objets Car 
        // Chaque élément du tableau $arrayCar est un tableau associatif
        foreach ($arrayProducts as $arrayProduct) {
            //Istantiation d'un objet Car avec les données du tableau associatif  
            $products[] = new Product($arrayProduct["id"], $arrayProduct["name"], $arrayProduct["category"], $arrayProduct["price"], $arrayProduct["image"], $arrayProduct["description"]);
        }

        return $products;
    }

    /**
     * Récupère une ligne de la table Car par ID
     * @param  int $id
     * @return Product
     */
    public function selectByID(int $id): Product|false
    {
        $requete = self::getConnexion()->prepare("SELECT * FROM product WHERE id = :id;");
        $requete->execute([
            ":id" => $id
        ]);

        $arrayProduct = $requete->fetch();

        //Si pas de résultat fetch()
        if(!$arrayProduct) {

            return false;
        }
        //Renvoyer l'instance d'un objet Car avec les données du tableau associatif
        return new Product($arrayProduct["id"], $arrayProduct["name"], $arrayProduct["category"], $arrayProduct["price"], $arrayProduct["image"], $arrayProduct["description"]);
    }

    /**
     * insertCar
     *
     * @param  Product $product
     * @return bool
     */
    public function insert(product $product): bool
    {
        $requete = self::getConnexion()->prepare("INSERT INTO product (name,category,price,description,image,) VALUES (:name,:category,:price,:decription,:image);");

        $requete->execute([
            ":name" => $product->getName(),
            ":category" => $product->getCategory(),
            ":price" => $product->getPrice(),
            ":description" => $product->getDescription(),
            ":image" => $product->getImage()
        ]);

        return $requete->rowCount() > 0;
    }

    /**
     * updateCarByID
     *
     * @param  Product $car
     * @return bool
     */
    public function update(Product $product): bool
    {
        $requete = self::getConnexion()->prepare("UPDATE product SET name = :name, category = :category, price = :price, description = :description, image = :image WHERE id = :id;");
        $requete->execute(
            [
                ":name" => $product->getName(),
                ":brand" => $product->getCategory(),
                ":horsePower" => $product->getPrice(),
                ":description" => $product->getDescription(),
                ":image" => $product->getImage(),
                ":id" => $product->getId()
            ]
        );

        return $requete->rowCount() > 0;
    }

    /**
     * deleteCarByID
     *
     * @param  int $id
     * @return bool
     */
    public function deleteByID(int $id): bool
    {
        $requete = self::getConnexion()->prepare("DELETE FROM product WHERE id = :id;");
        $requete->execute([
            ":id" => $id
        ]);

        return $requete->rowCount() > 0;
    }
}
