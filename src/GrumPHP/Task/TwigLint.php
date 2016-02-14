<?php

namespace GrumPHP\Task;

use GrumPHP\Exception\RuntimeException;
use GrumPHP\Linter\Twig\TwigLinter;
use GrumPHP\Task\Context\ContextInterface;
use GrumPHP\Task\Context\GitPreCommitContext;
use GrumPHP\Task\Context\RunContext;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class TwigLint
 *
 * @package GrumPHP\Task
 */
class TwigLint extends AbstractLinterTask
{
    /**
     * @var TwigLinter
     */
    protected $linter;

    /**
     * @return string
     */
    public function getName()
    {
        return 'twiglint';
    }

    /**
     * @return OptionsResolver
     */
    public function getConfigurableOptions()
    {
        $resolver = parent::getConfigurableOptions();

        return $resolver;
    }

    /**
     * {@inheritdoc}
     */
    public function canRunInContext(ContextInterface $context)
    {
        return ($context instanceof GitPreCommitContext || $context instanceof RunContext);
    }

    /**
     * {@inheritdoc}
     */
    public function run(ContextInterface $context)
    {
        $files = $context->getFiles()->name('/\.twig$/i');

        if (0 === count($files)) {
            return;
        }

        $lintErrors = $this->lint($files);
        if ($lintErrors->count()) {
            throw new RuntimeException($lintErrors->__toString());
        }
    }
}
