<?php
// Configurações do site
define('HOST', '67.23.238.71'); //IP
define('USER', 'user_gentedevalor'); //usuario
define('PASS', 'l!cB[FD88wX31b'); //Senha
define('DB', 'bd_gentedevalor'); //Banco
/**
 * Conexao.class TIPO [Conexão]
 * Descricao: Estabelece conexões com o banco usando SingleTon
 * @copyright (c) 2022, Adriano
 */

class Conexao {

    /** @var PDOStatement */
    public static $Connect;

    private static function Conectar() {
        try {

            //Verifica se a conexão não existe
            if (self::$Connect == null):

                $dsn = 'mysql:host=' . HOST . ';dbname=' . DB .';charset=utf8';
                self::$Connect = new PDO($dsn, USER, PASS, null);
            endif;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        //Seta os atributos para que seja retornado as excessões do banco
        self::$Connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        return self::$Connect;
    }

    public function getConexao() {
        return self::Conectar();
    }
}