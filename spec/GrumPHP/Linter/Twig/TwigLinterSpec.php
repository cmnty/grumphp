<?php

namespace spec\GrumPHP\Linter\Twig;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TwigLinterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('GrumPHP\Linter\Twig\TwigLinter');
    }

    function it_is_a_linter()
    {
        $this->shouldImplement('GrumPHP\Linter\LinterInterface');
    }
}
