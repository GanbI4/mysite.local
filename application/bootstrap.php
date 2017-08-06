<?php

// подключаем файлы ядра
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/route.php';

try
{
    Route::start(); // запускаем маршрутизатор
}
catch (Exception $e)
{
//    echo $e->getMessage();
    Route::Error404();
}
?>