<?php

namespace TofuPlugin\Structure;

/**
 * Mail configuration class.
 *
 * @package TofuPlugin\Structure
 */
class MailConfig
{
    /** @var string From email address. */
    public $fromEmail;

    /** @var string From name. */
    public $fromName;

    /** @var MailRecipientsCollection Email recipient collection. */
    public $recipients;

    /**
     * @param string $fromEmail From email address.
     * @param string $fromName From name.
     * @param MailRecipientsCollection $recipients Email recipient collection.
     */
    public function __construct(
        string $fromEmail,
        string $fromName,
        MailRecipientsCollection $recipients
    ) {
        $this->fromEmail = $fromEmail;
        $this->fromName = $fromName;
        $this->recipients = $recipients;
    }
}
