<?php

namespace app\controllers;

use shop\App;

class MainController extends AppController
{
    public function indexAction() {
        $this->setMeta(['title' => App::$app->getProperty('shop_name'), 'description' => 'Lorem ipsum Lorem ipsum Lorem ipsum', 'keywords' => 'keywords, keywords', 'robots' => 'noindex']);
    }
}