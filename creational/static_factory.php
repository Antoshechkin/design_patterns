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

class WorkerFactory
{
    public static function make(string $worker): ?Worker
    {
        $ClassName = strtoupper($worker);

        if (class_exists($ClassName)) {
            return new $ClassName();
        }

        return null;
    }
}

$developer = WorkerFactory::make('developer');

$developer->work();

$designer = WorkerFactory::make('designer');

$designer->work();

$driver = WorkerFactory::make('driver');

$driver->work();