<?php

namespace shop;

use \RedBeanPHP\R as R;

class DataBase
{
    use TSingleton;

    protected function __construct() {
        $db = require_once CONF . '/config_db.php';

        R::setup($db['dsn'], $db['user'], $db['password'], false);
        if (!R::testConnection()) {
            throw new \Exception("Don't connection DB", 500);
        }

        R::freeze(true);
        if(DEBUG){
            R::debug(true, 1);
        }
    }
}