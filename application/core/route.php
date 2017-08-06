<?php

/*
Класс-маршрутизатор для определения запрашиваемой страницы.
> цепляет классы контроллеров и моделей;
> создает экземпляры контролеров страниц и вызывает действия этих контроллеров.
*/
class Route
{
    static $preg_str = '/^\d*$/';
	static function start()
	{
		// контроллер и действие по умолчанию
		$controller_name = 'Main';
		$action_name = 'index';
		$params = '';
		// разбираем строку, используя / как разделитель
		$routes = explode('/', $_SERVER['REQUEST_URI']); 
		// получаем имя контроллера
		if ( !empty($routes[1]) )
		{	
			$controller_name = $routes[1];
		}
		// получаем имя экшена
		if ( !empty($routes[2]) )
		{
			try	{
                $params = self::setHandler ($routes[2]);
			}
			catch (Exception $e){
			    throw $e;
			    exit;
			}
		}
		// добавляем префиксы
		$model_name = 'Model_'.$controller_name;
		$controller_name = 'Controller_'.$controller_name;
		$action_name = 'action_'.$action_name;

		// подцепляем файл с классом модели (файла модели может и не быть)

		$model_file = strtolower($model_name).'.php';
		$model_path = "application/models/".$model_file;
		if(file_exists($model_path))
		{
			include "application/models/".$model_file;
		}

		// подцепляем файл с классом контроллера
		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "application/controllers/".$controller_file;
		if(file_exists($controller_path))
		{
			include "application/controllers/".$controller_file;
		}
		else
		{
// понятно, что имя и путь к файлу на реальном сайте в тексте ошибки указывать не стоит. 
// в данном случае оставил для отладки. 
			throw new Exception('Отсутствует файл контроллера: '.$controller_file);
			exit;
//			self::Error404();
		}
		
		// создаем контроллер
		$controller = new $controller_name;
		$action = $action_name;
		
		if(method_exists($controller, $action))
		{
			// вызываем действие контроллера
			$controller->$action($params);
		}
		else
		{
			throw new Exception('Отсутствует метод контроллера');
			exit;
//			self::Error404();
		}
	
	}
	
	static function setHandler ($action)
	{
	    if (preg_match (self::$preg_str, $action))
	        return $action;
	    else     
			throw new Exception('неверный параметр');
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
