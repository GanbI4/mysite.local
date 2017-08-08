<?php

class Controller {
	
	public static $model;
	public static $view;
	
	public function __construct()
	{
		self::$view = new View();
	}
	
	// действие (action), вызываемое по умолчанию
	public function actionIndex($params =''){}
}
?>
