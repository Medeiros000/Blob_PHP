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
    /**
     * @author Jr Medeiros
     * @return array list active categories ordered by title asc
     */
    public function busca(): array
    {
        $query = "select * from categorias where status = 1 order by title asc";
        $stmt = Conexao::getInstancia()->query($query);
        $result = $stmt->fetchAll();

        return $result;
    }

    /**
     * @author Jr Medeiros
     * @return bool|object categories
     */
    public function buscaPorId(int $id): bool|object
    {
        $query = "select * from categoria where id = {$id}";
        $stmt = Conexao::getInstancia()->query($query);
        $result = $stmt->fetch();

        return $result;
    }

    /**
     * @author Jr Medeiros
     * @return array list posts by category ordered by title asc
     */
    public function posts(int $id): array
    {
        $query = "select * from posts where categoria_id = {$id} and status = 1 order by title asc";
        $stmt = Conexao::getInstancia()->query($query);
        $result = $stmt->fetchAll();

        return $result;
    }
}
