<?php
$title = "Modifier " . $product->getName();
require_once("block/header.php");
?>

<h1 class="text-primary">Modifier <?= $product->getCategory() ?> <?= $product->getName() ?> </h1>

<img src="images/<?= $product->getImage() ?>" alt="<?= $product->getName() ?>">


<form method="POST" action="index.php?action=edit?id=<?= ($product->getId()) ?>">

    <label for="name">Name</label>
    <input id="name" type="text" name="name" value="<?= ($product->getName())  ?>">
    <?php if (isset($errors['name'])): ?>
        <p class="text-danger"><?= $errors['name'] ?></p>
    <?php endif; ?>

    <label for="category">Category</label>
    <input type="text" name="category" value="<?= $product->getCategory()  ?>">
    <?php if (isset($errors['category'])): ?>
        <p class="text-danger"><?= $errors['category'] ?></p>
    <?php endif; ?>

    <label for="price">Prix</label>
    <input id="price" type="number" name="price" value="<?= $product->getPrice()  ?>">
    <?php if (isset($errors['price'])): ?>
        <p class="text-danger"><?= $errors['price'] ?></p>
    <?php endif; ?>

    <label for="description">Description</label>
    <input type="text" name="description" value="<?= $product->getDescription()  ?>">
    <?php if (isset($errors['description'])): ?>
        <p class="text-danger"><?= $errors['description'] ?></p>
    <?php endif; ?>

    <label for="image">Image</label>
    <input id="image" type="text" name="image">
    <?php if (isset($errors['image'])): ?>
        <p class="text-danger"><?= $errors['image'] ?></p>
    <?php endif; ?>

    <button class="btn btn-outline-success">Valider</button>

</form>
<?php
require_once("block/footer.php");
?>