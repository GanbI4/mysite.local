<?php

class Controller_404 extends Controller
{
	function actionIndex($pamams = '')
	{
		Controller::$view->generate('404_view.php', 'template_view.php');
	}
}
?>