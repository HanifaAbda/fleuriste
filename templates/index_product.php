<?php
$title = "Bienvenue";
require_once("block/header.php");
?>

<h1 class="text-center">Listes des Fleurs</h1>
<div class="d-flex flex-wrap justify-content-evenly">
    <?php foreach ($products as $product): ?>
        <div class="col-4 d-flex p-3 justify-content-center">
            <img src="images/<?= $product->getImage() ?>" alt="<?= $product->getName() ?>" style="height: 200px; width: auto;">
            <div class="p-2">
                <h2><?= $product->getName() ?></h2>
                <p><?= $car->getCategory() ?>, <?= $product->getPrice() ?> chevaux</p>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php
require_once("block/footer.php");