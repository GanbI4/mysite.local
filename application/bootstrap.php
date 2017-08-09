<?php
    
    use application\core\Router as Router;
    use application\controllers\Controller_Main as Controller_Main;

    $s = PATH_SEPARATOR.'application/core';
    $s .= PATH_SEPARATOR.'application/classes';
    $s .= PATH_SEPARATOR.'application/controllers';
    $s .= PATH_SEPARATOR.'application/models';
    
    set_include_path(get_include_path().$s);
    spl_autoload_extensions('.php');
    spl_autoload_register();

    try
    {
        Router::register('/', function() { 
            controller_main::indexAction(); 
        }); 


        Router::register('/about', function() { 
            controller_main::aboutAction(); 
        });


        Router::register('/about/{%d}', function($news_id) { 
            controller_main::aboutDetailsAction($news_id); 
        });

        Router::register('/about/{%d}/and/then/another/{%d}', function($about_id, $about_id2) { 
            controller_main::aboutDetailsAction2($about_id, $about_id2); 
        });

        Router::register('/404', function() { 
            controller_main::bad_action(); 
        });


        Router::start();
    }   
    catch (Exception $e)
    {
        echo $e->getMessage();
        Router::Error404();
    }
?>