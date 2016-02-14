<?php

namespace GrumPHP\Linter\Twig;

/**
 * Class GrumEnvironment
 *
 * @package GrumPHP\Linter\Twig
 */
class GrumEnvironment extends \Twig_Environment
{
    /**
     * {@inheritDoc}
     */
    public function getFilter($name)
    {
        return new \Twig_SimpleFilter('stub', function () {});
    }

    /**
     * {@inheritDoc}
     */
    public function getFunction($name)
    {
        return new \Twig_SimpleFunction('stub', function () {});
    }

    /**
     * {@inheritDoc}
     */
    public function getTest($name)
    {
        return new \Twig_SimpleTest('stub', function () {});
    }
}
