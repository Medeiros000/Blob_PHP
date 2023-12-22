<?php

namespace sistema\Controlador;

use sistema\Nucleo\Controlador;

class SiteControlador extends Controlador
{

    public function __construct()
    {
        parent::__construct('templates/sites/views');
    }

    public function index(): void
    {
        echo $this->template->renderizar('index.html', [
            'titulo' => 'Teste de título',
            'subtitulo' => 'teste de subtitulo'
        ]);
    }

    public function precos(): void
    {
        echo $this->template->renderizar('precos.html', [
            'titulo' => 'Preços',
            'subtitulo' => 'força de vontade'
        ]);
    }

    public function sobre(): void
    {
        echo $this->template->renderizar('sobre.html', [
            'titulo' => 'Sobre Nós',
            'subtitulo' => 'força de vontade'
        ]);
    }
}
