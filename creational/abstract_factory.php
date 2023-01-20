<?php

interface AbstractFactory
{
    public static function makeDeveloperWorker(): DeveloperWorker;
    public static function makeDesignerWorker(): DesignerWorker;
}

class OutsourceWorkerFactory implements AbstractFactory
{
    public static function makeDeveloperWorker(): DeveloperWorker
    {
        return new OutsourceDeveloperWorker();
    }

    public static function makeDesignerWorker(): DesignerWorker
    {
        return new OutsourceDesignerWorker();
    }
}

class NativeWorkerFactory implements AbstractFactory
{
    public static function makeDeveloperWorker(): DeveloperWorker
    {
        return new NativeDeveloperWorker();
    }

    public static function makeDesignerWorker(): DesignerWorker
    {
        return new NativeDesignerWorker();
    }
}

interface Worker
{
    public function work();
}

interface DeveloperWorker extends Worker
{

}

interface DesignerWorker extends Worker
{

}

class NativeDeveloperWorker implements DeveloperWorker
{
    public function work()
    {
        printf("Im developing as native\n");
    }
}

class OutsourceDeveloperWorker implements DeveloperWorker
{
    public function work()
    {
        printf("Im developing as outsource\n");
    }
}

class NativeDesignerWorker implements DesignerWorker
{
    public function work()
    {
        printf("Im designing as native\n");
    }
}

class OutsourceDesignerWorker implements DesignerWorker
{
    public function work()
    {
        printf("Im designing as outsource\n");
    }
}

$nativeDeveloper = NativeWorkerFactory::makeDeveloperWorker();
$nativeDeveloper->work();

$outsourceDesigner = OutsourceWorkerFactory::makeDesignerWorker();
$outsourceDesigner->work();