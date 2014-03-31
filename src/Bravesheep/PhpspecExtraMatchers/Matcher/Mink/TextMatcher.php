<?php

namespace Bravesheep\PhpspecExtraMatchers\Matcher\Mink;

use Behat\Mink\Element\ElementInterface;
use Bravesheep\PhpspecExtraMatchers\Matcher\SimpleMatcher;
use PhpSpec\Exception\Example\FailureException;

class TextMatcher extends SimpleMatcher
{
    /**
     * {@inheritdoc}
     */
    protected function matches($subject, array $arguments)
    {
        /** @var ElementInterface $element */
        $element = $subject;

        $actual = $element->getText();
        $actual = preg_replace('/\s+/u', ' ', $actual);
        $regex  = '/'.preg_quote($arguments[0], '/').'/ui';

        return 1 === preg_match($regex, $actual);
    }

    /**
     * @param string $name
     * @param ElementInterface  $subject
     * @param array  $arguments
     *
     * @return FailureException
     */
    protected function getFailureException($name, $subject, array $arguments)
    {
        return new FailureException(sprintf(
            'Expected element to contain text %s, but it does not.',
            $this->presenter->presentString($arguments[0])
        ));
    }

    /**
     * @param string $name
     * @param ElementInterface  $subject
     * @param array  $arguments
     *
     * @return FailureException
     */
    protected function getNegativeFailureException($name, $subject, array $arguments)
    {
        return new FailureException(sprintf(
            'Expected element not to contain text %s, but it does.',
            $this->presenter->presentString($arguments[0])
        ));
    }

    /**
     * {@inheritdoc}
     */
    protected function getNames()
    {
        return [
            'containText',
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
        return $subject instanceof ElementInterface;
    }
}
