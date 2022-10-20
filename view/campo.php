<?php
require_once __DIR__ . '/../source/autoload.php';

$categoria = 'Campo';

$objcontroller = new \Source\Controller\PessoaController();
$dados = $objcontroller->carregarDadosPorCategoria($categoria);

if (isset($_POST['btn_valor'])) {
   $valor = $_POST['cod_valor'];
}
if (isset($_POST['btn_votar'])) {
    $id_pessoa = $_POST['id_pessoa'];
    $id_categoria_pessoa = $_POST['id_categoria_pessoa'];
    $ret = $objcontroller->adicionarVoto($id_pessoa, $id_categoria_pessoa);
    redirect('https://gentedevalor.agenciamango.com.br/sucesso.php');
}

?>
<!DOCTYPE html>
<html dir="ltr" lang="pt-BR">
<head>
    <?php require_once __DIR__ . '/../_head.php'; ?>
</head>
<?php require_once __DIR__ . '/../_menu.php'; ?>
<body>

<div class="container pt-4">

    <div class="row">
        <?php

        if ($valor == 1) {

            for ($i = 0; $i < count($dados); $i++) {
                if ($dados[$i]['tb_valor_id_valor'] == 1 && $dados[$i]['nome_categoria'] == $categoria) {

                    $votos_categoria = $objcontroller->buscaQtdVotosMesmaCategoria(1);
                    include __DIR__ . '/elements/lista-pessoa.php';
                    ?>

                <?php }}
        }else if ($valor == 2 ) {
            for ($i = 0; $i < count($dados); $i++) {
                if ($dados[$i]['tb_valor_id_valor'] == 2 && $dados[$i]['nome_categoria'] == $categoria) { ?>
                    <?php
                    $votos_categoria = $objcontroller->buscaQtdVotosMesmaCategoria(1);
                    include __DIR__ . '/elements/lista-pessoa.php';
                    ?>

                    <?php
                }}}else if ($valor == 3) {
            for ($i = 0; $i < count($dados); $i++) { ?>
                <?php if ($dados[$i]['tb_valor_id_valor'] == 3 && $dados[$i]['nome_categoria'] == $categoria) {
                    $votos_categoria = $objcontroller->buscaQtdVotosMesmaCategoria(1);
                    include __DIR__ . '/elements/lista-pessoa.php';
                    ?>

                <?php }}
        }else if ($valor == 4) {
            for ($i = 0; $i < count($dados); $i++) {
                if ($dados[$i]['tb_valor_id_valor'] == 4 && $dados[$i]['nome_categoria'] == $categoria) { ?>

                    <?php
                    $votos_categoria = $objcontroller->buscaQtdVotosMesmaCategoria(1);
                    include __DIR__ . '/elements/lista-pessoa.php';
                    ?>

                <?php }}
        }else{
            // Mostra Todos
            /*
            for ($i = 0; $i < count($dados); $i++) {
                if($dados[$i]['tb_categoria_id_categoria'] == $categoria){
            $votos_categoria = $objcontroller->buscaQtdVotosMesmaCategoria(1);
            include __DIR__ . '/elements/lista-pessoa.php';
            ?>

            <?php }}
             */
            ?>
            <h2 class="pt-4">Campo</h2>
            <p >Selecione um valor</p>
            <?php require_once __DIR__ . '/../view/elements/btn-valores.php'; ?>
            <?php
        }
        ?>

    </div>
    <script>
        $('#cat1').one('submit', function () {
            $(this).find('input[type="submit"]').attr('disabled', 'disabled');
        });
    </script>
</div>
</body>
</html>
