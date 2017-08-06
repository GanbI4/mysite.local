<?php

trait Singleton {
    static private $instance = null;

    private function __construct() 
    {
        try 
        {
        // можно, конечно, сделать константы или переменные с настройками БД, но в рамках 
        // данной задачи нет необходимости
            $this->pdo = new PDO('mysql:host=localhost;dbname=testdb;charset=UTF8', 'root', 'wwy7Fv7q');
        } 
        catch (PDOException $e) 
        {
            echo 'Ошибка подключения к базе данных!'.'<br/>'.$e->getMessage();
        }
    }
    private function __clone() {}  
    private function __wakeup() {}  

    static public function getInstance() {
		return 
		self::$instance===null
			? self::$instance = new static()
			: self::$instance;
    }
}

class MyDB {
    
    use Singleton;
    private $pdo;
    
    
    public function getContacts($id) {
        $query = 'SELECT * FROM `contacts` WHERE `user_id` = ?'; 
        $poll = $this->pdo->prepare($query);
        $poll->execute([$id]);
        return $poll->fetchAll(PDO::FETCH_ASSOC); //получаем контакты по айдишке
    }
    
    
}
class Model
{
	public function get_data()
	{
	}
}
?>