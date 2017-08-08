<?php

/*
Класс-маршрутизатор для определения запрашиваемой страницы.
> цепляет классы контроллеров и моделей;
> создает экземпляры контролеров страниц и вызывает действия этих контроллеров.
*/

class Route
{
    private static $list_of_param = Array();
    
    public static function register($key, $func)
    {
        self::$list_of_param[] = new DataFromStr($key, $func);
    }
    
	public static function start()
	{
			// контроллер и действие по умолчанию
        $dataurl = new DataFromUrl($_SERVER['REQUEST_URI']);

        foreach (self::$list_of_param as $datastr)
            if (($datastr->controller == $dataurl->controller_name) && 
                            ($datastr->is_param == isset($dataurl->param)))
                if ($datastr->type_param == $dataurl->type_param)
                    $action = $datastr->action;
                else
                {
        			throw new Exception('Ошибка в параметре!!!');
		        	exit;
                }
        if (isset($action))
    		$action($dataurl->param);
    	else
        {
        	throw new Exception('Отсутствует метод');
		    exit;
        }    	
	}
	
	public static function error404()
	{
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }
    
}
?>
