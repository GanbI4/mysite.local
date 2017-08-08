<?php

class Controller_Main extends Controller
{
	public function actionIndex($params='')
	{	
		Controller::$view->generate('main_view.php', 'template_view.php', $params);
	}
	
    public static function indexAction()
    {
        $tmp = new self();
        $tmp->actionIndex();
    }

    public static function aboutAction()
    {
        $tmp = new Controller_About();
        $tmp->actionIndex();
    }

    public static function bad_Action()
    {
        $tmp = new Controller_404();
        $tmp->actionIndex();
    }

	public static function aboutDetailsAction($about)
	{
        $tmp = new Controller_About();
        $tmp->actionIndex($about);
	} 

}
?>