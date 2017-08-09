<?php
    namespace application\models;

    use application\core as Core;

    class ModelAbout extends Core\Model
    {
        public function get_data()
        {	
            $id = 1; // можно сделать вторую таблицу в БД и запрос SELECT в SELECT, 
            //чтобы получать айдишку по имени пользователя, но у меня в БД сейчас и так один пользователь 
            $m = Core\MyDB::getInstance(); // подключаюсь к БД в конструкторе класса
            return $m->getContacts(htmlspecialchars($id));
        }
    }
?>
