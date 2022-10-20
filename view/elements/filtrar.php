<?php
if (isset($_POST['btn_filtrar'])) {
    $categoria = $_POST['select_categoria'];
    $valor = $_POST['select_valor'];
    $ranking_pessoas = $objcontroller->carregarDadosPorCategoriaValor($categoria, $valor);
}
?>

<form method="POST" action="">
    <div class="row pt-5">
        <h4>Filtrar </h4>
        <div class="col-5">
            <label class="form-label">Categoria</label>
            <div class="input-group">
                <select class="form-select" name="select_categoria">
                    <option selected>Selecione</option>
                    <?php foreach ($categorias as $item) {
                        ?>
                        <option value="<?= $item['id_categoria'] ?>" <?php if($categoria == $item['id_categoria']) echo 'selected';?>><?= $item['nome_categoria'] ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-5">
            <label class="form-label">Valor</label>
            <select class="form-select" name="select_valor">
                <option selected>Selecione</option>

                <?php foreach ($valores as $item) {
                    ?>
                    <option value="<?= $item['id_valor'] ?>" <?php if($valor == $item['id_valor']) echo 'selected';?>><?= $item['nome_valor'] ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="col-md-2 pt-4 d-flex aligns-items-center justify-content-center">
            <button class="btn btn-success"  name="btn_filtrar"> Fltrar</button>
        </div>

    </div></form>