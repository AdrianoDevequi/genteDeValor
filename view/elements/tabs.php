
<nav>
<div class="nav nav-tabs" id="nav-tab" role="tablist">
    <button class="nav-link active" id="tab-fazer-acontecer" data-bs-toggle="tab" data-bs-target="#fazer-acontecer" type="button" role="tab" aria-controls="fazer-acontecer" aria-selected="true">Fazer Acontecer</button>
    <button class="nav-link" id="tab-criar-simplicidade" data-bs-toggle="tab" data-bs-target="#criar-simplicidade" type="button" role="tab" aria-controls="criar-simplicidade" aria-selected="false">Criar Simplicidade</button>
    <button class="nav-link" id="tab-fortalecer-pessoas" data-bs-toggle="tab" data-bs-target="#fortalecer-pessoas" type="button" role="tab" aria-controls="fortalecer-pessoas" aria-selected="false">Fortalecer Pessoas</button>
    <button class="nav-link" id="tab-paixao" data-bs-toggle="tab" data-bs-target="#paixao" type="button" role="tab" aria-controls="paixao" aria-selected="false">Paixão</button>
</div>
</nav>
<div class="tab-content pt-3" id="nav-tabContent">

    <div class="row">
<?php

if (isset($_POST['menu_link']) && $_POST['menu_link'] == 1) {

        $class = $dados;
        foreach ($class as $key => $value) {
            echo "$key => $value\n";

        }
    for ($i = 0; $i < count($dados); $i++) {
        if ($dados[$i]['tb_valor_id_valor'] == 1) {
            echo 'Linha Industrial<br/>';
        ?>
             <div class="tab-pane fade show active" id="fazer-acontecer" role="tabpanel" aria-labelledby="fazer-acontecer">
            <?php  echo 'Valor: ' . $dados[$i]['tb_valor_id_valor'];
            $votos_categoria = $objcontroller->buscaQtdVotosMesmaCategoria(1);
            include 'view/elements/lista-pessoa.php'; ?>
        </div>
        <?php }
    }
    for ($i = 0; $i < count($dados); $i++) {
        if ($dados[$i]['tb_valor_id_valor'] == 2) {?>
        <div class="tab-pane fade" id="criar-simplicidade" role="tabpanel" aria-labelledby="criar-simplicidade">
            <?php  echo 'Valor: ' . $dados[$i]['tb_valor_id_valor'];
            $votos_categoria = $objcontroller->buscaQtdVotosMesmaCategoria(1);
            include 'view/elements/lista-pessoa.php'; ?>
        </div>
        <?php }
    }
    for ($i = 0; $i < count($dados); $i++) {
        if ($dados[$i]['tb_valor_id_valor'] == 3) {?>
        <div class="tab-pane fade" id="fortalecer-pessoas" role="tabpanel" aria-labelledby="fortalecer-pessoas">
            <?php  echo 'Valor: ' . $dados[$i]['tb_valor_id_valor'];
            $votos_categoria = $objcontroller->buscaQtdVotosMesmaCategoria(1);
            include 'view/elements/lista-pessoa.php'; ?>
        </div>
        <?php }
    }
    for ($i = 0; $i < count($dados); $i++) {
        if ($dados[$i]['tb_valor_id_valor'] == 4) {?>
        <div class="tab-pane fade" id="paixao" role="tabpanel" aria-labelledby="paixao">
            <?php  echo 'Valor: ' . $dados[$i]['tb_valor_id_valor'];
            $votos_categoria = $objcontroller->buscaQtdVotosMesmaCategoria(1);
            include 'view/elements/lista-pessoa.php'; ?>
        </div>
        <?php }
    }

}
?>

    </div>
</div>
