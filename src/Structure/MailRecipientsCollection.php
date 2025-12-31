<?php

namespace TofuPlugin\Structure;

class MailRecipientsCollection
{
    /** @var MailRecipientsConfig[] */
    public $recipients;

    /**
     * @param MailRecipientsConfig[] $recipients
     */
    public function __construct(array $recipients)
    {
        foreach ($recipients as $recipient) {
            if (!$recipient instanceof MailRecipientsConfig) {
                throw new \InvalidArgumentException('Invalid recipient configuration');
            }
        }
        $this->recipients = $recipients;
    }
}
