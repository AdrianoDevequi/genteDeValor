<?php

use Controller\PessoaController;

require_once dirname(__FILE__) . '/../source/autoload.php';

$objcontroller = new \Source\Controller\PessoaController();

$dados = $objcontroller->CarregarDados();

$categorias = $objcontroller->buscaCategorias();

$valores = $objcontroller->buscaValor();

if (isset($_POST['btn_finalizar'])) {
    $tipo_pessoa = $_POST['tipo_pessoa'];
    $nome_pessoa = $_POST['nome_pessoa'];
    $email_pessoa = $_POST['email_pessoa'];
    $cadastro_pessoa = $_POST['cadastro_pessoa'];
    $imagem = $_FILES['imagem'];
    $cargo_pessoa = $_POST['cargo_pessoa'];
    $cpf_pessoa = $_POST['cpf_pessoa'];
    $id_categoria_tb_categoria = $_POST['id_categoria'];
    $id_valor_tb_valor = $_POST['id_valor'];
    $ret = $objcontroller->cadastrarPessoa($tipo_pessoa, $nome_pessoa, $email_pessoa, $cadastro_pessoa, $imagem, $cargo_pessoa, $cpf_pessoa, $id_categoria_tb_categoria, $id_valor_tb_valor);
}
//VerificarLogado();
?>
<!DOCTYPE html>
<html dir="ltr" lang="pt-BR">
<head>
    <?php include '../_head.php'; ?>
</head>
<?php require_once '../_menu.php'; ?>
<body>
<div class="container pt-5">
    <div class="row">

    <form method="post" action="?" enctype="multipart/form-data">
        <?php echo RetornaMsg($ret); ?>
        <div class="row">
            <div class="col-3 mb-3">
                <label class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome_usuario" name="nome_pessoa" placeholder="">
            </div>

            <div class="col-3 mb-3">
                <label class="form-label">E-mail</label>
                <input type="email" class="form-control" id="login_usuario" name="email_pessoa" placeholder="">
            </div>
            <div class="col-3 mb-3">
                <label class="form-label">Cadastro</label>
                <input type="text" class="form-control" id="login_usuario" name="cadastro_pessoa" placeholder="">
            </div>
            <div class="col-3 mb-3">
                <label class="form-label">Imagem</label>
                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="" name="imagem">
                    <label class="input-group" for=""></label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3 mb-3">
                <label class="form-label">Cargo</label>
                <input type="text" class="form-control" id="senha_usuario" name="cargo_pessoa" placeholder="">
            </div>
            <div class="col-3 mb-3">
                <label class="form-label">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf_pessoa" placeholder="">
            </div>
            <div class="col-3 mb-3">
                <label class="form-label">Categoria</label>
                <div class="input-group">
                    <select class="form-select" name="id_categoria">
                        <option selected>Selecione</option>
                        <?php foreach ($categorias as $item) {
                            ?>
                            <option value="<?= $item['id_categoria'] ?>" ><?= $item['nome_categoria'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-3 mb-3">
                <label class="form-label">Valor</label>
                <select class="form-select" name="id_valor">
                    <option selected>Selecione</option>
                    <?php foreach ($valores as $item) {
                        ?>
                        <option value="<?= $item['id_valor'] ?>" ><?= $item['nome_valor'] ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>


        </div>
        <div class="row">
            <div class="col-3 mb-3">
                <label class="form-label">Tipo Usuário</label>
                <select class="form-select" name="tipo_pessoa">
                    <option selected>Selecione</option>
                    <option value="1">Candidato(Pode receber votos)</option>
                    <option value="2">Eleitor(Apenas vota)</option>
                    <option value="3">Admin</option>
                </select>
            </div>
        </div>

            <button class="btn btn-success" id="btn_finalizar" name="btn_finalizar"> Finalizar</button>

    </form>

</div>
</div>
<script src="../vendor/plugins/cpf/jquery.min.js"></script>
<script src="../vendor/plugins/cpf/jquery.mask.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var $seuCampoCpf = $("#cpf");
        $seuCampoCpf.mask('000.000.000-00', {reverse: true});
    });
</script>
</body>
