<?php

namespace Grocelivery\Mailer\Http\Controllers;

use Grocelivery\Utils\Interfaces\JsonResponseInterface as JsonResponse;
use Grocelivery\Mailer\Http\Requests\SendMail;
use Illuminate\Contracts\Mail\Mailer;
use Grocelivery\Mailer\Mailables\Mailable;

/**
 * Class MailController
 * @package Grocelivery\Mailer\Http\Controllers
 */
class MailController extends Controller
{
    /** @var Mailer */
    protected $mailer;

    /**
     * MailController constructor.
     * @param JsonResponse $response
     * @param Mailer $mailer
     */
    public function __construct(JsonResponse $response, Mailer $mailer)
    {
        parent::__construct($response);
        $this->mailer = $mailer;
    }

    /**
     * @param SendMail $request
     * @return JsonResponse
     */
    public function sendMail(SendMail $request): JsonResponse
    {
        $mailable = new Mailable();

        $mailable->setTemplate($request->input('template'));
        $mailable->setData($request->input('data') ?? []);

        $this->mailer->to($request->input('to'))->queue($mailable);

        return $this->response->setMessage('Email was sent.');
    }

}