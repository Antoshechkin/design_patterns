<?php

class WorkerPool
{
    private array $freeWorkers = [];
    private array $busyWorkers = [];

    public function getWorker()
    {
        if (count($this->freeWorkers) === 0) {
            $worker = new Worker();
        } else {
            $worker = array_pop($this->freeWorkers);
        }

        $this->busyWorkers[spl_object_hash($worker)] = $worker;
        
        return $worker;
    }

    public function release(Worker $worker)
    {
        $key = spl_object_hash($worker);

        if (isset($this->busyWorkers[$key])) {
            unset($this->busyWorkers[$key]);
            $this->freeWorkers[$key] = $worker;
        }
    }

    /**
     * @return array
     */
    public function getFreeWorkers(): array
    {
        return $this->freeWorkers;
    }

    /**
     * @param array $freeWorkers
     */
    public function setFreeWorkers(array $freeWorkers): void
    {
        $this->freeWorkers = $freeWorkers;
    }

    /**
     * @return array
     */
    public function getBusyWorkers(): array
    {
        return $this->busyWorkers;
    }

    /**
     * @param array $busyWorkers
     */
    public function setBusyWorkers(array $busyWorkers): void
    {
        $this->busyWorkers = $busyWorkers;
    }
}

class Worker
{
    public function work()
    {
        printf("Im working\n");
    }
}

$pool = new WorkerPool();
$worker = $pool->getWorker();
$worker->work();

$worker2 = $pool->getWorker();
$worker3 = $pool->getWorker();

$pool->release($worker);

var_dump($pool->getFreeWorkers());
var_dump($pool->getBusyWorkers());