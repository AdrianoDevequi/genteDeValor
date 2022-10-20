<?php

function RetornaMsg($ret) {

    $msg = "";

    if ($ret === 0) {

        $msg = '<div class="alert alert-warning alert-dismissible fade show" role="alert"> Preencher campos obrigatórios.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    } elseif ($ret == 1) {

        $msg = '<div class="alert alert-success" id="success-alert">Dados gravados com sucesso! </div>';
        echo "<meta http-equiv='refresh' content='1'>";
    } elseif ($ret == 2) {

        $msg = '<div class="alert alert-danger">Dados excluidos com sucesso!</div>';
        echo "<meta http-equiv='refresh' content='1'>";
    }
    elseif ($ret == -100) {

        $msg = '<div class="alert alert-danger">Ocorreu um erro na operação, tente mais tarde</div>';
        echo "<meta http-equiv='refresh' content='1'>";
    } elseif ($ret == -101) {

        $msg = '<div class="alert alert-warning">E-mail não encontrado</div>';
        echo "<meta http-equiv='refresh' content='1'>";
    }

    return $msg;
}
