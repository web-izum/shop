<?php

namespace shop\base;

class Controller
{
    public $route;
    public $controller;
    public $view;
    public $modal;
    public $prefix;
    public $layout;
    public $data = [];
    public $meta = [];

    public function __construct($route) {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->model = $route['controller'];
        $this->view = $route['action'];
        $this->prefix = $route['prefix'];
    }

    public function getView() {
        $viewObject = new View($this->route, $this->layout, $this->view, $this->meta);
        $viewObject->render($this->data);
    }

    public function set($data) {
        $this->data = $data;
    }

    public function setMeta($metaArr) {
        foreach ($metaArr as $k => $v) {
           $metaArr = [$this->meta[$k] = $v];
        }
    }
}