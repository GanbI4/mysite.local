<?php
    namespace application\core;

    use application\classes as Classes;

    class Router
    {
    
        public static function register($key, $func)
        {
            Classes\DataStr::$preg_str['#^'.str_replace('{%d}', '(\d+)', $key)."$#"] = $func;
        }
    
        public static function start()
        {
            $matches = array();
            foreach(Classes\DataStr::$preg_str as $k => $func){
                preg_match($k, $_SERVER['REQUEST_URI'], $matches);
                if (isset($matches) && count($matches)){
                    Classes\DataUrl::$func = $func;
                    for ($i = 1; $i < count($matches); $i++){
                        Classes\DataUrl::$param[] = $matches[$i];
                    }    
                }
            }    
            if (isset(Classes\DataUrl::$func)){
                call_user_func_array(Classes\DataUrl::$func, Classes\DataUrl::$param);
            }
            else{
                throw new \Exception('Отсутствует метод');
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
