<?php

    $s = PATH_SEPARATOR.'application/core';
    $s .= PATH_SEPARATOR.'application/classes';
    $s .= PATH_SEPARATOR.'application/controllers';
    $s .= PATH_SEPARATOR.'application/models';
//    $s .= PATH_SEPARATOR.'application/views';
    set_include_path(get_include_path().$s);
    spl_autoload_extensions('.php');
    spl_autoload_register();
    try
    {
        Route::register('/', function() { 
            controller_main::indexAction(); 
        }); 


        Route::register('/about', function() { 
            controller_main::aboutAction(); 
        });


        Route::register('/about/{%d}', function($news_id) { 
            controller_main::aboutDetailsAction($news_id); 
        });

        Route::register('/404', function() { 
            controller_main::bad_action(); 
        });


        Route::start();


    }   
    catch (Exception $e)
    {
        echo $e->getMessage();
        Route::Error404();
    }
?>