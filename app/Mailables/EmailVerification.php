<?php

namespace Grocelivery\Notifier\Mailables;

use Grocelivery\Notifier\Contracts\Mailable as MailableInterface;

/**
 * Class EmailVerification
 * @package Grocelivery\Notifier\Mailables
 */
class EmailVerification extends Mailable
{
    /**
     * @return string
     */
    public function getTemplateName(): string
    {
        return 'emailVerification';
    }

    /**
     * @return array
     */
    public function getDataRules(): array
    {
        return [
            'name' => 'required|string',
            'token'  => 'required|string',
        ];
    }

    public function mutateData(): MailableInterface
    {
        $this->data = [
            'name' => $this->data['name'],
            'link' => 'link/to/email/activation/' . $this->data['token'],
        ];

        return $this;
    }
}