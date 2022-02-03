<?php

/*
 * (c) Antal Áron <antalaron@antalaron.hu>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Antalaron\RegexValidator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Validates a regular expression.
 *
 * @author Antal Áron <antalaron@antalaron.hu>
 */
final class RegexValidator extends ConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        if (null === $value) {
            return;
        }

        if (false !== @preg_match($value, null)) {
            return;
        }

        $pregError = preg_last_error();

        switch ($pregError) {
            case \PREG_INTERNAL_ERROR:
                $code = Regex::INTERNAL_ERROR;
                break;
            case \PREG_BACKTRACK_LIMIT_ERROR:
                $code = Regex::BACKTRACK_LIMIT_ERROR;
                break;
            case \PREG_RECURSION_LIMIT_ERROR:
                $code = Regex::RECURSION_LIMIT_ERROR;
                break;
            case \PREG_BAD_UTF8_ERROR:
                $code = Regex::BAD_UTF8_ERROR;
                break;
            case \PREG_BAD_UTF8_OFFSET_ERROR:
                $code = Regex::BAD_UTF8_OFFSET_ERROR;
                break;
            case \PREG_JIT_STACKLIMIT_ERROR:
                $code = Regex::JIT_STACKLIMIT_ERROR;
                break;
            default:
                $code = Regex::OTHER_ERROR;
        }

        $this->context->buildViolation($constraint->message)
            ->setCode($code)
            ->addViolation();
    }
}
