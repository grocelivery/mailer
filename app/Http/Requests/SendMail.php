<?php

namespace Grocelivery\Mailer\Http\Requests;

use Grocelivery\Utils\Requests\FormRequest;

/**
 * Class SendMail
 * @package Grocelivery\Mailer\Http\Requests
 */
class SendMail extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'to' => 'required|email',
            'template' => 'required|string',
            'data' => 'array',
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'to.required' => 'Addressee email is required.',
            'to.email' => 'Addressee email needs to be valid email addres.',
        ];
    }
}