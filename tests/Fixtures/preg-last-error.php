<?php

/*
 * (c) Antal Áron <antalaron@antalaron.hu>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Antalaron\RegexValidator;

final class ValidatorMock
{
    public static $pregLastErrorMock = true;
    public static $pregLastError = \PREG_NO_ERROR;

    private function __construct()
    {
    }
}

function preg_last_error()
{
    if (false === ValidatorMock::$pregLastErrorMock) {
        return \preg_last_error();
    }

    return ValidatorMock::$pregLastError;
}
