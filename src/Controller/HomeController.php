<?php

namespace App\Controller;

use App\Manager\ProductManager;

class HomeController{

    private ProductManager $productManager;

    public function __construct()
    {
        $this->productManager = new ProductManager();
    }

    public function homePage()
    {
        //Récupere les produits
        $products = $this->productManager->selectAll();
        //Afficher les produits dans la template
        require_once("./templates/home_page.php");
    }
    //Route DetailProduct -> index.php?action=detailid=10
    public function detailProduct(int $id)
    {
        //Récuperer les produits
        $product = $this->productManager->selectById($id);
        if ($product != false) {
            //Afficher les produits dans la template
            require_once("./templates/product_detail.php");
        } else {
            $this->homePage();
        }
    }
}
?>