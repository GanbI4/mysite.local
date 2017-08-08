<?php

/*
Класс-маршрутизатор для определения запрашиваемой страницы.
> цепляет классы контроллеров и моделей;
> создает экземпляры контролеров страниц и вызывает действия этих контроллеров.
*/

class Route
{
    static $list_of_param = Array();
    
    static function register($key, $func)
    {
        self::$list_of_param[] = new Data_from_STR($key, $func);
    }
    
	static function start()
	{
			// контроллер и действие по умолчанию
        $dataURL = new Data_from_URL($_SERVER['REQUEST_URI']);

        foreach (self::$list_of_param as $data_fromSTR)
            if (($data_fromSTR->controller == $dataURL->controller_name) && 
                            ($data_fromSTR->is_param == isset($dataURL->param)))
                if ($data_fromSTR->type_param == $dataURL->type_param)
                    $action = $data_fromSTR->action;
                else
                {
        			throw new Exception('Ошибка в параметре!!!');
		        	exit;
                }
        if (isset($action))
    		$action($dataURL->param);
    	else
        {
        	throw new Exception('Отсутствует метод');
		    exit;
        }    	
	
	}
	
	static function Error404()
	{
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }
    
}
?>
