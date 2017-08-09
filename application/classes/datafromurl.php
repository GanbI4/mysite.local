<?php
class DataFromUrl
{
    public $controller_name;
    public $param = null;
    public $type_param = null;
    private $preg_str = '/^\d*$/';

    public function __construct($str)
    {
		$routes = explode('/', $str);
		if ( !empty($routes[1]) )
			$this->controller_name = $routes[1];
		else	
		    $this->controller_name = 'main';

		if ((count($routes) > 2) && !empty($routes[count($routes)-1]))
		{
			$this->param = $routes[count($routes)-1];
		    $this->type_param = $this->getType($this->param);
		    $this->is_param = true;
		}    
    }

    public function __toString()
    {
        $s = "controller => $this->controller_name, param => $this->param, 
        type_param => $this->type_param";
        return $s;
    }


	private function getType ($action)
	{
	    if (preg_match ($this->preg_str, $action))
	        return '%d';
        return null;
	}
}
?>