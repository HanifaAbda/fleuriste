<?php
$title = $product->getName() . " détails";
require_once("block/header.php");
?>

<h1 class="text-center"><?= $product->getName() ?></h1>
    <div class="col-4 d-flex p-3 justify-content-center">
        <img src="images/<?= $product->getImage() ?>" alt="<?= $product->getName() ?>" style="height: 200px; width: auto;">
        <div class="p-2">
            <h2><?= $product->getName() ?></h2>
            <p><?= $product->getCategory() ?>, <?= $product->getPrice() ?> Prix</p>
        </div>
    </div>
<?php
require_once("block/footer.php");
?>