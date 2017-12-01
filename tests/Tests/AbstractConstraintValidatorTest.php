<?php

/*
 * (c) Antal Áron <antalaron@antalaron.hu>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PHPUnit\Framework;

if (!class_exists('PHPUnit\Framework\Assert')) {
    abstract class Assert extends \PHPUnit_Framework_Assert
    {
    }
}

namespace Antalaron\RegexValidator\Tests;

use Symfony\Component\Validator\Test\ConstraintValidatorTestCase;
use Symfony\Component\Validator\Tests\Constraints\AbstractConstraintValidatorTest as BaseAbstractConstraintValidatorTest;

if (class_exists(ConstraintValidatorTestCase::class)) {
    abstract class AbstractConstraintValidatorTest extends ConstraintValidatorTestCase
    {
    }
} else {
    abstract class AbstractConstraintValidatorTest extends BaseAbstractConstraintValidatorTest
    {
    }
}
