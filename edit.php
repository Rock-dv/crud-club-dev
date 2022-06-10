<?php


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">,
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <title>CRUD</title>
</head>

<body>
  <div class="container">
    <div class="row">
        <a href="index.php">Voltar</a><h3 class="text-center">Editar Produto</h3>
      <hr>
    </div>
    <br><br>
    <form action="Insert.php" method="POST">
      <div class="row">
          <?php 
              $id = $_GET['id'];
              $pdo = new PDO('mysql:host=localhost;dbname=gean_crud', 'root', '');
          
              $consulta = $pdo->query("SELECT id,nome,descricao,marca  FROM produtos WHERE id = $id ;");
              foreach ($consulta as  $value) {
                  # code...

        echo("<div class='col-md-4'>
          <label for='nome'>Nome</label>
        <input type='text' name='nome' id='nome' class='form-control' value='{$value['nome']}'>
        <input type='hidden' name='id' id='id' class='form-control' value='{$value['id']}'>
        </div>
        <div class='col-md-4'>
          <label for='descricao'>Descrição</label>
          <input type='text' name='descricao' id='descricao' class='form-control' value='{$value['descricao']}'>
        </div>
        <div class='col-md-4'>
          <label for='marca'>Marca</label>
          <input type='text' name='marca' id='marca' class='form-control' value='{$value['marca']}'>
        </div>");
        }
        ?>
      </div>
      <br><br>
      <div class="text-center">
        <input type="submit" value="Editar" id='create' class="btn btn-primary">
      </div>
    </form>
  </div>
</body>

</html>