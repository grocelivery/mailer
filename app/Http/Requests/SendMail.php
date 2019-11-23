<?php


namespace Grocelivery\Notifier\Http\Requests;

use Grocelivery\HttpUtils\Requests\FormRequest;

/**
 * Class SendMail
 * @package Grocelivery\Notifier\Http\Requests
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
            'data' => 'array',
        ];
    }

    public function messages(): array
    {
        return [
            'to.required' => 'Addressee email is required.',
            'to.email' => 'Addressee email needs to be valid email addres.',
        ];
    }
}