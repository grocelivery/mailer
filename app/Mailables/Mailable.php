<?php

namespace Grocelivery\Notifier\Mailables;

use Grocelivery\Notifier\Contracts\Mailable as MailableInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable as BaseMailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Validator;

/**
 * Class Mailable
 * @package Grocelivery\Notifier\Mailables
 */
abstract class Mailable extends BaseMailable implements MailableInterface
{
    use Queueable, SerializesModels;

    /** @var array */
    protected $data = [];

    /**
     * @return MailableInterface
     */
    public function build(): MailableInterface
    {
        $this->mutateData();
        return $this->view('mails.' . $this->getTemplateName(), $this->getData());
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     * @return MailableInterface
     * @throws ValidationException
     */
    public function setData(array $data): MailableInterface
    {
        $this->validateData($data);
        $this->data = $data;
        return $this;
    }

    /**
     * @return array
     */
    public function getDataRules(): array
    {
        return [];
    }

    /**
     * @param array $data
     * @throws ValidationException
     */
    protected function validateData(array $data): void
    {
        /** @var Validator $validator */
        $validator = app('validator')->make($data, $this->getDataRules());

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }

    /**
     * @return MailableInterface
     */
    protected function mutateData(): MailableInterface
    {
        return $this;
    }
}