<?php

/*
Класс-маршрутизатор для определения запрашиваемой страницы.
> цепляет классы контроллеров и моделей;
> создает экземпляры контролеров страниц и вызывает действия этих контроллеров.
*/

class D_STR
{
    public static $preg_str = array();
}

class U_STR
{
    public static $func = null;
    public static $param = array();
}

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
        foreach(D_STR::$preg_str as $k => $func)
        {
            preg_match($k, $_SERVER['REQUEST_URI'], $matches);
            if (isset($matches) && count($matches))
            {
                U_STR::$func = $func;
                for ($i = 1; $i < count($matches); $i++)
                    U_STR::$param[] = $matches[$i];
            }
        }    
        if (isset(U_STR::$func))
            call_user_func_array(U_STR::$func, U_STR::$param);
//    		$action($dataurl->param);
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
