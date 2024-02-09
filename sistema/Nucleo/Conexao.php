<?php

namespace sistema\Nucleo;

use Exception;
use PDO;
use PDOException;

/**
 * Classe Conexao
 * 
 * @author Jr Medeiros
 */
class Conexao
{

    private static $instancia;

    public static function getInstancia(): PDO
    {
        $DB = (Helpers::db_local() == true ? DB_HOST_DOCKER : DB_HOST);
        $PSSWRD = (Helpers::db_local() == true ? DB_PSSWRD_DOCKER : DB_PSSWRD);
        if (empty(self::$instancia)) {
            try {
                self::$instancia = new PDO('mysql:host=' . $DB . ';port=' . DB_PORT . ';dbname=' . DB_NAME, DB_USER, $PSSWRD, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                    PDO::ATTR_CASE => PDO::CASE_NATURAL
                ]);
            } catch (PDOException $ex) {
                die('Erro de conexão:: ' . $ex->getMessage());
            }
        }
        return self::$instancia;
    }

    protected function __construct()
    {
    }

    private function __clone(): void
    {
    }
}
