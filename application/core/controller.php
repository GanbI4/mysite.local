<?php

    namespace application\core;

    use application\core\View as View;

    class Controller 
    {
	
    	public static $model;
	    public static $view;
	
    	public function __construct($layout = DEFAULT_LAYOUT)
	    {
//		    self::$view = new View($layout);
    	}
	
    	// действие (action), вызываемое по умолчанию
    	public function actionIndex($params = array())
    	{
    	}
    }
?>
