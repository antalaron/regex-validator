<?php

/*
 * (c) Antal Áron <antalaron@antalaron.hu>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Antalaron\RegexValidator\Tests;

use Antalaron\RegexValidator\Regex;
use Antalaron\RegexValidator\RegexValidator;

class RegexValidatorTest extends AbstractConstraintValidatorTest
{
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
}
