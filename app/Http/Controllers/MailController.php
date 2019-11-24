<?php

namespace Grocelivery\Notifier\Http\Controllers;

use Grocelivery\Utils\Interfaces\JsonResponseInterface as JsonResponse;
use Grocelivery\Notifier\Contracts\Mailable;
use Grocelivery\Notifier\Exceptions\InvalidMailableException;
use Grocelivery\Notifier\Http\Requests\SendMail;
use Grocelivery\Notifier\Mailables\EmailVerification;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Validation\ValidationException;

/**
 * Class MailController
 * @package Grocelivery\Notifier\Http\Controllers
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
     * @throws InvalidMailableException
     */
    public function sendMail(SendMail $request): JsonResponse
    {
        $mailable = $this->resolveMailable($request->attributes->get('mailable'));
        $mailable->setData($request->input('data') ?? []);

        $this->mailer->to($request->input('to'))->queue($mailable);

        return $this->response->setMessage('Email was sent.');
    }

    /**
     * @param string $mailableName
     * @return Mailable
     * @throws InvalidMailableException
     */
    protected function resolveMailable(string $mailableName): Mailable
    {
        try {
            return app()->make("mailable.$mailableName");
        } catch (BindingResolutionException $exception) {
            throw new InvalidMailableException();
        }
    }
}