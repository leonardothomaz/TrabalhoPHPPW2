<?php
require_once('DBConect.php');
require_once('DBUtil.php');

$form = '<div class="text-center">';
$form .= '<form action="salvarProduto.php" method="post" onsubmit="">
<div class="text-center">
    <h1>Adicionar Produto</h1>
</div>
  <div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control nome" name="nome" id="nome" required>
  </div>
  <div class="form-group">
    <label for="descricao">Descrição</label>
    <input type="text" class="form-control descricao" name="descricao" id="descricao" required>
  </div>
  <div class="form-group">
    <label for="preco">Preço</label>
    <input type="number" class="form-control preco" name="preco" step=".01" id="preco" required>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="index.php"><button type="button" class="btn btn-outline-dark">Home</button></a>
</form>';
$form .= '</div>';
echo $form;