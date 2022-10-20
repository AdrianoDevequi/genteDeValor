<div class="col-2 pb-4">
<form method="post" action="" id="cat1">
    <?php $caminho = __DIR__ . 'lista-pessoa.php' ?>
    <?php $votos = $objcontroller->CarregarVotos($dados[$i]['id_pessoa']) ?>
    <input type="hidden" name="id_pessoa" value="<?= $dados[$i]['id_pessoa']; ?>">
    <input type="hidden" name="id_categoria_pessoa" value="<?= $dados[$i]['tb_categoria_id_categoria']; ?>">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-center pb-2"><img src="../view/assets/images/avatar.png" class="img-fluid"></div>
            <p class="text-center pt-2"><?= $dados[$i]['nome_pessoa'] ?></p>
            <?php if($votos[0]['total_votos'] > 0){ ?>
            <p class="text-center"><?= 'Votos: ' . $votos[0]['total_votos']; ?></p>
            <?php }else{ ?>
            <p class="text-center"><?= 'Votos: 0'; ?></p>
            <?php } ?>
            <p class="text-center"><?= $dados[$i]['nome_valor'];?></p>
            <p class="text-center"><?= $dados[$i]['nome_categoria'];?></p>
        </div>
    </div>
</form>
</div>
