<?php

namespace Bravesheep\PhpspecExtraMatchers\Matcher;

use PhpSpec\Exception\Example\FailureException;

class MaximumMatcher extends SimpleMatcher
{
    /**
     * {@inheritdoc}
     */
    protected function matches($subject, array $arguments)
    {
        return $subject < $arguments[0];
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
            "Expected %s to be less than %s, but it is not.",
            $this->presenter->presentValue($subject),
            $this->presenter->presentValue($arguments[0])
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
            "Expected %s to be more than or equal to %s, but it is not.",
            $this->presenter->presentValue($subject),
            $this->presenter->presentValue($arguments[0])
        ));
    }

    /**
     * {@inheritdoc}
     */
    protected function supportsSubject($subject)
    {
        return is_numeric($subject);
    }

    /**
     * {@inheritdoc}
     */
    protected function getNames()
    {
        return [
            'beLessThan',
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getRequiredArgumentCount()
    {
        return 1;
    }
}
