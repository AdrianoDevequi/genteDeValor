<?php

use Controller\PessoaController;

require_once dirname(__FILE__) . '/source/autoload.php';

$objcontroller = new \Source\Controller\PessoaController();

$dados = $objcontroller->CarregarDados();

$categorias = $objcontroller->buscaCategorias();

$valores = $objcontroller->buscaValor();

if (isset($_POST['btn_finalizar'])) {
    $nome_pessoa = $_POST['nome_pessoa'];
    $email_pessoa = $_POST['email_pessoa'];
    $cadastro_pessoa = $_POST['cadastro_pessoa'];
    $cargo_pessoa = $_POST['cargo_pessoa'];
    $cpf_pessoa = $_POST['cpf_pessoa'];
    $id_categoria_tb_categoria = $_POST['id_categoria'];
    $id_categoria_add_1 = $_POST['id_categoria-2'];
    $id_categoria_add_2 = $_POST['id_categoria-3'];
    $id_categoria_add_3 = $_POST['id_categoria-4'];
    $id_valor_tb_valor = $_POST['id_valor'];
    $ret = $objcontroller->cadastrarPessoa($nome_pessoa, $email_pessoa, $cadastro_pessoa, $cargo_pessoa, $cpf_pessoa, $id_categoria_tb_categoria, $id_valor_tb_valor, $id_categoria_add_1, $id_categoria_add_2, $id_categoria_add_3);
}
//VerificarLogado();
?>
<!DOCTYPE html>
<html dir="ltr" lang="pt-BR">
<head>
    <?php include '_head.php'; ?>
</head>
<?php require_once '_menu.php'; ?>
<body>
<div class="container pt-3">
    <div class="row">

    <form method="post" action="?">
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
                    <input type="file" class="form-control" id="">
                    <label class="input-group" for=""></label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4 mb-3">
                <label class="form-label">Cargo</label>
                <input type="text" class="form-control" id="senha_usuario" name="cargo_pessoa" placeholder="">
            </div>
            <div class="col-4 mb-3">
                <label class="form-label">CPF</label>
                <input type="text" class="form-control" id="senha_usuario" name="cpf_pessoa" placeholder="">
            </div>
            <div class="col-4 mb-3">
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
            <div class="campo-extra row">
                <div class="col-3 mb-3">
                    <label class="form-label">Categoria 1</label>
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
                        <button class="add_form_field btn btn-outline-secondary"><span style="font-size:16px; font-weight:bold;">+ </span></button>
                    </div>
                </div>
            </div>




            <button class="btn btn-success" id="btn_finalizar" name="btn_finalizar"> Finalizar</button>

    </form>

</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>


$(document).ready(function() {
        var max_fields = 4;
        var wrapper = $(".campo-extra");
        var add_button = $(".add_form_field");

        var x = 1;
        $(add_button).click(function(e) {
            e.preventDefault();
            if (x < max_fields) {
                x++;
                $(wrapper).append('<div class="col-3 mb-3" id="' + 'remove-coluna-' + x +'"><label class="form-label">Categoria '+ x +'</label><div class="input-group">' +
                '<select class="form-select" name="id_categoria-' + x + '"><option selected>Selecione</option>' +
                '<?php foreach ($categorias as $item) { ?>' +
                '<option value="<?= $item['id_categoria'] ?>" ><?= $item['nome_categoria'] ?></option><?php } ?>' +
                '</select><button class="delete-' + x + ' btn btn-outline-secondary"><span style="font-size:16px; font-weight:bold;">- </span></button></div>' +
                '</div>'); //add input box
            } else {
                alert('Limite de categorias atingido')
            }
        });

        $(wrapper).on("click", ".delete-2", function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
            $("#remove-coluna-2").remove();
            x--;
        })
        $(wrapper).on("click", ".delete-3", function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
            $("#remove-coluna-3").remove();
            x--;
        })
        $(wrapper).on("click", ".delete-4", function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
            $("#remove-coluna-4").remove();
            x--;
    })
    });</script>
</body>
