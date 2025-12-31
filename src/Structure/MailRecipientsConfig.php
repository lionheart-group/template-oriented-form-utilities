<?php

namespace TofuPlugin\Structure;

use TofuPlugin\Helpers\Validate;

/**
 * Mail Template configuration class.
 *
 * @package TofuPlugin\Structure
 */
class MailRecipientsConfig
{
    /** @var string Recipient email address. */
    public $recipientEmail;

    /** @var string|null Recipient cc email address. */
    public $recipientCcEmail;

    /** @var string|null Recipient bcc email address. */
    public $recipientBccEmail;

    /** @var string|null Recipient email subject. */
    public $subject;

    /** @var string|null Recipient email subject template. */
    public $subjectPath;

    /** @var string|null Recipient email body. */
    public $mailBody;

    /** @var string|null Recipient email body template. */
    public $mailBodyPath;

    /**
     * @param string $recipientEmail Recipient email address.
     * @param string|null $recipientCcEmail Recipient cc email address.
     * @param string|null $recipientBccEmail Recipient bcc email address.
     * @param string|null $subject Recipient email subject.
     * @param string|null $subjectPath Recipient email subject template.
     * @param string|null $mailBody Recipient email body.
     * @param string|null $mailBodyPath Recipient email body template.
     */
    public function __construct(
        string $recipientEmail,
        ?string $recipientCcEmail = null,
        ?string $recipientBccEmail = null,
        ?string $subject = null,
        ?string $subjectPath = null,
        ?string $mailBody = null,
        ?string $mailBodyPath = null
    ) {
        $this->recipientEmail = $recipientEmail;
        $this->recipientCcEmail = $recipientCcEmail;
        $this->recipientBccEmail = $recipientBccEmail;
        $this->subject = $subject;
        $this->subjectPath = $subjectPath;
        $this->mailBody = $mailBody;
        $this->mailBodyPath = $mailBodyPath;

        /**
         * Ensure that either subject or subjectPath is set.
         */
        if ($this->subject === null && $this->subjectPath === null) {
            throw new \InvalidArgumentException('Either subject or subjectPath must be set.');
        }

        /**
         * Ensure that either mailBody or mailBodyPath is set.
         */
        if ($this->mailBody === null && $this->mailBodyPath === null) {
            throw new \InvalidArgumentException('Either mailBody or mailBodyPath must be set.');
        }
    }
}
