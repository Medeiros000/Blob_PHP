<?php

namespace sistema\Controlador;

use sistema\Nucleo\Controlador;
use sistema\Modelo\PostModelo;
use sistema\Modelo\CategoriaModelo;
use sistema\Nucleo\Helpers;

/**
 * @author Jr Medeiros
 */
class SiteControlador extends Controlador
{

    public function __construct()
    {
        parent::__construct('templates/sites/views');
    }

    public function categorias(): array
    {
        return (new CategoriaModelo())->busca();
    }

    public function index(): void
    {
        $posts = (new PostModelo())->busca();
        echo $this->template->renderizar('index.html', [
            'titulo' => 'Home',
            'subtitulo' => 'teste de subtitulo',
            'posts' => $posts,
            'categorias' => $this->categorias()
        ]);
    }

    public function buscar(): void
    {
        $busca = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $posts = (isset($busca) ? (new PostModelo())->pesquisa($busca['busca']) : 'falhou');
        echo $this->template->renderizar('buscar.html', [
            'titulo' => 'Home',
            'posts' => $posts,
            'categorias' => $this->categorias()
        ]);
    }

    public function post(int $id): void
    {
        $post = (new PostModelo())->buscaPorId($id);
        if (!$post) {
            Helpers::redirecionar('404');
        }
        echo $this->template->renderizar('post.html', [
            'post' => $post,
            'categorias' => $this->categorias()
        ]);
    }

    public function features(): void
    {
        echo $this->template->renderizar('features.html', [
            'titulo' => 'Features',
            'subtitulo' => 'força de vontade',
            'categorias' => $this->categorias()
        ]);
    }

    public function precos(): void
    {
        echo $this->template->renderizar('precos.html', [
            'titulo' => 'Preços',
            'subtitulo' => 'força de vontade',
            'categorias' => $this->categorias()
        ]);
    }

    public function faqs(): void
    {
        echo $this->template->renderizar('faqs.html', [
            'titulo' => 'Faqs',
            'subtitulo' => 'força de vontade',
            'categorias' => $this->categorias()
        ]);
    }

    public function categoria(int $id): void
    {
        $posts = (new CategoriaModelo())->posts($id);
        echo $this->template->renderizar('categoria.html', [
            'posts' => $posts,
            'categorias' => $this->categorias()
        ]);
    }

    public function sobre(): void
    {
        $imgs = Helpers::loadFilesDir('templates/sites/assets/img/crsl/');
        sort($imgs, SORT_REGULAR);
        $imgMain = $imgs[0] ?? null;
        unset($imgs[0]);
        echo $this->template->renderizar('sobre.html', [
            'titulo' => 'Sobre Nós',
            'subtitulo' => 'força de vontade',
            'categorias' => $this->categorias(),
            'img0' => $imgMain,
            'imgs' => $imgs
        ]);
    }

    public function login(): void
    {
        echo $this->template->renderizar('login.html', [
            'titulo' => 'Login',
            'subtitulo' => 'força de vontade',
            'categorias' => $this->categorias()
        ]);
    }

    public function signup(): void
    {
        echo $this->template->renderizar('signup.html', [
            'titulo' => 'Sign up',
            'subtitulo' => 'força de vontade',
            'categorias' => $this->categorias()
        ]);
    }

    public function erro404(): void
    {
        echo $this->template->renderizar('404.html', [
            'titulo' => 'Página não encontrada'
        ]);
    }
}
