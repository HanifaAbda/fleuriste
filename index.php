<?php
require_once(__DIR__ . "/vendor/autoload.php");

use App\Controller\AdminController;
use App\Controller\HomeController;
use App\Controller\SecurityController;

// Démarrer la session et vérification de la connexion utilisateur 
session_start();
// Vérification si l'utilisateur est connecté
if (isset($_SESSION["username"])) {
    $isLoggedIn = true;
} else {
    $isLoggedIn = false;
}

// Vérifie si 'action' est défini dans l'URL
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    // Si 'action' n'est pas défini, assigne une valeur par défaut
    $action = 'homepage';
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
} else {
    $id = null;
}

// Initialisation des contrôleurs
$homeController = new HomeController();
$adminController = new AdminController();
$securityController = new SecurityController();

// Vérification des actions
if ($action === "homePage") {
    $homeController->homePage();
} elseif ($action === 'detail' && $id) {
    $homeController->detailProduct($id);
} elseif ($action === 'login') {
    $securityController->login();
} elseif ($action === 'register') {
    $securityController->register();
} elseif ($action === 'logout' && $isLoggedIn) {
    $securityController->logout();
} elseif ($action === 'admin' && $isLoggedIn) {
    $adminController->dashboardAdmin();
} elseif ($action === 'add' && $isLoggedIn) {
    $adminController->addProduct();
} elseif ($action === 'edit' && $isLoggedIn && $id) {
    $adminController->editProduct($id);
} elseif ($action === 'delete' && $isLoggedIn && $id) {
    $adminController->deleteProduct($id);
} else {
    header("Location: index.php?action=homePage");
    exit();
}
?>
