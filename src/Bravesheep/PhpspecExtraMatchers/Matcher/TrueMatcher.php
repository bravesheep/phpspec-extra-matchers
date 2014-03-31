<?php

namespace Bravesheep\PhpspecExtraMatchers\Matcher;

use PhpSpec\Exception\Example\FailureException;

class TrueMatcher extends SimpleMatcher
{
    /**
     * @param mixed $subject
     * @param array $arguments
     *
     * @return boolean
     */
    protected function matches($subject, array $arguments)
    {
        return true === $subject;
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
            "Expected %s to be true, but it is not.",
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
            "Expected %s not to be true, but it is.",
            $this->presenter->presentValue($subject)
        ));
    }

    /**
     * {@inheritdoc}
     */
    protected function getNames()
    {
        return [
            'beTrue',
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
