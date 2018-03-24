<?php

/* Strategy - стратегия
 *
 *
 *
 * позволяет выбирать алгоритм путем определения соответствующего класса
 */

interface Strategy
{
    function createName($filename);
}

class ZipFileNamingStrategy implements Strategy
{
    function createName($filename)
    {
        return "http://downloads.foo.bar/{$filename}.zip";
    }
}

class TarGzFileNamingStrategy implements Strategy
{
    function createName($filename)
    {
        return "http://downloads.foo.bar/{$filename}.tar.gz";
    }
}

class Context
{
    private $namingStrategy;
    function __construct(Strategy $strategy)
    {
        $this->namingStrategy = $strategy;
    }
    function execute()
    {
        $url[] = $this->namingStrategy->createName("Calc101");
        $url[] = $this->namingStrategy->createName("Stat2000");

        return $url;
    }
}

if (strstr($_SERVER["HTTP_USER_AGENT"], "Win"))
    $context = new Context(new ZipFileNamingStrategy());
else
    $context = new Context(new TarGzFileNamingStrategy());


$context->execute();