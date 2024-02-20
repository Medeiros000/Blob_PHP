<?php

namespace sistema\Controlador\Admin;

use sistema\Modelo\CategoriaModelo;

/**
 * Classe AdminCategorias
 * 
 * @author Jr Medeiros
 */
class AdminCategorias extends AdminControlador
{
    public function listar(): void
    {
        echo $this->template->renderizar('categorias/listar.html', [
            'categorias' => (new CategoriaModelo())->busca_admin()
        ]);
    }
}
