<?php

/*
 * (c) Antal Áron <antalaron@antalaron.hu>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Antalaron\RegexValidator;

use Symfony\Component\Validator\Constraint;

/**
 * Validates a regular expression.
 *
 * @Annotation
 * @Target({"PROPERTY", "METHOD", "ANNOTATION"})
 *
 * @author Antal Áron <antalaron@antalaron.hu>
 */
class Regex extends Constraint
{
    const INTERNAL_ERROR = '272fcfbe-0b7a-4189-94af-e737ebbb023f';
    const BACKTRACK_LIMIT_ERROR = '7607aa8b-8adf-4946-895a-dee1540938d6';
    const RECURSION_LIMIT_ERROR = 'ebb05dfb-f797-4329-bc22-a0a787187a0c';
    const BAD_UTF8_ERROR = '9fc7f69e-7e59-4f39-b58e-ddcb0b507d5c';
    const BAD_UTF8_OFFSET_ERROR = '517727f0-8422-45a6-911c-8ff7794a3255';
    const JIT_STACKLIMIT_ERROR = '2b4859eb-7feb-4672-9e2a-a09c99b0785f'; // >= PHP 7.0
    const OTHER_ERROR = '026d3188-5252-42ad-98c0-b053fa97cf6f';

    const MESSAGE = 'Invalid regular expression.';

    protected static $errorNames = [
        self::INTERNAL_ERROR => 'INTERNAL_ERROR',
        self::BACKTRACK_LIMIT_ERROR => 'BACKTRACK_LIMIT_ERROR',
        self::RECURSION_LIMIT_ERROR => 'RECURSION_LIMIT_ERROR',
        self::BAD_UTF8_ERROR => 'BAD_UTF8_ERROR',
        self::BAD_UTF8_OFFSET_ERROR => 'BAD_UTF8_OFFSET_ERROR',
        self::JIT_STACKLIMIT_ERROR => 'JIT_STACKLIMIT_ERROR',
        self::OTHER_ERROR => 'OTHER_ERROR',
    ];

    public $message = self::MESSAGE;
}
