<?php

namespace sistema\Modelo;

use sistema\Nucleo\Conexao;

/**
 * Classe CategoriaModelo
 * 
 * @author Jr Medeiros
 */

class CategoriaModelo
{
    public function busca(): array
    {
        $query = "select * from categorias where status = 1 order by title asc";
        $stmt = Conexao::getInstancia()->query($query);
        $result = $stmt->fetchAll();

        return $result;
    }

    public function buscaPorId(int $id): bool|object
    {
        $query = "select * from categoria where id = {$id}";
        $stmt = Conexao::getInstancia()->query($query);
        $result = $stmt->fetch();

        return $result;
    }

    public function posts(int $id): array
    {
        $query = "select * from posts where categoria_id = {$id} and status = 1 order by title asc";
        $stmt = Conexao::getInstancia()->query($query);
        $result = $stmt->fetchAll();

        return $result;
    }
}
