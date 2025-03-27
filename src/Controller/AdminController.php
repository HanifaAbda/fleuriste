<?php

namespace App\Controller;

use App\Manager\ProductManager;
use App\Model\Product;

class AdminController
{

    private ProductManager $productManager;

    public function __construct()
    {
        $this->productManager = new ProductManager();
    }

    // Route DashboardAdmin ( ancien admin.php ) 
    // Route URL -> index.php?action=admin
    public function dashboardAdmin()
    {
        //Récuperer les produits
        $cars = $this->productManager->selectAll();
        //Afficher les produits dans la template
        require_once("./templates/index_admin.php");
    }

    public function addProduct()
    {
        $errors = [];
        // Si le formulaire est validé
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $errors = $this->validateProductForm($errors, $_POST);

            if (empty($errors)) {
                //Instancier une objet Product avec le sdonnées du formulaire
                $product = new Product(null, $_POST["name"], $_POST["category"], $_POST["price"], $_POST["description"], $_POST["image"]);
                // Ajouter le produit en BDD  et rediriger
                $productManager = new ProductManager();
                $productManager->insert($product);
                $this->dashboardAdmin();
                exit();
            }
        }
        require_once("./templates/product_insert.php");
    }

    public function editProduct(int $id)
    {
        $product = $this->productManager->selectByID($id); // Un seul connect DB par page

        //Vérifier si le produit avec l'ID existe en BDD
        if (!$product) {
            $this->dashboardAdmin();
        }

        $errors = [];
        // Si le formulaire est validé
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Vérifier les champs du formulaire
            $errors = $this->validateProductForm($errors, $_POST);
            // Si le formulaire n'a pas renvoyé d'erreurs
            if (empty($errors)) {

                // Mettre à jour le produit $product et rediriger
                $product->setName($_POST["name"]);
                $product->setCategory($_POST["category"]);
                $product->setPrice($_POST["price"]);
                $product->setDescription($_POST["description"]);
                $product->setImage($_POST["image"]);

                $this->productManager->update($product);
                die($product);
                $this->dashboardAdmin();
                exit();
            }
        }
        require_once("./templates/car_update.php");


    }

    public function deleteProduct(int $id)
    {
        $product = $this->productManager->selectByID($id);

        //Vérifier si le produit avec l'ID existe en BDD
        if (!$product) {
            $this->dashboardAdmin();
            exit();
        }


        //Si le form est validé
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //Supprimer le produit et rediriger
            $this->productManager->deleteByID($product->getId());
            $this->dashboardAdmin();
            exit();
        }

        require_once("./templates/car_delete.php");

    }


    public function validateProductForm(array $errors, array $productForm): array
{
    if (empty($productForm["name"])) {
        $errors["name"] = "le nom du produit est manquant";
    }
    if (empty($productForm["category"])) {
        $errors["category"] = "la categorie du produit est manquante";
    }
    if (empty($productForm["price"])) {
        $errors["price"] = "le prix du produit est manquant";
    }
    if (empty($productForm["description"])) {
        $errors["description"] = "la description du produit est manquante";
    }
    if (empty($productForm["image"])) {
        $errors["image"] = "l'image du produit est manquante";
    }
    //Démo class ProductFormValidator
    
    return $errors;
}
}
