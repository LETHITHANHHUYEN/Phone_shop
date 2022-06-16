<?php

$pdo = new PDO('mysql:host=localhost;dbname=didong', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$errors = [];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = $_POST['title'];
    $cost = $_POST['cost'];
    $quantity = $_POST['quantity'];
    $category = $_POST['category'];
    $image = $_POST['image'];
    $description = $_POST['description'];

    $statement = $pdo->prepare("INSERT INTO `product` (`pname`, `cost`, `quantity`, `cid`, `image`, `description`) VALUES (:title,:cost,:quantity,:category,:image,:description);");
    $statement->bindValue(':title', $title, PDO::PARAM_STR);
    $statement->bindValue(':cost', $cost, PDO::PARAM_INT);
    $statement->bindValue(':quantity', $quantity, PDO::PARAM_INT);
    $statement->bindValue(':category', $category, PDO::PARAM_INT);
    $statement->bindValue(':image', $image, PDO::PARAM_STR);
    $statement->bindValue(':description', $description, PDO::PARAM_STR);

    $statement->execute();
    header('Location: ../admin/addproduct.php');
}
