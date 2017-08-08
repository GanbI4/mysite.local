<?php
class Data_from_URL
{
    public $controller_name;
    public $param = null;
    public $type_param = null;
    
    private $preg_str = '/^\d*$/';

    public function __construct($str){
		$routes = explode('/', $str);
		if ( !empty($routes[1]) )
			$this->controller_name = $routes[1];
		else	
{
		    $this->controller_name = 'main';
		    }

		if ( !empty($routes[2]) )
		{
			$this->param = $routes[2];
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