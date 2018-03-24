<?php

/* Singleton - одиночка
 *
 * гарантирует что будет только один экземпляр некого класса
 * создает глобальный доступ к экземпляру класса
 *
 * очевидное приминение с подключением к базе данных
 */

class Singleton  //DBConnector
{
    private $connection;
    private static $instance;

    private function __clone(){}  //защита от клонирования
    private function __sleep(){}  //защита от unserialize
    private function __wakeup(){}  //защита от unserialize

    private function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        $this->connection = new PDO('mysql:host=localhost;dbname=test', 'root', '');
    }

    public static function getInstance()
    {
        if (empty(self::$instance)){

            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getConnect()
    {
        return $this->connection;
    }
}

//использование
$con1 = Singleton::getInstance();
$con2 = Singleton::getInstance();
$con1->getConnect();
$con2->getConnect();
