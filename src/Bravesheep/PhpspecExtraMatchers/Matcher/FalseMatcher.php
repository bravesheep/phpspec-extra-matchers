<?php

namespace Bravesheep\PhpspecExtraMatchers\Matcher;

use PhpSpec\Exception\Example\FailureException;

class FalseMatcher extends SimpleMatcher
{
    /**
     * @param mixed $subject
     * @param array $arguments
     *
     * @return boolean
     */
    protected function matches($subject, array $arguments)
    {
        return false === $subject;
    }

    /**
     * @param string $name
     * @param mixed  $subject
     * @param array  $arguments
     *
     * @return FailureException
     */
    protected function getFailureException($name, $subject, array $arguments)
    {
        return new FailureException(sprintf(
            "Expected %s to be false, but it is not.",
            $this->presenter->presentValue($subject)
        ));
    }

    /**
     * @param string $name
     * @param mixed  $subject
     * @param array  $arguments
     *
     * @return FailureException
     */
    protected function getNegativeFailureException($name, $subject, array $arguments)
    {
        return new FailureException(sprintf(
            "Expected %s not to be false, but it is.",
            $this->presenter->presentValue($subject)
        ));
    }

    /**
     * {@inheritdoc}
     */
    protected function getNames()
    {
        return [
            'beFalse',
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getRequiredArgumentCount()
    {
        return 0;
    }
}
