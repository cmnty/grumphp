<?php

namespace GrumPHP\Linter\Twig;

use GrumPHP\Linter\LintError;

/**
 * Class TwigLintError
 *
 * @package GrumPHP\Linter\Twig
 */
class TwigLintError extends LintError
{
    /**
     * @param \Twig_Error $exception
     *
     * @return TwigLintError
     */
    public static function fromParseException(\Twig_Error $exception)
    {
        return new TwigLintError(
            LintError::TYPE_ERROR,
            $exception->getMessage(),
            $exception->getFile(),
            $exception->getLine(),
            $exception->getCode()
        );
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf('[%s] %s', strtoupper($this->getType()), $this->getError());
    }
}
