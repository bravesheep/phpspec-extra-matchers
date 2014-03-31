<?php

namespace Bravesheep\PhpspecExtraMatchers\Matcher\Mink;

use Behat\Mink\Session;
use Bravesheep\PhpspecExtraMatchers\Matcher\SimpleMatcher;
use PhpSpec\Exception\Example\FailureException;

class StatusCodeMatcher extends SimpleMatcher
{
    /**
     * {@inheritdoc}
     */
    protected function matches($subject, array $arguments)
    {
        /** @var Session $session */
        $session = $subject;
        return intval($session->getStatusCode()) === intval($arguments[0]);
    }

    /**
     * @param string $name
     * @param Session  $subject
     * @param array  $arguments
     *
     * @return FailureException
     */
    protected function getFailureException($name, $subject, array $arguments)
    {
        return new FailureException(sprintf(
            'Expected session to have status code %s, but it is %s.',
            $this->presenter->presentValue($subject->getCurrentUrl()),
            $this->presenter->presentValue($arguments[0])
        ));
    }

    /**
     * @param string $name
     * @param Session  $subject
     * @param array  $arguments
     *
     * @return FailureException
     */
    protected function getNegativeFailureException($name, $subject, array $arguments)
    {
        return new FailureException(sprintf(
            'Expected session not to have status code %s, but it is.',
            $this->presenter->presentValue($subject->getStatusCode())
        ));
    }

    /**
     * {@inheritdoc}
     */
    protected function getNames()
    {
        return [
            'haveStatusCode',
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getRequiredArgumentCount()
    {
        return 1;
    }

    /**
     * {@inheritdoc}
     */
    protected function supportsSubject($subject)
    {
        return $subject instanceof Session;
    }
}
