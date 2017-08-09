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
        D_STR::$preg_str['#^'.str_replace('{%d}', '(\d+)', $key)."$#"] = $func;
    }
    
	public static function start()
	{
        $matches = array();
        foreach(DataStr::$preg_str as $k => $func){
            preg_match($k, $_SERVER['REQUEST_URI'], $matches);
            if (isset($matches) && count($matches)){
                DataUrl::$func = $func;
                for ($i = 1; $i < count($matches); $i++)
                    DataUrl::$param[] = $matches[$i];
            }
        }    
        if (isset(DataUrl::$func))
            call_user_func_array(DataUrl::$func, DataUrl::$param);
    	else{
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
