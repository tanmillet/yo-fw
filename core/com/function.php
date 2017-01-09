<?php
/**
 * Created by PhpStorm.
 * User: tanmillet
 * Date: 2017/1/7
 * Time: 11:23
 */

if (!function_exists('p')) {

    function p($params)
    {
        var_dump($params);
    }
}

if (!function_exists('post')) {
    function post($name, $default, $filter)
    {
        if (isset($_POST[$name]) || !empty($_POST[$name])) {
            switch ($filter) {
                case 'int':
                    return is_numeric($_POST[$name]) ? $_POST[$name] : 0;
                    break;
                case 'string':
                    return is_string($_POST[$name]) && !is_null($_POST[$name]) ? $_POST[$name] : '';
                default :
                    return $_POST[$name];
                    break;
            }
        } else {
            return $default;
        }
    }
}

if (!function_exists('get')) {
    function get($name, $default, $filter)
    {
        if (isset($_GET[$name]) || empty($_GET[$name])) {
            switch ($filter) {
                case 'int':
                    return is_numeric($_GET[$name]) ? $_GET[$name] : 0;
                    break;
                case 'string':
                    return is_string($_GET[$name]) && is_null($_GET[$name]) ? $_GET[$name] : '';
                default :
                    return $_GET[$name];
                    break;
            }
        } else {
            return $default;
        }
    }
}