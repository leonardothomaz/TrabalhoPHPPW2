<?php
require_once('DBConect.php');
require_once('DBUtil.php');


function returnSelect($_prId_produto)
{
    $sql = sprintf("SELECT * FROM produto WHERE id = %s", $_prId_produto);
    return $sql;
}

$con = new DBConect();
$con->Conectar();
$db = $con->getConexao();
$result = mysqli_query($db, returnSelect($_GET['id']));
while ($row = mysqli_fetch_assoc($result)) {
    $response[] = $row;
}

$form = '<div class="text-center">';
$form .= '<form action="atualizarProduto.php" method="post">
<div class="text-center">
    <h1>Atualizar Produto - ' . $response[0]["nome"] . '</h1>
</div>
<div class="form-group">
    <label for="nome">ID</label>
    <input type="text" class="form-control id" value="' . $response[0]["id"] . '" name="id" id="id" readonly>
  </div>
  <div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control nome" value="' . $response[0]["nome"] . '" name="nome" id="nome" required>
  </div>
  <div class="form-group">
    <label for="descricao">Descrição</label>
    <input type="text" class="form-control descricao" value="' . $response[0]["descricao"] . '" name="descricao" id="descricao" required>
  </div>
  <div class="form-group">
    <label for="preco">Preço</label>
    <input type="number" class="form-control preco" value="' . $response[0]["preco"] . '" name="preco" step=".01" id="preco" required>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="index.php"><button type="button" class="btn btn-outline-dark">Home</button></a>
</form>';
$form .= '</div>';
echo $form;