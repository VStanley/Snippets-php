<?php

/* FactoryMethod - фабричный метод
 *
 *
 *создание разных классов на основе одного абстрактного класса
 */

abstract class FactoryMethod
{
    public static function initial($factory)
    {
        return new $factory;
    }

    abstract public function product();
}

class FactoryAuto extends FactoryMethod
{
    public function product()
    {
        echo 'new auto' . PHP_EOL;
    }
}

class FactoryPhone extends FactoryMethod
{
    public function product()
    {
        echo 'new phone' . PHP_EOL;
    }
}

//использование
$factoryAuto = FactoryAuto::initial('FactoryAuto');
$factoryPhone = FactoryAuto::initial('FactoryPhone');

$factoryAuto->product();
$factoryPhone->product();