<?php

// namespace Rotas;

use Pecee\SimpleRouter\SimpleRouter;

use sistema\Nucleo\Helpers;

SimpleRouter::setDefaultNamespace('sistema\Controlador');

try {
    SimpleRouter::get(URL_SITE, 'SiteControlador@index');
    SimpleRouter::get(URL_SITE . 'post/{id}', 'SiteControlador@post');
    SimpleRouter::get(URL_SITE . 'categoria/{id}', 'SiteControlador@categoria');
    SimpleRouter::get(URL_SITE . 'features', 'SiteControlador@features');
    SimpleRouter::get(URL_SITE . 'precos', 'SiteControlador@precos');
    SimpleRouter::get(URL_SITE . 'faqs', 'SiteControlador@faqs');
    SimpleRouter::get(URL_SITE . 'sobre-nos', 'SiteControlador@sobre');
    SimpleRouter::get(URL_SITE . 'login', 'SiteControlador@login');
    SimpleRouter::get(URL_SITE . 'signup', 'SiteControlador@signup');
    SimpleRouter::get(URL_SITE . '404', 'SiteControlador@erro404');
    SimpleRouter::start();
} catch (Pecee\SimpleRouter\Exceptions\NotFoundHttpException $ex) {
    if (!Helpers::localhost()) {
        echo $ex;
    } else {
        Helpers::redirecionar('404');
    }
}
