<?php
use Controller\PessoaController;
require_once dirname(__FILE__) . '/source/autoload.php';
require_once '_msg.php';

$msg = '';
$email = '';

$ret = isset($_GET['ret']) ? $_GET['ret'] : '';

if (isset($_POST['btn_entrar'])) {
    $cpf = $_POST['cfp_pessoa'];
    $re = $_POST['re_pessoa'];
    $objcontroller = new \Source\Controller\PessoaController();
    $ret = $objcontroller->ValidarLogin($cpf, $re);
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include '_head.php'; ?>
        <title>Gente de Valor ADAMA</title>
    </head>
<body class="img-bg-login">
<div class="container" >
    <div class="row text-center">
        <div class="col-md-12 mt-5">
            <br/>
            <?php \Source\Controller\UtilController::RetornaLogo('escuro'); ?>
            <br/>
        </div>
    </div>

        <div class="row d-flex align-items-center justify-content-center p-3 mt-5">
            <div class="col-md-5 col-sm-10 bg-login text-center p-5">
                <h3> Seja bem vindo(a)</h3>
                <p>Faça seu Login para votar.</p>

                        <?php echo RetornaMsg($ret); ?>


                        <form role="form" method="POST" action="acesso.php">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
</svg></span>
                                <input type="text" class="form-control" placeholder="Digite seu CPF" name="cfp_pessoa" id="cpf" >
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
  <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
</svg></span>
                                <input type="text" class="form-control" placeholder="Digite seu RE" name="re_pessoa"
                                       maxlength="12" id="senha_usuario">
                            </div>
                            <button class="btn btn-primary" name="btn_entrar" id="btn_entrar">Entrar</button>
                            <br/><br/>
                            Não consegue acessar ? <a href="novaconta.php">Clique aqui </a>
                        </form>


            </div>
        </div>
</div>

<script>

    $("#btn_entrar").click(function () {

        if ($("#cpf").val().trim() == "") {

            alert("Favor preencher o campo cpf");

            return false;

        }

        if ($("#senha_usuario").val().trim() == "") {

            alert("Preencher o campo senha");

            return false;

        }

    })

</script>
<script>
    $("#success-alert").fadeTo(2000, 500).slideUp(500, function () {
        $("#success-alert").slideUp(500);
    });
</script>
<script src="vendor/plugins/cpf/jquery.min.js"></script>
<script src="vendor/plugins/cpf/jquery.mask.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var $seuCampoCpf = $("#cpf");
        $seuCampoCpf.mask('000.000.000-00', {reverse: true});
    });
</script>

</body>

</html>
