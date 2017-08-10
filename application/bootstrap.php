<?php
    
    use application\core\Router as Router;
    use application\controllers\ControllerMain as ControllerMain;

    try
    {
        Router::register('/', function() { 
            ControllerMain::indexAction(); 
        }); 


        Router::register('/about', function() { 
            ControllerMain::aboutAction(); 
        });


        Router::register('/about/{%d}', function($news_id) { 
            ControllerMain::aboutDetailsAction([$news_id]); 
        });

        Router::register('/about/{%d}/and/{%d}', function($about_id, $about_id2) { 
            ControllerMain::aboutDetailsAction([$about_id, $about_id2]); 
        });

        Router::register('/404', function() { 
            ControllerMain::bad_action(); 
        });


        Router::start();
    }   
    catch (Exception $e)
    {
        echo $e->getMessage();
        Router::Error404();
    }
?>