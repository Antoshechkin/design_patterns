<?php

interface Worker
{
    public function work();
}

class Developer implements Worker
{
    public function work()
    {
        printf("Im developing\n");
    }
}

class Designer implements Worker
{
    public function work()
    {
        printf("Im designing\n");
    }
}

interface WorkerFactory
{
    public static function make();
}

class DeveloperFactory implements WorkerFactory
{
    public static function make(): Developer
    {
        return new Developer();
    }
}

class DesignerFactory implements WorkerFactory
{
    public static function make(): Designer
    {
        return new Designer();
    }
}

$developer = DeveloperFactory::make();
$designer = DesignerFactory::make();

$developer->work();
$designer->work();