<?php

    class Controller_Main extends Controller
    {
    	public function actionIndex($params = '', $params2 = '')
    	{	
    		Controller::$view->generate('main_view.php', 'template_view.php', $params);
    	}
	
        public static function indexAction()
        {
            $tmp = new self();
            $tmp->actionIndex();
        }

        public static function aboutAction()
        {
            $tmp = new Controller_About();
            $tmp->actionIndex();
        }

        public static function bad_Action()
        {
            $tmp = new Controller_404();
            $tmp->actionIndex();
        }

    	public static function aboutDetailsAction($about)
	    {
            $tmp = new Controller_About();
            $tmp->actionIndex($about);
    	} 
    	public static function aboutDetailsAction2($about, $about2)
	    {
            $tmp = new Controller_About();
            $tmp->actionIndex($about, $about2);
    	} 
}
?>