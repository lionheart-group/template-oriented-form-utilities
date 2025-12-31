<?php

namespace TofuPlugin\Structure;

class ReCAPTCHAConfig
{
    /** @var string Site key for reCAPTCHA. */
    public $siteKey;

    /** @var string Secret key for reCAPTCHA. */
    public $secretKey;

    /** @var float Threshold score for reCAPTCHA v3. */
    public $threshold;

    /**
     * @param string $siteKey Site key for reCAPTCHA.
     * @param string $secretKey Secret key for reCAPTCHA.
     * @param float $threshold Threshold score for reCAPTCHA v3.
     */
    public function __construct(
        string $siteKey,
        string $secretKey,
        float $threshold = 0.5
    ) {
        $this->siteKey = $siteKey;
        $this->secretKey = $secretKey;
        $this->threshold = $threshold;
    }
}
