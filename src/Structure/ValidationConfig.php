<?php

namespace TofuPlugin\Structure;

use Closure;
use TofuPlugin\Models\FieldValueCollection;
use TofuPlugin\Models\ValidationErrorCollection;

/**
 * Template configuration class.
 *
 * ```php
 * new ValidationConfig(
 *     [
 *         'name' => 'required|max_len:200',
 *         'email' => 'required|valid_email',
 *     ],
 *     [
 *         'name' => 'trim|sanitize_string',
 *         'email' => 'trim|sanitize_email',
 *     ],
 *     [
 *         'name' => 'Full Name',
 *         'email' => 'Email Address',
 *     ],
 *     [
 *         'name' => [
 *             'required' => 'The name field is required.',
 *             'max_len' => 'The name must be maximum 200 characters.',
 *         ],
 *         'email' => [
 *             'required' => 'The email field is required.',
 *             'valid_email' => 'The email must be a valid email address.',
 *         ],
 *     ],
 *     function ($values, $errors) {
 *         // Get the value of the 'name' field
 *         $value = $values->getValue('name');
 *
 *         // Set the value of the 'foo' field
 *         $values->addValue('foo', 'value');
 *
 *         // Add a custom error message
 *         $errors->addError('name', 'This is a custom error message.');
 *     }
 * );
 * ```
 *
 * @package TofuPlugin\Structure
 */
class ValidationConfig
{
    /** @var array<string, string> Validation rules. */
    public $rules;

    /** @var array<string, string> Filtering rules. */
    public $filters;

    /** @var array<string, string> Field names for error messages. */
    public $names;

    /** @var array<string, array<string, string>> Validation messages. */
    public $messages;

    /** @var Closure|null Custom after hook. */
    public $after;

    /**
     * @param array<string, string> $rules Validation rules.
     * @param array<string, string> $filters Filtering rules.
     * @param array<string, string> $names Field names for error messages.
     * @param array<string, array<string, string>> $messages Validation messages.
     * @param Closure|null $after Custom after hook.
     */
    public function __construct(
        array $rules,
        array $filters,
        array $names,
        array $messages = [],
        ?Closure $after = null
    ) {
        $this->rules = $rules;
        $this->filters = $filters;
        $this->names = $names;
        $this->messages = $messages;
        $this->after = $after;
    }
}
