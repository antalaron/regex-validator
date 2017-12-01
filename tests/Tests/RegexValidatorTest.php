<?php

/*
 * (c) Antal Áron <antalaron@antalaron.hu>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Antalaron\RegexValidator\Tests;

require __DIR__.'/../Fixtures/preg-last-error.php';

use Antalaron\RegexValidator\Regex;
use Antalaron\RegexValidator\RegexValidator;
use Antalaron\RegexValidator\ValidatorMock;

class RegexValidatorTest extends AbstractConstraintValidatorTest
{
    public function setUp()
    {
        parent::setUp();

        ValidatorMock::$pregLastErrorMock = false;
    }

    protected function createValidator()
    {
        return new RegexValidator();
    }

    public function testNullIsValid()
    {
        $this->validator->validate(null, new Regex());

        $this->assertNoViolation();
    }

    /**
     * @dataProvider regexProvider
     */
    public function testRegexes($regex, $valid, $code = null)
    {
        $this->validator->validate($regex, new Regex());

        if ($valid) {
            $this->assertNoViolation();
        } else {
            $this->buildViolation(Regex::MESSAGE)
                ->setCode($code)
                ->assertRaised();
        }
    }

    public function regexProvider()
    {
        return [
            ['/abc/', true],
            ['/abc', false, Regex::OTHER_ERROR],
        ];
    }

    /**
     * @dataProvider regexErrorProvider
     */
    public function testRegexErrors($regex, $errorCode, $code)
    {
        ValidatorMock::$pregLastErrorMock = true;
        ValidatorMock::$pregLastError = $errorCode;

        $this->validator->validate($regex, new Regex());

        $this->assertSame(ValidatorMock::$pregLastErrorMock, true);

        $this->buildViolation(Regex::MESSAGE)
            ->setCode($code)
            ->assertRaised();
    }

    public function regexErrorProvider()
    {
        return [
            ['/abc', \PREG_NO_ERROR, Regex::OTHER_ERROR],
            ['/abc', \PREG_INTERNAL_ERROR, Regex::INTERNAL_ERROR],
            ['/abc', \PREG_BACKTRACK_LIMIT_ERROR, Regex::BACKTRACK_LIMIT_ERROR],
            ['/abc', \PREG_RECURSION_LIMIT_ERROR, Regex::RECURSION_LIMIT_ERROR],
            ['/abc', \PREG_BAD_UTF8_ERROR, Regex::BAD_UTF8_ERROR],
            ['/abc', \PREG_BAD_UTF8_OFFSET_ERROR, Regex::BAD_UTF8_OFFSET_ERROR],
            ['/abc', defined('PREG_JIT_STACKLIMIT_ERROR') ? \PREG_JIT_STACKLIMIT_ERROR : \PREG_NO_ERROR, defined('PREG_JIT_STACKLIMIT_ERROR') ? Regex::JIT_STACKLIMIT_ERROR : Regex::OTHER_ERROR],
        ];
    }
}
