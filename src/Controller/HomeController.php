<?php

namespace App\Controller;

use App\Manager\ProductManager;

class HomeController{

    public function homePage(){
      
        require_once("./templates/homePage.php");
    }
}