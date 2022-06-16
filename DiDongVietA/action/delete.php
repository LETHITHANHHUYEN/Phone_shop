<?php
try {
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=didong', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $id = $_POST['id'] ?? NULL;

    if (!$id) {
        header('Location: ../admin/admin.php');
        exit();
    }

    $statement1 = $pdo->prepare('DELETE FROM product WHERE pid=:id');

    $statement1->bindValue(':id', $id);

    $statement1->execute();

    header("Location: ../admin/admin.php");
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
