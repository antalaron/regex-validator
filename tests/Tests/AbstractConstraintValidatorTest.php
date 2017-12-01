<?php

/*
 * (c) Antal Áron <antalaron@antalaron.hu>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PHPUnit\Framework;

if (!class_exists('PHPUnit\Framework\Assert')) {
    class_alias('PHPUnit_Framework_Assert', 'PHPUnit\Framework\Assert');
}

if (class_exists('Symfony\Component\Validator\Test\ConstraintValidatorTestCase')) {
    class_alias('Symfony\Component\Validator\Test\ConstraintValidatorTestCase', 'Antalaron\RegexValidator\Tests\AbstractConstraintValidatorTest');
} else {
    class_alias('Symfony\Component\Validator\Tests\Constraints\AbstractConstraintValidatorTest', 'Antalaron\RegexValidator\Tests\AbstractConstraintValidatorTest');
}
