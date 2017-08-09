<?php
    namespace application\core;

    class View 
    {
        private $layoutdir = 'application/layout';
        private $defaultlayout = 'application/layout' . '/' . 'default_layout.php';
        private $viewdir = 'application/views';
        private $content = array();
    
        public function __construct ($template = 'DEFAULT_LAYOUT')
        {
            $file = $this->layoutdir . '/' . strtolower($template) . '.php';
            if (file_exists($file)) {
                $this->defaultlayout = $file;
            } 
            else {
                throw new Exception('Шаблон ' . $template . ' не найден');
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
            extract ($this->content);
            include $this->defaultlayout;
        }
    }
?>