<?php

use League\Plates\Engine;

if(! function_exists('base_path')){
    /**
     * Return the base path
     *
     * @return mixed
     */
    function base_path($path = null)
    {
        return getcwd() . (! is_null($path) ? DIRECTORY_SEPARATOR . $path : "");
    }
}

if(! function_exists('template_path')){
    /**
     * Return the template path
     *
     * @return mixed
     */
    function template_path()
    {
        return base_path('templates');
    }
}

if(! function_exists('view')){
    /**
     * Return the view
     *
     * @param $name
     * @param array $datas
     */
    function view($name, $datas = [])
    {
        $templates = new Engine(template_path());

        echo $templates->render($name, $datas);
    }
}