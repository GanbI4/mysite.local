<?php

class Controller_Main extends Controller
{

	function action_index($params='')
	{	
		Controller::$view->generate('main_view.php', 'template_view.php', $params);
	}
	
    static function indexAction()
    {
        $tmp = new self();
        $tmp->action_index();
    }

    static function aboutAction()
    {
        $tmp = new Controller_About();
        $tmp->action_index();
    }

    static function bad_action()
    {
        $tmp = new Controller_404();
        $tmp->action_index();
    }

	static function aboutDetailsAction($about)
	{
        $tmp = new Controller_About();
        $tmp->action_index($about);
	} 

}
?>