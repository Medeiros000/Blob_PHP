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
            'titulo' => 'Home',
            'subtitulo' => 'teste de subtitulo'
        ]);
    }

    public function features(): void
    {
        echo $this->template->renderizar('features.html', [
            'titulo' => 'Features',
            'subtitulo' => 'força de vontade'
        ]);
    }

    public function precos(): void
    {
        echo $this->template->renderizar('precos.html', [
            'titulo' => 'Preços',
            'subtitulo' => 'força de vontade'
        ]);
    }

    public function faqs(): void
    {
        echo $this->template->renderizar('faqs.html', [
            'titulo' => 'Faqs',
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
    
    public function login(): void
    {
        echo $this->template->renderizar('login.html', [
            'titulo' => 'Login',
            'subtitulo' => 'força de vontade'
        ]);
    }

    public function signup(): void
    {
        echo $this->template->renderizar('signup.html', [
            'titulo' => 'Sign up',
            'subtitulo' => 'força de vontade'
        ]);
    }
}
