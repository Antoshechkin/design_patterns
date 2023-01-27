<?php

interface Mail
{
    public function render(): string;
}

abstract class TypeMail
{
    protected string $text;

    /**
     * @param string $text
     */
    public function __construct(string $text)
    {
        $this->text = $text;
    }
}

class BusinessMail extends TypeMail implements Mail
{
    public function render(): string
    {
        return $this->text . ' from business mail';
    }
}

class JobMail extends TypeMail implements Mail
{
    public function render(): string
    {
        return $this->text . ' from job mail';
    }
}

class MailFactory
{
    private array $pool = [];

    public function getMail($id, $typeMail, $text): Mail
    {
        if (!isset($this->pool[$id])) {
            $this->pool[$id] = $this->make($typeMail, $text);
        }
        return $this->pool[$id];
    }

    private function make($typeMail, $text): Mail
    {
        if ($typeMail === 'business') {
            return new BusinessMail($text);
        }
        return new JobMail($text);
    }
}

$mailFactory = new MailFactory();
$mail = $mailFactory->getMail(1, 'business', 'hello');
var_dump($mail->render());