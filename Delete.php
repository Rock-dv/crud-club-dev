<?php
$id = $_POST['id'];

try {
    $pdo = new PDO('mysql:host=localhost;dbname=gean_crud', 'root', '');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $pdo->prepare('DELETE FROM produtos WHERE id = :id');
  $stmt->bindParam(':id', $id);
  $stmt->execute();

  header('Location: index.php');
} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}

?>