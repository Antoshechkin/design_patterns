<?php

interface Worker
{
    public function countSalary(): float|int;
}

abstract class WorkerDecorator implements Worker
{
    protected Worker $worker;

    /**
     * @param Worker $worker
     */
    public function __construct(Worker $worker)
    {
        $this->worker = $worker;
    }
}

class Developer implements Worker
{
    public function countSalary(): float|int
    {
        return 20 * 3000;
    }
}

class DeveloperOverTime extends WorkerDecorator
{
     public function countSalary(): float
     {
         return $this->worker->countSalary() +  $this->worker->countSalary() * 0.2;
     }
}

$developer = new Developer();

$developerOverTime = new DeveloperOverTime($developer);

var_dump($developer->countSalary());
var_dump($developerOverTime->countSalary());