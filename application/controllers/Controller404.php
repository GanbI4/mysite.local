<?php
    namespace application\controllers;

    use application\core\Controller as Controller;
 
    class Controller404 extends Controller
    {
        function actionIndex($pamams = array())
        {
            self::$view->addTemplate("menu", "menu");
            self::$view->addTemplate("content", "404_view", $params, $data);
            self::$view->display();    		    	
        }
    }
?>