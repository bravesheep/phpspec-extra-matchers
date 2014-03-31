# Extra phpspec matchers
`bravesheep/phpspec-extra-matchers` contains several extra matchers for phpspec, they are explained below:

* **`ContainStringMatcher`**: This matcher adds `containString(substr)` or `contain(substr)` for strings. When given a
  substring of the subject they match.
* **`FalseMatcher`**: Adds `beFalse()`, equivalent to `be(false)`.
* **`MaximumEqualMatcher`**: Adds `beAtMost(number)`, which matches when the subject is less than or equal to the
  expected value (i.e. the `<=` operator).
* **`MaximumMatcher`**: Adds `beLessThan(number)`, which matches when the subject is less than the expected value (i.e.
   the `<` operator).
* **`MinimumEqualMatcher`**: Adds `beAtLeast(number)`, which matches when the subject is equal to or greater than the
  expected value (i.e. the `>=` operator').
* **`MinimumMatcher`**: Adds `beMoreThan(number)`, matches when the subject is greater than the expected value (i.e.
  the `>` operator').
* **`NullMatcher`**: Adds `beNull()`, equivalent to `be(null)`.
* **`TrueMatcher`**: Adds `beTrue()`, equivalent to `be(true)`.

Additionally some matchers specific in a mink context are available:

* **`Mink\CookieExistanceMatcher`**: adds `haveCookie(name)`, which matches for `Behat\Mink\Session` objects if a cookie
  was set in the session.
* **`Mink\ElementExistanceMatcher`**: adds `matchElement(selector, locator)`, `haveElement(selector, locator)`,
  `haveMatchingElement(selector, locator)` and `containElement(selector, locator)`, and works on
  `Behat\Mink\Element\ElementInterface` instances. They match if `element->has(selector, locator)` returns true.
* **`Mink\RegexUrlMatcher`**: adds `matchAddress(path)` and `matchUrl(path)` which match if the regex matches the path,
  it works on `Behat\Mink\Session` subjects.
* **`Mink\UrlMatcher`**: adds `haveAddress(path)`, `haveUrl(path)`, `beAtAddress(path)` and `beAtUrl(path)`, matches if
  the current url is at the indicated path. It works on `Behat\Mink\Session` subjects.
* **`Mink\StatusCodeMatcher`**: adds `haveStatusCode(code)` and matches for `Behat\Mink\Session` subjects on the status
  code.
* **`Mink\TextMatcher`**: adds `containText(string)` and matches for `Behat\Mink\Element\ElementInterface` subjects if
  their text contains the expected string.
