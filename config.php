<?php
set_exception_handler('exceptionHandler');

function exceptionHandler($exception)
{
    echo $exception->getMessage(), "\n";
}

spl_autoload_register(function ($class_name) {
    require_once($class_name . '.php');
});