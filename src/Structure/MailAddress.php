<?php

namespace TofuPlugin\Structure;

use GUMP;

class MailAddress
{
    /** @var string */
    public $email;

    /** @var string */
    public $name;

    /**
     * @param string $email
     * @param string $name
     */
    public function __construct(string $email, string $name = '')
    {
        $this->email = $email;
        $this->name = $name;

        // Validate the email addresses.
        if (
            GUMP::is_valid(
                ['email' => $email],
                ['email' => 'required|valid_email']
            ) !== true
        ) {
            throw new \InvalidArgumentException('Invalid email address.');
        }
    }

    public function __toString(): string
    {
        if ($this->name !== '') {
            return sprintf('%s <%s>', $this->name, $this->email);
        }
        return $this->email;
    }
}
