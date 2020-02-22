<?php

namespace Grocelivery\Mailer\Mailables;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable as BaseMailable;

/**
 * Class Mailable
 * @package Grocelivery\Mailer\Mailables
 */
class Mailable extends BaseMailable
{
    use Queueable;

    /** @var array */
    protected $data = [];
    /** @var string */
    protected $template;

    public function build(): Mailable
    {
        return $this->view('mails.' . $this->getTemplate(), $this->getData());
    }

    public function setData(array $data): void
    {
        $this->data = $data;
    }

    public function setTemplate(string $template): void
    {
        $this->template = $template;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function getTemplate(): string
    {
        return $this->template;
    }
}