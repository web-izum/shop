<?php

namespace shop\base;

use shop\DataBase;

abstract class Model
{
    public $attributes = [];
    public $errors = [];
    public $rules = [];

    public function __construct() {
        DataBase::instanse();
    }
}