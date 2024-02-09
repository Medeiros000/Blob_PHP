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
    /**
     * @author Jr Medeiros
     * @return array list active posts  ordered by id desc
     */
    public function busca(): array
    {
        $query = "select * from posts where status = 1 order by id desc";
        $stmt = Conexao::getInstancia()->query($query);
        $result = $stmt->fetchAll();

        return $result;
    }

    /**
     * @author Jr Medeiros
     * @return bool|object post by id
     */
    public function buscaPorId(int $id): bool|object
    {
        $query = "select * from posts where id = {$id}";
        $stmt = Conexao::getInstancia()->query($query);
        $result = $stmt->fetch();

        return $result;
    }

    /**
     * @author Jr Medeiros
     * @return array search and list posts by a term in the title
     */
    public function pesquisa(string $texto): array
    {
        $query = "select * from posts where status = 1 and title like '%{$texto}%'";
        $stmt = Conexao::getInstancia()->query($query);
        $result = $stmt->fetchAll();

        return $result;
    }
}
