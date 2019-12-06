<?php
require_once('DBConect.php');
require_once('DBUtil.php');

function getAllProducts()
{
    $con = new DBConect();
    $con->Conectar();
    $db = $con->getConexao();
    $table = 'produto';
    $result = mysqli_query($db, "SELECT * FROM " . $table);
    // Initialize array variable
    $response = array();
    // Fetch into associative array
    while ($row = mysqli_fetch_assoc($result)) {
        $response[] = $row;
    }
    // Print array in JSON format
    return $response;
}

$table = '<table class="table table-dark">
        <thead class="thead-dark">
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Nome</th>
              <th scope="col">Descrição</th>
              <th scope="col">Preço</th>
              <th scope="col" class="text-center" colspan="2">Ações</th>
            </tr>
        </thead>';

$produtos = getAllProducts();
$table .= '<tbody>';
foreach ($produtos as $produto) {
    $table .= '<tr>
      <th scope="row">' . $produto['id'] . '</th>
      <td>' . $produto['nome'] . '</td>
      <td>' . $produto['descricao'] . '</td>
      <td>' . $produto['preco'] . '</td>
      <td class="text-center"><a href="atualizaProduto.php?id=' . $produto["id"] . '"><button type="button" class="btn btn-outline-primary">Atualizar</button></td>
      <td class="text-center"><a href="deletaProduto.php?id=' . $produto["id"] . '"><button type="button" class="btn btn-outline-danger">Deletar</button></td>
    </tr>';
}
$table .= '</tbody>';
$table .= '</table>';
$table .= '<div class="text-center">';
$table .= '<a href="novoproduto.php"><button  class="btn btn-outline-success">Adicionar Novo Produto</button></a>';
$table .= '</div>';

echo $table;
?>