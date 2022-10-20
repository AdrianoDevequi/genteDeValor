<?php

namespace Source\Controller;

class UtilController
{

    public static function IniciarSession()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }
    public static function RetornaLinkAbsouto()
    {
        echo 'https://gentedevalor.agenciamango.com.br/';
    }
    public static function RetornaLogo($param)
    {
        if ($param == 'escuro') {
            echo '<img src="/view/assets/images/logo-black.png";/>';
        }if ($param == 'claro'){
            echo '<img src="/view/assets/images/logo-white.png";/>';
        }
    }

    public static function GuardarInformacao($id, $nome, $tipo_pessoa)
    {
        self::IniciarSession();
        $_SESSION['id'] = $id;
        $_SESSION['nome_pessoa'] = $nome;
        $_SESSION['tipo_pessoa'] = $tipo_pessoa;
    }

    public static function RetornarCodigoLogado()
    {
        self::IniciarSession();
        return isset($_SESSION['id']) ? $_SESSION['id'] : null;
    }

    public static function RetornarNomeLogado()
    {
        self::IniciarSession();
        return isset($_SESSION['nome_pessoa']) ? $_SESSION['nome_pessoa'] : null;
    }


    public static function Deslogar()
    {
        self::IniciarSession();
        unset($_SESSION['id']);
        //header('location: acesso.php');
        echo '<script>window.location = "https://gentedevalor.agenciamango.com.br/acesso.php";</script>';
    }

    public static function VerificarLogado()
    {
        self::IniciarSession();
        if ($_SESSION['id'] == null || $_SESSION['id'] == '') {
            // header('location: acesso.php');
            echo '<script>window.location = "https://gentedevalor.agenciamango.com.br/acesso.php";</script>';
        }
    }

    public static function DevolverCriptografia($senha)
    {
        return password_hash($senha, PASSWORD_DEFAULT);
    }

    public static function DevolverNomeFoto()
    {
        return md5(microtime()) . '.jpg';
    }

    public static function validarExtensao($foto)
    {
        if ($foto['type'] != 'image/jpeg') {
            return 0;
        } else {
            return 1;
        }
    }

    public static function DevolverCaminhoFoto($nome)
    {
        return 'fotos/' . $nome;
    }

    public static function DevolverDataHoraAtual()
    {
        date_default_timezone_set('America/Sao_Paulo');
        return date('Y-m-d H:i:s');
    }

    public static function DevolverHoraAtual()
    {
        date_default_timezone_set('America/Sao_Paulo');
        return date('H:i:s');
    }

    public static function DevolverDataAtual()
    {
        date_default_timezone_set('America/Sao_Paulo');
        return date('Y-m-d');
    }

    public static function TirarCaracteresEspeciais($str)
    {
        $especiais = array('_', '(', ')', '-', 'R$', ' ', '.', '%', '#', '*', '!', '?', '/');
        $str = str_replace($especiais, '', $str);

        return $str;
    }

    public static function TratarString($str)
    {
        # Remove palavras suspeitas de injection.
        $str = preg_replace("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/i", "", $str);
        $str = trim($str);        # Remove espaços vazios.
        $str = strip_tags($str);  # Remove tags HTML e PHP.
        //$str = addslashes($str);  # Adiciona barras invertidas à uma string.

        return $str;
    }
    public static function limpaCPF($valor){
        $valor = preg_replace('/[^0-9]/', '', $valor);
        return $valor;
    }

    public static function ValidaEmailValido($email)
    {
        //verifica se e-mail esta no formato correto de escrita
        //   if (!preg_match('/^([a-zA-Z0-9.-])*([@])([a-z0-9]).([a-z]{2,3})/', $email)) {
        // return false;
        //  } else {
        //Valida o dominio

        $dominio = explode('@', $email);
        error_reporting(0);
        ini_set('display_errors', FALSE);
        try {
            if (!checkdnsrr($dominio[1], 'A')) {
                return false;
            } else {
                return true;
            } // Retorno true para indicar que o e-mail é valido
        } catch (Exception $ex) {
            return false;
        }

        // }
    }

}
