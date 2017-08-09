<?php

    namespace application\controllers;

    use application\core\Controller as Controller;
    use application\controllers\ControllerAbout as ControllerAbout;
    use application\core\View as View;

    class ControllerMain extends Controller
    {
    	public function actionIndex($params = array())
    	{	
		    Controller::$view = new View();
            Controller::$view->addTemplate("menu", "menu");
            Controller::$view->addTemplate("content", "main_view", $params);
            Controller::$view->display();    		    	

    	}
	
        public static function indexAction()
        {
            $tmp = new self();
            $tmp->actionIndex();
        }

        public static function aboutAction()
        {
            $tmp = new ControllerAbout();
            $tmp->actionIndex();
        }

        public static function bad_Action()
        {
            $tmp = new Controller404();
            $tmp->actionIndex();
        }

    	public static function aboutDetailsAction($about)
	    {
            $tmp = new ControllerAbout();
            $tmp->actionIndex([$about]);
    	} 
    	public static function aboutDetailsAction2($about, $about2)
	    {
            $tmp = new ControllerAbout();
            $tmp->actionIndex([$about, $about2]);
    	} 
    }
?>