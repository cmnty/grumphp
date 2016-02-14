<?php

namespace GrumPHP\Linter\Twig;

use GrumPHP\Collection\LintErrorsCollection;
use GrumPHP\Linter\LinterInterface;
use SplFileInfo;

/**
 * Class TwigLinter
 *
 * @package GrumPHP\Linter\Twig
 */
class TwigLinter implements LinterInterface
{
    /**
     * @param SplFileInfo $file
     *
     * @return LintErrorsCollection
     */
    public function lint(SplFileInfo $file)
    {
        $errors = new LintErrorsCollection();

        $template = file_get_contents($file);

        try {
            $loader = new \Twig_Loader_Filesystem($file->getPath());
            $twig = new GrumEnvironment($loader);
            $twig->parse($twig->tokenize($template, $file ? (string)$file : null));
        } catch (\Twig_Error $exception) {
            $errors[] = TwigLintError::fromParseException($exception);
        }

        return $errors;
    }

    /**
     * @return bool
     */
    public function isInstalled()
    {
        return class_exists('\Twig_environment');
    }
}
