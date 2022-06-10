<?php
try {

    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $marca = $_POST["marca"];

    $pdo = new PDO('mysql:host=localhost;dbname=gean_crud', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare('INSERT INTO produtos (nome,descricao,marca) VALUES(:nome,:descricao,:marca)');
    $stmt->execute(array(
        ':nome' => $nome,
        ':descricao' => $descricao,
        ':marca' => $marca
    ));
    header('Location: index.php');
    } catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
?>