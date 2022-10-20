<?php

use Controller\PessoaController;

require_once dirname(__FILE__) . '/../source/autoload.php';

$objcontroller = new \Source\Controller\PessoaController();

$categorias = $objcontroller->buscaCategorias();

if (isset($_POST['btn_finalizar'])) {
    $nome_categoria = $_POST['nome_categoria'];
    $ret = $objcontroller->cadastrarCategoria($nome_categoria);
}
if (isset($_POST['btn_deletar'])) {
    $id_categoria = $_POST['id_categoria'];
    $ret = $objcontroller->deletarCategoria($id_categoria);
}
//VerificarLogado();
?>
<!DOCTYPE html>
<html dir="ltr" lang="pt-BR">
<head>
    <?php require_once __DIR__ . '/../_head.php'; ?>
</head>
<?php require_once __DIR__ . '/../_menu.php'; ?>
<body>
<div class="container pt-5">
    <?php echo RetornaMsg($ret); ?>

    <?php if($categorias != null){ ?>
        <h3>Categorias Cadastradas</h3>
    <table class="table mb-5">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($categorias as $item) { ?>
        <tr>
            <th scope="row"><?= $item['id_categoria'] ?></th>
            <td><?= $item['nome_categoria'] ?></td>
            <td><form method="post" action=""><input type="hidden" value="<?= $item['id_categoria'] ?>" name="id_categoria"></input><button class="btn btn-sm btn-danger" id="btn_deletar" name="btn_deletar"> Deletar</button></form></td>
        </tr>
            <?php
        } ?>
        </tbody>
    </table>
    <?php } ?>
    <div class="row">
        <h3 class="pb-3 px-2">Cadastrar nova categoria</h3>
        <form method="post" action="">
            <div class="row">
                <div class="col-md-3 col-8 mb-3">
                    <label class="form-label">Nome da Categoria</label>
                    <input type="text" class="form-control" id="nome_categoria" name="nome_categoria" placeholder="" required>
                </div>
                <div class="col-md-2 col-4 jumbotron d-flex align-items-center pt-3">
                    <button class="btn btn-success" id="btn_finalizar" name="btn_finalizar"> Adicionar</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
