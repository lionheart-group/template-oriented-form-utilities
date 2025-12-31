<?php

namespace TofuPlugin\Structure;

/**
 * Form configuration class.
 *
 * This class is used to define the configuration for a form.
 *
 * @package TofuPlugin\Structure
 */
class FormConfig
{
    /** @var string Key for the form item. */
    public $key;

    /** @var string Form name. */
    public $name;

    /** @var TemplateConfig Template setting. */
    public $template;

    /** @var MailConfig Mail setting. */
    public $mail;

    /** @var ValidationConfig Validation setting. */
    public $validation;

    /** @var bool Enabled to save the form data to the database. */
    public $saveToDatabase;

    /** @var ReCAPTCHAConfig|null reCAPTCHA setting. */
    public $recaptcha;

    /**
     * @param string $key Key for the form item.
     * @param string $name Form name.
     * @param TemplateConfig $template Template setting.
     * @param MailConfig $mail Mail setting.
     * @param ValidationConfig $validation Validation setting.
     * @param bool $saveToDatabase Enabled to save the form data to the database.
     * @param ReCAPTCHAConfig|null $recaptcha reCAPTCHA setting.
     */
    public function __construct(
        string $key,
        string $name,
        TemplateConfig $template,
        MailConfig $mail,
        ValidationConfig $validation,
        bool $saveToDatabase = false,
        ?ReCAPTCHAConfig $recaptcha = null
    ) {
        $this->key = $key;
        $this->name = $name;
        $this->template = $template;
        $this->mail = $mail;
        $this->validation = $validation;
        $this->saveToDatabase = $saveToDatabase;
        $this->recaptcha = $recaptcha;
    }
}
