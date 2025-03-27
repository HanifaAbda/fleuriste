<?php

 namespace App\Controller;

use App\Manager\ProductManager;

class IndexController{

    private ProductManager $productManager;

    public function __construct(){
        $this->productManager = new ProductManager();
    }

    //Route Homepage -> index.php
    public function homePage(){
        //Récupere les produits
        $products = $this->productManager->selectAll();
        //Afficher les products dans la template
        require_once("./templates/index_product.php")
    }
}

?>