<form method="post" action="" id="cat1">
    <?php $caminho = __DIR__ . 'lista-pessoa.php' ?>
    <?php $votos = $objcontroller->CarregarVotos($ranking_pessoas[$i]['id_pessoa']) ?>
    <input type="hidden" name="id_pessoa" value="<?= $ranking_pessoas[$i]['id_pessoa']; ?>">
    <input type="hidden" name="id_categoria_pessoa" value="<?= $ranking_pessoas[$i]['tb_categoria_id_categoria']; ?>">

    <ol class="list-group list-group">
        <li class="list-group-item d-flex justify-content-between align-items-start mb-2">
            <img src="<?= \Source\Controller\UtilController::RetornaLinkAbsouto() .'fotos/' .  $ranking_pessoas[$i]['imagem_pessoa']; ?>" class="img-fluid img-lista-ranking" width="80px;">

            <div class="ms-2 me-auto">
                <div class="fw-bold"><?= $ranking_pessoas[$i]['nome_pessoa'] ?></div>
                <?= $ranking_pessoas[$i]['nome_categoria'];?> <br> <?= $ranking_pessoas[$i]['nome_valor'];?>
            </div>
            <?php if($votos[0]['total_votos'] > 0){ ?>
            <span class="badge bg-primary rounded-pill"><?= $votos[0]['total_votos']; ?></span>
            <?php }else{ ?>
            <span class="badge bg-primary rounded-pill"><?= '0'; ?></span>
            <?php } ?>
        </li>
    </ol>

</form>
