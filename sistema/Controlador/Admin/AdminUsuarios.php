<?php

namespace sistema\Controlador\Admin;

use sistema\Modelo\CategoriaModelo;

/**
 * Classe AdminUsuarios
 * 
 * @author Jr Medeiros
 */
class AdminUsuarios extends AdminControlador
{
    public function listar(): void
    {
        echo $this->template->renderizar('usuarios/listar.html', [
            'categorias' => (new CategoriaModelo())->busca()
        ]);
    }
}
