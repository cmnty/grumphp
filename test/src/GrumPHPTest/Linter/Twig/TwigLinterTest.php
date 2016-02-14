<?php

namespace GrumPHP\Linter\Twig;

use SplFileInfo;

/**
 * Class TwigLinterTest
 *
 * @package GrumPHP\Linter\Twig
 */
class TwigLinterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var TwigLinter
     */
    protected $linter;

    protected function setUp()
    {
        $this->linter = new TwigLinter();
    }

    /**
     * @param string $fixture
     *
     * @return SplFileInfo
     */
    private function getFixture($fixture)
    {
        $file = new SplFileInfo(TEST_BASE_PATH . '/fixtures/linters/twig/' . $fixture);
        if (!$file->isReadable()) {
            throw new \RuntimeException(sprintf('The fixture %s could not be loaded!', $fixture));
        }

        return $file;
    }
    /**
     * @param string $fixture
     * @param int $errors
     */
    private function validateFixture($fixture, $errors)
    {
        $result = $this->linter->lint($this->getFixture($fixture));
        $this->assertInstanceOf('GrumPHP\Collection\LintErrorsCollection', $result);
        $this->assertEquals($result->count(), $errors, 'Invalid error-count expected.');
        if ($result->count()) {
            $this->assertInstanceOf('GrumPHP\Linter\twig\TwigLintError', $result[0]);
        }
    }

    /**
     * @test
     * @dataProvider provideTwigValidation
     */
    function it_should_validate_twig_for_syntax_errors($fixture, $errors)
    {
        $this->validateFixture($fixture, $errors);
    }

    /**
     * @return array
     */
    function provideTwigValidation()
    {
        return array(
            array('fixture' => 'valid.html.twig', 'errors' => 0),
            array('fixture' => 'invalid.html.twig', 'errors' => 1),
            array('fixture' => 'invalid-operator.html.twig', 'errors' => 1),
            array('fixture' => 'invalid-statement.html.twig', 'errors' => 1),
        );
    }
}
