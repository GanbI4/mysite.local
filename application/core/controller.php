<?php

class Controller {
	
	static public $model;
	static public $view;
	
	function __construct()
	{
		self::$view = new View();
	}
	
	// действие (action), вызываемое по умолчанию
	function action_index($params =''){}
}
?>
