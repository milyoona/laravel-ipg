<?php

if ( ! function_exists('lumen_config_path') )
{
    function lumen_config_path($path = '')
    {
        return app()->basePath() . '/config' . ($path ? '/' . $path : $path);
    }
}

if ( ! function_exists('lumen_database_path') )
{
    function lumen_database_path($path = '')
    {
        return app()->basePath() . '/database/migrations' . ($path ? '/' . $path : $path);
    }
}

if (!function_exists('app_path')) {

    function app_path($path = '')
    {
        return app('path') . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}
