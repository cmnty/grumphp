<?php

namespace spec\GrumPHP\Linter\Twig;

use GrumPHP\Linter\LintError;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TwigLintErrorSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(LintError::TYPE_ERROR, 'Full Twig Parser Exception', 'file.txt', 1);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('GrumPHP\Linter\Twig\TwigLintError');
    }

    function it_is_a_lint_error()
    {
        $this->shouldHaveType('GrumPHP\Linter\LintError');
    }

    function it_can_be_parsed_as_string()
    {
        $this->__toString()->shouldBe('[ERROR] Full Twig Parser Exception');
    }
}
