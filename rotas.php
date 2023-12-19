<?php

// namespace Rotas;

use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::setDefaultNamespace('sistema\Controlador');

SimpleRouter::get('/blog', 'SiteControlador@index');

SimpleRouter::get('/blog/sobre', 'SiteControlador@sobre');

SimpleRouter::start();
