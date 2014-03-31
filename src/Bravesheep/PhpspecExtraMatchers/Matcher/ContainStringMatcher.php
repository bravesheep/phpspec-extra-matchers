<?php

namespace Bravesheep\PhpspecExtraMatchers\Matcher;

use PhpSpec\Exception\Example\FailureException;

class ContainStringMatcher extends SimpleMatcher
{
    /**
     * {@inheritdoc}
     */
    protected function matches($subject, array $arguments)
    {
        return false !== strpos($subject, $arguments[0]);
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
            "Expected %s to contain %s, but it does not.",
            $this->presenter->presentString($subject),
            $this->presenter->presentString($arguments[0])
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
            "Expected %s not to contain %s, but it does.",
            $this->presenter->presentString($subject),
            $this->presenter->presentString($arguments[0])
        ));
    }

    /**
     * {@inheritdoc}
     */
    protected function supportsSubject($subject)
    {
        return is_string($subject);
    }

    /**
     * {@inheritdoc}
     */
    protected function getNames()
    {
        return [
            'containString',
            'contain',
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
