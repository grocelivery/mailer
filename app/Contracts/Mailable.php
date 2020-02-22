<?php

namespace Grocelivery\Mailer\Contracts;

use Illuminate\Contracts\Mail\Mailable as BaseMailable;

interface Mailable extends BaseMailable
{
    public function getDataRules(): array;

    public function build(): Mailable;

    public function getTemplateName(): string;

    public function setData(array $data): Mailable;

    public function getData(): array;
}