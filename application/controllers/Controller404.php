<?php
    namespace application\controllers;

    use application\core\Controller as Controller;
    use application\core\View as View;

    class Controller404 extends Controller
    {
        function actionIndex($params = array())
        {
		    self::$view = new View();
            self::$view->addTemplate("menu", "menu");
            self::$view->addTemplate("content", "404_view", $params);
            self::$view->display();    		    	
        }
    }
?>