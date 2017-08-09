<?php

    namespace application\controllers;

    use application\core\Controller as Controller;
    use application\models\Model_About as Model_About;
    use application\core\View as View;

    class Controller_About extends Controller
    {
	    function __construct()
	    {
		    self::$model = new Model_About();
		    self::$view = new View();
	    }
	
    	function actionIndex($params='', $params2='')
    	{
    		$data = Controller::$model->get_Data();		
    		Controller::$view->generate('about_view.php', 'template_view.php', $params, $params2, $data);
    	}
    }
?>
