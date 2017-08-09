<?php

    namespace application\controllers;

    use application\core\Controller as Controller;
    use application\models\ModelAbout as ModelAbout;
    use application\core\View as View;

    class ControllerAbout extends Controller
    {
	    function __construct()
	    {
		    self::$model = new ModelAbout();
	    }
	
    	function actionIndex($params = array())
    	{
		    self::$view = new View();
            self::$view->addTemplate("menu", "menu");
            $arr = array();
            foreach($params as $i => $v){
                $arr['params' . ($i+1)] = $v;
            }
            $arr['data'] = Controller::$model->get_Data();
            self::$view->addTemplate("content", "about_view", $arr);
            self::$view->display();    		    	
    	}
    }
?>
