<?php
    namespace application\controllers;

    use application\core\Controller as Controller;
 
    class Controller_404 extends Controller
    {
        function actionIndex($pamams = '', $params2 = '')
        {
            Controller::$view->generate('404_view.php', 'template_view.php');
        }
    }
?>