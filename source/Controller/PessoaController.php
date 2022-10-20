<?php

namespace Source\Controller;

use PessoaDAO;
//require 'vendor/autoload.php';
require_once '/var/www/vhosts/gentedevalor.agenciamango.com.br/httpdocs/source/Models/PessoaDAO.php';
//require_once '/home/wmbar465/public_html/doapet.com.br/Class/class.phpmailer.php';
require '/var/www/vhosts/gentedevalor.agenciamango.com.br/httpdocs/source/Controller/UtilController.php';


class PessoaController
{

    public function adicionarVoto($id_pessoa, $id_categoria_pessoa)
    {
        $voto = 1;

        $objdao = new PessoaDAO();

        $usuario_logado = UtilController::RetornarCodigoLogado();

        $objdao->adicionarVoto($id_pessoa, $voto, $usuario_logado, $id_categoria_pessoa);
    }

    public function cadastrarCategoria($nome_categoria)
    {
        if($nome_categoria == ''){
            return 0;
        }

        $objdao = new PessoaDAO();
        return $objdao->cadastrarCategoria($nome_categoria);

    }

    public function deletarCategoria($id_categoria)
    {

        $objdao = new PessoaDAO();
        return $objdao->deletarCategoria($id_categoria);

    }

    public function cadastrarValor($nome_valor)
    {
        if($nome_valor == ''){
            return 0;
        }

        $objdao = new PessoaDAO();
        return $objdao->cadastrarValor($nome_valor);

    }

    public function deletarValor($id_valor)
    {

        $objdao = new PessoaDAO();
        return $objdao->deletarValor($id_valor);

    }

    public function cadastrarPessoa($tipo_pessoa, $nome_pessoa, $email_pessoa, $cadastro_pessoa, $imagem, $cargo_pessoa, $cpf_pessoa, $id_categoria_tb_categoria, $id_valor_tb_valor)
    {

        $nome_pessoa = UtilController::TratarString($nome_pessoa);
        $email_pessoa = UtilController::TratarString($email_pessoa);
        $cadastro_pessoa = UtilController::TratarString($cadastro_pessoa);
        $cargo_pessoa = UtilController::TratarString($cargo_pessoa);
        $cpf_pessoa = UtilController::TratarString($cpf_pessoa);
        $cpf_pessoa = UtilController::TirarCaracteresEspeciais($cpf_pessoa);
        $id_categoria_tb_categoria = UtilController::TratarString($id_categoria_tb_categoria);
        $id_valor_tb_valor = UtilController::TratarString($id_valor_tb_valor);

        if (trim($nome_pessoa) == "") {

            return 0;
        }
        /** limita os textos para no máximo 45 */
        if (strlen($nome_pessoa) > 45 || strlen($email_pessoa) > 45 || strlen($cadastro_pessoa) > 45 || strlen($cargo_pessoa) > 45 || strlen($cpf_pessoa) > 45) {

            return -17;
        }

         if (UtilController::validarExtensao($imagem) == 0) {

            return -2;
        }

        $nome_foto = UtilController::DevolverNomeFoto();

        try {

            $objdao = new PessoaDAO();

            $cpf_limpo = preg_replace('/[^0-9]/', '', $cpf_pessoa);

            $objdao->novoCadastrarPessoa($tipo_pessoa, $nome_pessoa, $email_pessoa, $cadastro_pessoa, $nome_foto, $cargo_pessoa, $cpf_limpo, $id_categoria_tb_categoria, $id_valor_tb_valor);


            // Copiar a foto para seu destino final

            $caminho_final = UtilController::DevolverCaminhoFoto($nome_foto);

            // Verifica se a foto foi copiada

            if (move_uploaded_file($imagem['tmp_name'], $caminho_final)) {
                return 1;
            } else {
                return -3;
            }
        } catch (Exception $ex) {

            echo $ex->getMessage();

            return -100;
        }
    }

    public function CarregarDados()
    {

        $objController = new PessoaDAO();

        //$this->setCategoria();

        //$cod_pessoa = UtilController::RetornarCodigoLogado();

        return $objController->carregarDados();
    }

    public function carregarDadosPorCategoria($categoria)
    {
        $objController = new PessoaDAO();

        return $objController->carregarDadosPorCategoria($categoria);
    }

    public function carregarDadosPorCategoriaValor($categoria, $valor)
    {
        $objController = new PessoaDAO();

        return $objController->carregarDadosPorCategoriaValor($categoria, $valor);
    }

    public function buscaQtdVotos()
    {

        $objController = new PessoaDAO();

        return $objController->buscaQtdVotos();
    }

    public function buscaCategorias(){

        $objController = new PessoaDAO();

        return $objController->buscaCategorias();
    }

    public function buscaValor(){

        $objController = new PessoaDAO();

        return $objController->buscaValor();
    }

    public function buscaQtdVotosMesmaCategoria($categoria_voto)
    {

        $objController = new PessoaDAO();

        $usuario_logado = UtilController::RetornarCodigoLogado();

        return $objController->buscaQtdVotosMesmaCategoria($usuario_logado, $categoria_voto);
    }

    public function CarregarVotos($id_pessoa)
    {

        $objController = new PessoaDAO();

        //$cod_pessoa = UtilController::RetornarCodigoLogado();

        return $objController->CarregarVotos($id_pessoa);
    }

    public function ValidarLogin($cpf, $re)
    {

        if (trim($cpf) == '' || trim($re) == '') {

            return 0;
        }

        $dao = new PessoaDAO();

        $usuario = $dao->ValidarLogin(preg_replace('/[^0-9]/', '', $cpf));

        if (count($usuario) == 0) {
            return -7;
        } else {

            // Criptografa a senha digitada para ser comparada com a criptografia do banco
            //$senha = password_hash($senha, PASSWORD_DEFAULT);

            if ($re == $usuario[0]['cadastro_pessoa']) {

                UtilController::GuardarInformacao($usuario[0]['id_pessoa'], $usuario[0]['nome_pessoa'], $usuario[0]['tipo_pessoa']);

                //header('location: ver_anuncios.php');
                echo '<script>window.location = "https://gentedevalor.agenciamango.com.br/";</script>';
            } else {
                return -8;
            }
        }
    }

    public function ValidaEmail($email)
    {
        if (trim($email) == '') {
            return 0;
        }
        try {
            $objDao = new PessoaDAO();
            return $objDao->ValidaEmail($email);
        } catch (Exception $ex) {
            return -100;
        }
    }

    public function buscaQtdTotalColaboradores(){

        $objController = new PessoaDAO();

        $tipo_pessoa = 2;

        return $objController->buscaQtdTotalColaboradores($tipo_pessoa);

    }

    public function buscaQtdTotalColaboradoresVotacao(){

        $objController = new PessoaDAO();

        return $objController->buscaQtdTotalColaboradoresVotacao();

    }

    public function buscaQtdTotalVotos(){

        $objController = new PessoaDAO();

        return $objController->buscaQtdTotalVotos();

    }

    public function CarregarDadosRanking()
    {

        $objDao = new PessoaDAO();

        $tipo_pessoa = 1;

        return $objDao->CarregarDadosRanking($tipo_pessoa);
    }


}
