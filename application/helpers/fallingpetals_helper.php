<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('debug'))
{
    function debug($value)
    {
        echo '<pre>';
        print_r($value);
        echo '</pre>';
    }
}