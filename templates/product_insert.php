<?php
$title = "Ajouter un produit";
require_once("block/header.php");
?>
<h1 class="text-success">Ajouter un produit</h1>

<form method="POST" action="index.php?action=add" class="m-5">

    <label for="name">Nom</label>
    <input id="name" type="text" name="name" value="<?= $_POST['name'] ?? '' ?>">
    <?php if (isset($errors['name'])): ?>
        <p class="text-danger"><?= $errors['name'] ?></p>
    <?php endif; ?>
    <label for="category">Category</label>
    <input type="text" name="category" value="<?= $_POST['category'] ?? '' ?>">
    <?php if (isset($errors['category'])): ?>
        <p class="text-danger"><?= $errors['category'] ?></p>
    <?php endif; ?>
    <label for="price">Price</label>
    <input id="price" type="number" name="price" value="<?= $_POST['price'] ?? '' ?>">
    <?php if (isset($errors['price'])): ?>
        <p class="text-danger"><?= $errors['price'] ?></p>
    <?php endif; ?>
    <label for="description">Description</label>
    <input type="text" name="description" value="<?= $_POST['description'] ?? '' ?>">
    <?php if (isset($errors['description'])): ?>
        <p class="text-danger"><?= $errors['description'] ?></p>
    <?php endif; ?>
    <label for="image">Image</label>
    <input id="image" type="text" name="image" value="<?= $_POST['image'] ?? '' ?>">
    <?php if (isset($errors['image'])): ?>
        <p class="text-danger"><?= $errors['image'] ?></p>
    <?php endif; ?>
    <button class="btn btn-outline-success">Valider</button>

</form>

<?php
require_once("block/footer.php");
?>