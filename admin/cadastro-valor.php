<?php

use Controller\PessoaController;

require_once dirname(__FILE__) . '/../source/autoload.php';

$objcontroller = new \Source\Controller\PessoaController();

$valores = $objcontroller->buscaValor();

if (isset($_POST['btn_finalizar'])) {
    $nome_valor = $_POST['nome_valor'];
    $ret = $objcontroller->cadastrarValor($nome_valor);
}
if (isset($_POST['btn_deletar'])) {
    $id_valor = $_POST['id_valor'];
    $ret = $objcontroller->deletarValor($id_valor);
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

    <?php if($valores != null){ ?>
        <h3>Valores Cadastrados</h3>
    <table class="table mb-5">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($valores as $item) { ?>
        <tr>
            <th scope="row"><?= $item['id_valor'] ?></th>
            <td><?= $item['nome_valor'] ?></td>
            <td><form method="post" action=""><input type="hidden" value="<?= $item['id_valor'] ?>" name="id_valor"></input><button class="btn btn-sm btn-danger" id="btn_deletar" name="btn_deletar"> Deletar</button></form></td>
        </tr>
            <?php
        } ?>
        </tbody>
    </table>
    <?php } ?>
    <div class="row">
        <h3 class="pb-3 px-2">Cadastrar novo valor</h3>
        <form method="post" action="">
            <div class="row">
                <div class="col-md-3 col-8 mb-3">
                    <label class="form-label">Nome do valor</label>
                    <input type="text" class="form-control" id="nome_valor" name="nome_valor" placeholder="" required>
                </div>
                <div class="col-md-2 col-4 jumbotron d-flex align-items-center pt-3">
                    <button class="btn btn-success" id="btn_finalizar" name="btn_finalizar"> Adicionar</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
