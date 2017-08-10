<?php
    namespace application\core;

    class View 
    {
        private $layoutdir = 'application/layout';
        private $layout = DEFAULT_LAYOUT;
        private $viewdir = 'application/views';
        private $content = array();
    
        public function __construct ($template = DEFAULT_LAYOUT)
        {
            if (file_exists($this->layoutdir . '/' . strtolower($template))) {
                $this->layout = $template;
            } 
            else {
                throw new \Exception('Шаблон ' . $template . ' не найден');
            }
        }
    
        public function addTemplate($section, $template, $param = null)
        {
            ob_start();
            if (isset($param) && !empty($param)){
                extract($param);
            }    
            include $this->viewdir . '/' . $template . '.php'; 
            $this->content += [$section => ob_get_contents()];
            ob_end_clean();
        }
    
        public function display()
        {
            if (!empty($this->content)){
                extract ($this->content);
            }
            else{
                throw new Exception('Контент отсутствует');
                exit;
            }
            $fenom = new \Fenom(new \Fenom\Provider($this->layoutdir));
            $fenom->display($this->layout, $this->content);
            exit();
        }
    }
?>