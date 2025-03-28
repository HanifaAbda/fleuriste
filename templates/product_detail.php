<?php
$title = $product->getName() . " détails";
require_once("block/headr.php");
?>

<h1 class="text-center"><?= $product->getName() ?></h1>
    <div class="col-4 d-flex p-3 justify-content-center">
        <img src="images/<?= $product->getImage() ?>" alt="<?= $car->getNale() ?>" style="height: 200px; width: auto;">
        <div class="p-2">
            <h2><?= $product->getName() ?></h2>
            <p><?= $product->getCategory() ?>, <?= $product->getPrice() ?> chevaux</p>
        </div>
    </div>
<?php
require_once("block/footer.php");