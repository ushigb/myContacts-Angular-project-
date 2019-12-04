<?php

spl_autoload_register(function ($class) {
    if (strpos($class, 'Controller') > -1) {
        include 'controllers/' . $class . '.php';
    }  else if (strpos($class, 'Model') > -1) {
        include 'models/' . $class . '.php';
    } else {
        include 'Services/' . $class . '.php';
    }
});

session_start();