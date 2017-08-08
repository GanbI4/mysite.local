<?php

class Controller_About extends Controller
{

	function __construct()
	{
		self::$model = new Model_About();
		self::$view = new View();
	}
	
	function action_index($params='')
	{
		$data = Controller::$model->get_data();		
		Controller::$view->generate('about_view.php', 'template_view.php', $params, $data);
	}
}
?>
