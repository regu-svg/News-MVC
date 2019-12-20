<?php

class Route
{
    static function start()
    {
        $controller_name = 'main';
        $action_name = 'index';

        $routes = preg_split('/[\/?]/', $_SERVER['REQUEST_URI']);
        if (!empty($routes[1])) {
            $controller_name = $routes[1];
        }

        if (!empty($routes[2])) {
            $action_name = $routes[2];
        }

        $model_name = 'model_' . $controller_name;
        $controller_name = 'controller_' . $controller_name;

        $action_name = 'action_' . $action_name;

        $model_file = $model_name . '.php';
        $model_path = "application/models/" . $model_file;

        if (file_exists($model_path)) {
            include "application/models/" . $model_file;
        }

        $controller_file = $controller_name . '.php';
        $controller_path = "application/controllers/" . $controller_file;

        if (file_exists($controller_path)) {
            include "application/controllers/" . $controller_file;
        } else {
            Route::ErrorPage404();
            die;
        }

        $controller = new $controller_name;
        $action = $action_name;

        if (method_exists($controller, $action)) {
            $controller->$action();
        } else {
            Route::noAction();
        }
    }

    static function ErrorPage404()
    {
        echo 'HTTP/1.1 404 Not Found';
    }

    static function noAction()
    {
        echo 'Действие не найдено';
    }
}