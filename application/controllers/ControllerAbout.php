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
		    self::$view = new View();
	    }
	
    	function actionIndex($params='', $params2='')
    	{
    		$data = Controller::$model->get_Data();		
    		Controller::$view->generate('about_view.php', 'template_view.php', $params, $params2, $data);
    	}
    }
?>
