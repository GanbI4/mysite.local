<?php
class Data_from_STR
{
    public $controller;
    public $action;
    public $param = null;
    public $is_param = false;
    public $type_param = null;
    
    public function __construct($control, $action)
    {
 		$routes = explode('/', $control); 
		if ( !empty($routes[1]) )
			$this->controller = $routes[1];
		else 
		    $this->controller = 'main';	

		$this->action = $action;
		if ( !empty($routes[2]) )
		{
			$this->is_param = true;
		    $this->type_param = $this->getTypeParam();
		}
    }
    public function __toString()
    {
        $s = "controller => $this->controller, action => функция, param => $this->param, 
                is_param => $this->is_param, type_param => $this->type_param";
        return $s;
    }
    
    private function getTypeParam()
    {
        return '%d';
    }
    
}
?>
