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
      <h3 class="text-center">Cadastro de Produtos</h3>
      <hr>
    </div>
    <br><br>
    <form action="Insert.php" method="POST">
      <div class="row">
        <div class="col-md-4">
          <label for="nome">Nome</label>
          <input type="text" name="nome" id="nome" class="form-control">
          
        </div>
        <div class="col-md-4">
          <label for="descricao">Descrição</label>
          <input type="text" name="descricao" id="descricao" class="form-control">
        </div>
        <div class="col-md-4">
          <label for="marca">Marca</label>
          <input type="text" name="marca" id="marca" class="form-control">
        </div>
      </div>
      <br><br>
      <div class="text-center">
        <input type="submit" value="Cadastrar" id='create' class="btn btn-primary">
      </div>
    </form>
    <div class="row">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">NOME</th>
            <th scope="col">Descrição</th>
            <th scope="col">Marca</th>
            <th scope="col">Ações</th>

          </tr>
        </thead>
        <tbody>

          <?php
          $pdo = new PDO('mysql:host=sql201.epizy.com;dbname=epiz_31923670_geancrud', 'epiz_31923670', 'rt9yNRWjyVbuq5g');

          $consulta = $pdo->query("SELECT id,nome,descricao,marca FROM produtos;");

          foreach ($consulta as $produto) {
            echo "<tr>
                    <th scope='row'>{$produto['id']}</th>
                    <td>{$produto['nome']}</td>
                    <td>{$produto['descricao']}</td> 
                    <td>{$produto['marca']}</td> 
                    <td colspan='22'>
                      <span>
                        <a value='Editar' class='btn btn-primary' style='text-decoration:none;' href='edit.php?id={$produto['id']}'>Editar</a>
                        <hr>
                        <form action='Delete.php' method='POST'><input name='id' type='hidden' value='{$produto['id']}'><input value='Excluir' type='submit' class='btn btn-secondary' id='delete'></input><form>
                      </span>
                    </td>
                  </tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="controller.js"></script>