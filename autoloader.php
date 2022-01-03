<?php

/*
 * Auto-load class files from multiple directories using the SPL_AUTOLOAD_REGISTER method
 * Source: https://www.php.net/manual/en/function.spl-autoload-register.php
 */
spl_autoload_register(function($class_name) {

    // Define an array of directories in the order of their priority to iterate through.
    $dirs = array(
        PROJECT_ROOT . 'app/controller/',
        PROJECT_ROOT . 'app/filter/',
        PROJECT_ROOT . 'app/model/',
        PROJECT_ROOT . 'app/view/',
        PROJECT_ROOT . 'app/db/',
    );

    // Loop through each directory to load all the class files. It will only require a file once.
    // If it finds the same class in a directory later on, IT WILL IGNORE IT! Because of that require once!
    foreach ($dirs as $dir) {
        if(!stripos($dir, 'view')){
            $class_name = ucfirst($class_name);
        }
        if (file_exists($dir . $class_name . '.php')) {
            require_once($dir . $class_name . '.php');
            return true;
        }
    }
    return false;
});
