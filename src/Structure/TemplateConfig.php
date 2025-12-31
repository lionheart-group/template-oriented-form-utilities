<?php

namespace TofuPlugin\Structure;

/**
 * Template configuration class.
 *
 * @package TofuPlugin\Structure
 */
class TemplateConfig
{
    /** @var string Input page path. */
    public $inputPath;

    /** @var string Result page path. */
    public $resultPath;

    /** @var string|null Confirm page path. */
    public $confirmPath;

    /** @var string|null Error page path. */
    public $errorPath;

    /**
     * @param string $inputPath Input page path.
     * @param string $resultPath Result page path.
     * @param string|null $confirmPath Confirm page path.
     * @param string|null $errorPath Error page path.
     */
    public function __construct(
        string $inputPath,
        string $resultPath,
        ?string $confirmPath = null,
        ?string $errorPath = null
    ) {
        $this->inputPath = $inputPath;
        $this->resultPath = $resultPath;
        $this->confirmPath = $confirmPath;
        $this->errorPath = $errorPath;
    }
}
