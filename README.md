Regular expression validator
============================

[![Build Status](https://travis-ci.org/antalaron/regex-validator.svg?branch=master)](https://travis-ci.org/antalaron/regex-validator) [![Coverage Status](https://coveralls.io/repos/github/antalaron/regex-validator/badge.svg)](https://coveralls.io/github/antalaron/regex-validator?branch=master) [![Latest Stable Version](https://poser.pugx.org/antalaron/regex-validator/v/stable)](https://packagist.org/packages/antalaron/regex-validator) [![Latest Unstable Version](https://poser.pugx.org/antalaron/regex-validator/v/unstable)](https://packagist.org/packages/antalaron/regex-validator) [![License](https://poser.pugx.org/antalaron/regex-validator/license)](https://packagist.org/packages/antalaron/regex-validator)

PHP library to validate regular expressions.

Installation
------------

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this library:

```bash
$ composer require antalaron/regex-validator
```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

Basic usage
-----------

To validate a regular expression:

```php
use Antalaron\RegexValidator\Regex;
use Symfony\Component\Validator\Validation;

$validator = Validation::createValidator();
$violations = $validator->validate('/foo/', new Regex());

if (0 !== count($violations)) {
    foreach ($violations as $violation) {
        echo $violation->getMessage().'<br>';
    }
}
```

License
-------

This library is under [MIT License](http://opensource.org/licenses/mit-license.php).
