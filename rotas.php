<?php

// namespace Rotas;

use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::setDefaultNamespace('sistema\Controlador');

SimpleRouter::get(URL_SITE, 'SiteControlador@index');

SimpleRouter::get(URL_SITE . 'features', 'SiteControlador@features');

SimpleRouter::get(URL_SITE . 'precos', 'SiteControlador@precos');

SimpleRouter::get(URL_SITE . 'faqs', 'SiteControlador@faqs');

SimpleRouter::get(URL_SITE . 'sobre-nos', 'SiteControlador@sobre');

SimpleRouter::get(URL_SITE . 'login', 'SiteControlador@login');

SimpleRouter::get(URL_SITE . 'signup', 'SiteControlador@signup');

SimpleRouter::start();
