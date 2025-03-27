<?php
require_once(__DIR__ . "/vendor/autoload.php");

use App\Controller\HomeController;

$action = $_GET["action"]?? null;

var_dump($_SERVER["REQUEST_URI"]);
var_dump("Action",$action);


//Créer une route pour la page d'accueil
//afficher toutes les annonces
//  index.php?action=homePage
if($action == "homePage"){
   $homeController = new HomeController();
   $homeController->homePage();
}
// Créer une route...
//  index.php?action=page23
// elseif($action == "page23"){
//     $homeController = new HomeController();
//     $homeController->homePage();
// }
else{
    echo("Page Home PAGE");
}