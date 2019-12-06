<?php
require_once('DBConect.php');
require_once('DBUtil.php');


function returnDelete($_prId_produto)
{
    $sql = sprintf("DELETE FROM produto WHERE id = %s", $_prId_produto);
    return $sql;
}

$con = new DBConect();
$con->Conectar();
$db = $con->getConexao();
$query = returnDelete($_GET['id']);

if (mysqli_query($db, $query)) {
    $msg = 'Produto excluido com sucesso';
} else {
    $msg = 'Falha ao excluir o Produto';
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