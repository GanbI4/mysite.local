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
    
        public function addTemplate($section, $template, $param = array())
        {
            $fenom = new \Fenom(new \Fenom\Provider($this->viewdir));
            $fenom->setOptions(\Fenom::AUTO_RELOAD);
            $this->content += [$section => $fenom->fetch($template.'.php', $param)];
        }
    
        public function display()
        {
            if (!empty($this->content)){
                extract ($this->content);
            }
            else{
                throw new \Exception('Контент отсутствует');
                exit;
            }
            $fenom = new \Fenom(new \Fenom\Provider($this->layoutdir));
            $fenom->setOptions(\Fenom::AUTO_RELOAD);
            $fenom->display($this->layout, $this->content);
            exit();
        }
    }
?>