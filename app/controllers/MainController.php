<?php

namespace app\controllers;

use shop\App;
use \RedBeanPHP\R as R;

class MainController extends AppController
{
    public function indexAction() {
        $posts = R::findAll('test');
        $this->setMeta(['title' => App::$app->getProperty('shop_name'), 'description' => 'Lorem ipsum Lorem ipsum Lorem ipsum', 'keywords' => 'keywords, keywords', 'robots' => 'noindex']);
        $this->set(compact('posts'));
    }
}