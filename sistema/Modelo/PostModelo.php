<?php

namespace sistema\Modelo;

use sistema\Nucleo\Conexao;

/**
 * Classe PostModelo
 * 
 * @author Jr Medeiros
 */

class PostModelo
{
    public function busca(): array
    {
        $query = "select * from posts where status = 1 order by id desc";
        $stmt = Conexao::getInstancia()->query($query);
        $result = $stmt->fetchAll();

        return $result;
    }

    public function buscaPorId(int $id): bool|object
    {
        $query = "select * from posts where id = {$id}";
        $stmt = Conexao::getInstancia()->query($query);
        $result = $stmt->fetch();

        return $result;
    }

    public function pesquisa(string $texto): array
    {
        $query = "select * from posts where status = 1 and title like '%{$texto}%'";
        $stmt = Conexao::getInstancia()->query($query);
        $result = $stmt->fetchAll();

        return $result;
    }

}
