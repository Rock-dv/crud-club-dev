<?php

$id = $_POST["id"];
$nome = $_POST["nome"];
$descricao = $_POST["descricao"];
$marca = $_POST["marca"];

try {
$pdo = new PDO('mysql:host=localhost;dbname=gean_crud', 'root', '');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $pdo->prepare('UPDATE produtos SET nome = :nome, descricao = :descricao, marca = :marca WHERE id = :id');
  $stmt->execute(array(
    ':id'   => $id,
    ':nome' => $nome,
    ':descricao' => $descricao,
    ':marca' => $marca
  ));

  echo $stmt->rowCount();
} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}
?>