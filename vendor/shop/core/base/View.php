<?php

namespace shop\base;

class View
{
    public $route;
    public $controller;
    public $view;
    public $modal;
    public $prefix;
    public $layout;
    public $data = [];
    public $meta = [];

    public function __construct($route, $layaut = '', $view = '', $meta) {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->view = $view;
        $this->model = $route['controller'];
        $this->prefix = $route['prefix'];
        $this->meta = $meta;
        if($$layaut === false) {
            $this->layaut = false;
        }else {
            $this->layaut = $layaut ?: LAYOUT;
        }
    }

    public function render($data) {
        if (is_array($data)) extract($data);
        $viewFile = APP . "/views/{$this->prefix}{$this->controller}/{$this->view}.php";
        if (is_file($viewFile)) {
            ob_start();
            require_once $viewFile;
            $content = ob_get_clean();
        }else {
            throw new \Exception("Don't found view {$viewFile}", 500);
        }

        if (false !== $this->layaut) {
           $layoutFile = APP . "/views/layouts/{$this->layaut}.php";
           if (is_file($layoutFile)) {
               require_once $layoutFile;
           }else {
               throw new \Exception("Don't found layout {$this->layaut}", 500);
           }
        }
    }

    public function getMeta($meta){
        foreach ($meta as $k => $v) {
            if ($k == 'title') {
                $output = '<title>' . $v .'</title>' . PHP_EOL;
                continue;
            }
            $output .= '<meta name="' . $k . '" content="' . $v . '">' . PHP_EOL;
        }
        return $output;
    }
}