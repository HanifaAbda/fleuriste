<?php
namespace App\Manager;

use App\Model\Product;
use App\Manager\DatabaseManager;
/**
 * ProductManager
 * Représente un gestionnaire de la table Product
 * Contient les méthodes et requêtes pour la table Product
 * Hérite de DatabaseManager, donc accès à la connexion PDO
 * via la méthode héritée statique getConnexion()
 */
class ProductManager extends DatabaseManager
{
    /**
     * Récupère toutes les lignes de la table Product
     * @return array Tableau d'instances Product.
     */
    public function selectAll(): array
    {
        //Récupération de la connexion PDO et requête SQL
        $requete = self::getConnexion()->prepare("SELECT * FROM product;");
        $requete->execute();

        $arrayProducts = $requete->fetchAll();
        //Créer un tableau qui contiendra les objets product
        $products = [];
        //Boucle sur le tableau $arrayProducts pour créer les objets product 
        // Chaque élément du tableau $arrayProduct est un tableau associatif
        foreach ($arrayProducts as $arrayProduct) {
            //Istantiation d'un objet Product avec les données du tableau associatif  
            $products[] = new Product($arrayProduct["id"], $arrayProduct["name"], $arrayProduct["category"], $arrayProduct["price"], $arrayProduct["image"], $arrayProduct["description"]);
        }

        return $products;
    }

    /**
     * Récupère une ligne de la table Product par ID
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
        //Renvoyer l'instance d'un objet Product avec les données du tableau associatif
        return new Product($arrayProduct["id"], $arrayProduct["name"], $arrayProduct["category"], $arrayProduct["price"], $arrayProduct["description"], $arrayProduct["image"] );
    }

    /**
     * insertProduct
     *
     * @param  Product $product
     * @return bool
     */
    public function insert(Product $product): bool
    {
        $requete = self::getConnexion()->prepare("INSERT INTO product (id,name,category,price,description,image) VALUES (:name,:category,:price,:decription,:image);");

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
     * @param  Product $product
     * @return bool
     */
    public function update(Product $product): bool
    {
        $requete = self::getConnexion()->prepare("UPDATE product SET name = :name, category = :category, price = :price, description = :description, image = :image WHERE id = :id;");
        $requete->execute(
            [
                ":id" => $product->getId(),
                ":name" => $product->getName(),
                ":category" => $product->getCategory(),
                ":price" => $product->getPrice(),
                ":description" => $product->getDescription(),
                ":image" => $product->getImage(),
                
            ]
        );

        return $requete->rowCount() > 0;
    }

    /**
     * deleteProductByID
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
?>