<?php


$title = "Bienvenue";
require_once("block/header.php");



//var_dump($products);
?>

<h1 class="text-center">Liste des Fleurs</h1>
<div class="d-flex flex-wrap justify-content-evenly">

    <?php foreach ($products as $product): ?>
        <div class="col-4 d-flex p-3 justify-content-center">
        <img src="http://localhost/fleuriste/images/<?= $product->getDescription() ?>" alt="<?= $product->getName() ?>" style="height: 200px; width: auto;">
            <div class="p-2">
                <h2><?= $product->getName() ?></h2>
                <p><?= $product->getCategory() ?>, <?= $product->getPrice() ?> €</p>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php
require_once("block/footer.php");
?>