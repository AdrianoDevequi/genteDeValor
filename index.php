<?php
require_once __DIR__ . '/source/autoload.php';

$objcontroller = new \Source\Controller\PessoaController();

$qtd_total_colaboradores = $objcontroller->buscaQtdTotalColaboradores();
$qtd_colaboradores_votacao = $objcontroller->buscaQtdTotalColaboradoresVotacao();
$qtd_votos = $objcontroller->buscaQtdTotalVotos();
$ranking_pessoas = $objcontroller->CarregarDadosRanking();
$valores = $objcontroller->buscaValor();
$categorias = $objcontroller->buscaCategorias();

$ret = '';
$_GET['action'] = '';
$categoria_voto = '';
$valor = '';

if (isset($_POST['btn_votar'])) {
    $id_pessoa = $_POST['id_pessoa'];
    $id_categoria_pessoa = $_POST['id_categoria_pessoa'];
    $ret = $objcontroller->adicionarVoto($id_pessoa, $id_categoria_pessoa);
    redirect('https://gentedevalor.agenciamango.com.br/site/sucesso.php');
}

// \Source\Controller\UtilController::VerificarLogado();
VerificarLogado();

?>
<!DOCTYPE html>
<html dir="ltr" lang="pt-BR">
<head>
    <?php include '_head.php'; ?>

</head>
<?php require_once '_menu.php'; ?>
<body>
<div class="container">

    <div class="row pt-5">
        <div class="col-md-4">
            <div class="box-ranking-home p-4">
                <h4>Total de Colaboradores</h4>
                <p class="info-ranking"><?= $qtd_total_colaboradores[0]['total_pessoas'] ?></p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box-ranking-home p-4">
                <h4>Colaboradores Para Votação</h4>
                <p class="info-ranking"><?= $qtd_colaboradores_votacao[0]['total_candidatos'] ?></p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box-ranking-home p-4">
                <h4>Votos</h4>
                <p class="info-ranking"><?= $qtd_votos[0]['total_votos'] ?></p>
            </div>
        </div>
    </div>

    <?php require_once 'view/elements/filtrar.php'; ?>

    <div class="row pt-5">
        <div class="col-md-12">
            <h4>Ranking de Votos </h4>
            <?php
            for ($i = 0; $i < count($ranking_pessoas); $i++) {
                $votos_categoria = $objcontroller->buscaQtdVotosMesmaCategoria(1);
                include __DIR__ . '/view/elements/lista-pessoa-ranking.php';
            }
            ?>
        </div>
    </div>

    <script>
        $('#cat1').one('submit', function () {
            $(this).find('input[type="submit"]').attr('disabled', 'disabled');
        });
    </script>
</div>
</body>
</html>
