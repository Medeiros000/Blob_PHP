<?php

namespace sistema\Suporte;

use Twig\Lexer;
use sistema\Nucleo\Helpers;

class Template
{

    private \Twig\Environment $twig;

    public function __construct(string $diretorio)
    {
        $loader = new \Twig\Loader\FilesystemLoader($diretorio);
        $this->twig = new \Twig\Environment($loader);
        $lexer = new Lexer($this->twig, array(
            $this->helpers()
        ));
        $this->twig->setLexer($lexer);
    }

    public function renderizar(string $view, array $dados)
    {
        return $this->twig->render($view, $dados);
    }

    public function helpers(): void
    {
        array(
            $this->twig->addFunction(
                new \Twig\TwigFunction('url', function (string $url = null) {
                    return Helpers::url($url);
                })
            ),
            $this->twig->addFunction(
                new \Twig\TwigFunction('saudacao', function () {
                    return Helpers::saudacao();
                })
            ),
            $this->twig->addFunction(
                new \Twig\TwigFunction('resumirTexto', function(string $texto, int $limite){
                    return Helpers::resumirTexto($texto, $limite);
                })
            ),
            $this->twig->addFunction(
                new \Twig\TwigFunction('loadFilesDir', function(string $texto){
                    return Helpers::loadFilesDir($texto);
                })
            ),
            $this->twig->addFunction(
                new \Twig\TwigFunction('db_local', function(){
                    return Helpers::db_local();
                })
            )
        );
    }
}
