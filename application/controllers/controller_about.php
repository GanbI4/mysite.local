<?php

class Controller_About extends Controller
{
	function __construct()
	{
		self::$model = new Model_About();
		self::$view = new View();
	}
	
	function actionIndex($params='')
	{
		$data = Controller::$model->get_Data();		
		Controller::$view->generate('about_view.php', 'template_view.php', $params, $data);
	}
}
?>
