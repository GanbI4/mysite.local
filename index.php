<?php
    define ('DEFAULT_LAYOUT', 'default_layout.php');
    ini_set('display_errors', 1);
    require_once 'application/autoloader.php'; // подключаем автозагрузчик
    require_once 'application/bootstrap.php'; // инициируем и запускаем роутер
?>
