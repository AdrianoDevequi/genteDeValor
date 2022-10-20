<?php
require_once __DIR__ . '/../source/autoload.php';

$categoria = 1;

$objcontroller = new \Source\Controller\PessoaController();
$dados = $objcontroller->carregarDados();

?>
<!DOCTYPE html>
<html dir="ltr" lang="pt-BR">
<head>
    <?php require_once __DIR__ . '/../_head.php'; ?>
</head>
<?php require_once __DIR__ . '/../_menu.php'; ?>
<body>
<?php require_once __DIR__ . '/../view/elements/btn-cadastro-colaborador.php'; ?>

<div class="container">

    <div class="row">
        <h2>Linha Industrial</h2>
        <?php
            for ($i = 0; $i < count($dados); $i++) {
                if ( $dados[$i]['tb_categoria_id_categoria'] == 1) {

                    $votos_categoria = $objcontroller->buscaQtdVotosMesmaCategoria(1);
                    include __DIR__ . '/../view/elements/lista-colaboradores.php';
                }
            }
        ?>
        <h2>Linha Administrativa</h2>
        <?php
        for ($i = 0; $i < count($dados); $i++) {
            if ( $dados[$i]['tb_categoria_id_categoria'] == 2) {

                $votos_categoria = $objcontroller->buscaQtdVotosMesmaCategoria(1);
                include __DIR__ . '/../view/elements/lista-colaboradores.php';
            }
        }
        ?>
        <h2>Taquari</h2>
        <?php
        for ($i = 0; $i < count($dados); $i++) {
            if ( $dados[$i]['tb_categoria_id_categoria'] == 3) {

                $votos_categoria = $objcontroller->buscaQtdVotosMesmaCategoria(1);
                include __DIR__ . '/../view/elements/lista-colaboradores.php';
            }
        }
        ?>
        <h2>Campo</h2>
        <?php
        for ($i = 0; $i < count($dados); $i++) {
            if ( $dados[$i]['tb_categoria_id_categoria'] == 4) {

                $votos_categoria = $objcontroller->buscaQtdVotosMesmaCategoria(1);
                include __DIR__ . '/../view/elements/lista-colaboradores.php';
            }
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
