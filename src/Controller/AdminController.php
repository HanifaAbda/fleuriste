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

    // Route DashboardAdmin (ancien admin.php) 
    // Route URL -> index.php?action=admin
    public function dashboardAdmin()
    {
        // Récupérer les produits
        $products = $this->productManager->selectAll();
        // Afficher les produits dans la template
        require_once("./templates/index_admin.php");
    }
    public function addProduct()
    {
        $errors = [];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $errors = $this->validateProductForm($errors, $_POST);

            if (empty($errors)) {
                $product = new Product(null, $_POST["name"], $_POST["category"], $_POST["price"], $_POST["description"], $_POST["image"]);
                try {
                    $this->productManager->insert($product);
                    $_SESSION['flash_message'] = "Produit ajouté avec succès.";
                    header('Location: index.php?action=admin');
                    exit();
                } catch (\Exception $e) {
                    $errors['database'] = "Erreur lors de l'ajout du produit: " . $e->getMessage();
                }
            }
        }
        require_once("./templates/product_insert.php");
    }

    public function editProduct(int $id)
    {
        $product = $this->productManager->selectByID($id);

        if (!$product) {
            header('Location: index.php?action=admin');
            exit();
        }

        $errors = [];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $errors = $this->validateProductForm($errors, $_POST);
            if (empty($errors)) {
                $product->setName($_POST["name"]);
                $product->setCategory($_POST["category"]);
                $product->setPrice($_POST["price"]);
                $product->setDescription($_POST["description"]);
                $product->setImage($_POST["image"]);



                try {
                    $this->productManager->update($product);
                    $_SESSION['flash_message'] = "Produit mis à jour avec succès.";
                    header('Location: index.php?action=admin');
                    exit();
                } catch (\Exception $e) {
                    $errors['database'] = "Erreur lors de la mise à jour du produit: " . $e->getMessage();
                }
            }
        }
        require_once("./templates/product_update.php");
    }

    public function validateProductForm(array $errors, array $productForm): array
    {
        if (empty($productForm["name"])) {
            $errors["name"] = "Le nom du produit est manquant";
        }
        if (empty($productForm["category"])) {
            $errors["category"] = "La catégorie du produit est manquante";
        }
        if (empty($productForm["price"])) {
            $errors["price"] = "Le prix du produit est manquant";
        } elseif (!is_numeric($productForm["price"])) {
            $errors["price"] = "Le prix doit être un nombre.";
        }
        if (empty($productForm["description"])) {
            $errors["description"] = "La description du produit est manquante";
        }
        if (empty($productForm["image"])) {
            $errors["image"] = "L'image du produit est manquante";
        }

        return $errors;
    }
}
?>