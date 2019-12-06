<?php
require_once('DBConect.php');
require_once('DBUtil.php');
require_once('produto.php');

$con = new DBConect();
$con->Conectar();
$db = $con->getConexao();
$dbutil = new DBUtil();
$produto = new produto();

$produto->setCampo('nome', $dbutil->paraTexto($_POST['nome']));
$produto->setCampo('descricao', $dbutil->paraTexto($_POST['descricao']));
$produto->setCampo('preco', $dbutil->paraTexto($_POST['preco']));

$query = sprintf('UPDATE produto SET nome = %s, descricao = %s, preco = %s WHERE id = %s',
    $produto->getCampo('nome'),
    $produto->getCampo('descricao'),
    $produto->getCampo('preco'),
    $_POST['id']
);

if (mysqli_query($db, $query)) {
    $msg = 'Produto atualizado com sucesso';
} else {
    $msg = 'Falha ao atualizar o Produto';
}

$modal = '<div role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Atenção</h5>
      </div>
      <div class="modal-body">
        <p>' . $msg . '</p>
      </div>
      <div class="modal-footer">
        <a href="index.php"><button type="button" class="btn btn-outline-dark">Home</button></a>
      </div>
    </div>
  </div>
</div>';

echo $modal;