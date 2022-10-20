<div class="col">
<form method="post" action="" id="cat1">
    <?php $caminho = __DIR__ . 'lista-pessoa.php' ?>
    <?php $votos = $objcontroller->CarregarVotos($dados[$i]['id_pessoa']) ?>
    <input type="hidden" name="id_pessoa" value="<?= $dados[$i]['id_pessoa']; ?>">
    <input type="hidden" name="id_categoria_pessoa" value="<?= $dados[$i]['tb_categoria_id_categoria']; ?>">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-center pb-2"><img src="<?= \Source\Controller\UtilController::RetornaLinkAbsouto() .'fotos/' .  $dados[$i]['imagem_pessoa']; ?>" class="img-fluid img-lista-unidades"></div>
            <p class="text-center pt-2"><?= $dados[$i]['nome_pessoa'] ?></p>
            <?php if($votos[0]['total_votos'] > 0){ ?>
            <p class="text-center"><?= 'Quantidade de votos: ' . $votos[0]['total_votos']; ?></p>
            <?php }else{ ?>
            <p class="text-center"><?= 'Quantidade de votos: 0'; ?></p>
            <?php } ?>
            <p class="text-center"><?= $dados[$i]['nome_valor'];?></p>
            <p class="text-center"><?= $dados[$i]['nome_categoria'];?></p>
            <div class="d-flex justify-content-center">
                <?php if($votos_logado[0]['total_votos_logado'] <= 20 && $votos_categoria[0]['total_votos_categoria'] <= 10) { ?>
                    <input type="submit" class="btn btn-success" id="btn_finalizar" name="btn_votar" value="Votar">
                <?php }else{ ?>
                    <input type="submit" class="btn btn-success" disabled>
                <?php } ?>
            </div>
        </div>
    </div>
</form>
</div>
