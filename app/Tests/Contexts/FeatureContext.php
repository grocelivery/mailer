<?php

namespace Notifier\Tests\Contexts;

use Behat\Behat\Context\Context;
use PHPUnit\Framework\Assert;
use Symfony\Component\HttpFoundation\Request;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\TableNode;
use Notifier\Tests\Traits\InitializingApp;
use Notifier\Http\Responses\Response;

/**
 * Class FeatureContext
 * @package Notifier\Tests\Contexts
 */
class FeatureContext implements Context
{
    use InitializingApp;

    /** @var Response */
    private $response;

    /**
     * @When :method request is sent to :route route
     * @param string $method
     * @param string $route
     */
    public function requestIsSentToRoute(string $method, string $route)
    {
        $_SERVER['REQUEST_METHOD'] = $method;
        $_SERVER['REQUEST_URI'] = $route;

        $request = Request::createFromGlobals();
        $this->response = $this->app->dispatch($request);
    }

    /**
     * @Then response should exist
     */
    public function responseShouldExist()
    {
        Assert::assertNotNull($this->response);
    }

    /**
     * @Then response should contain:
     * @param $keys
     */
    public function responseShouldContain(TableNode $keys)
    {
        foreach ($keys as $key) {
            $value = data_get($this->response->all(), $key["key"], null);
            Assert::assertNotNull($value);
        }
    }

    /**
     * @Then response should have :status status
     * @param int $status
     */
    public function responseShouldHaveStatus(int $status)
    {
        Assert::assertEquals($this->response->getStatusCode(), $status);
    }

    /**
     * @Then response should have :errors errors
     * @param int $errors
     */
    public function responseShouldHaveErrors(int $errors)
    {
        Assert::assertEquals($this->response->countErrors(), $errors);
    }

    /**
     * @Then response should have error messages:
     * @param $errorMessages
     */
    public function responseShouldHaveErrorMessages(TableNode $errorMessages)
    {
        foreach ($errorMessages as $error) {
            Assert::assertContains($error['message'], $this->response->getErrors());
        }
    }
}
