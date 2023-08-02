<?php

namespace Kolyayurev\RussianEmailValidation\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Str;

class RussianEmail implements ValidationRule
{

    protected array $whitelist = [];

    protected array $blacklist = [];

    public function __construct()
    {
        $this->whitelist = config('russian-email-validation.whitelist');
        $this->blacklist = config('russian-email-validation.blacklist');
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!$this->isEmail($value))
            $fail('russian-email-validation::errors.not_email')->translate([
                'attribute' => $attribute,
            ]);

        if(!$this->isRussianEmail($value))
            $fail('russian-email-validation::errors.not_russian_email')->translate([
                'attribute' => $attribute,
            ]);
    }

    /**
     * @param string $value
     * @return bool
     */
    protected function isEmail(string $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }

    /**
     * @param string $value
     * @return bool
     */
    protected function isRussianEmail(string $value): bool
    {
        $domain = Str::after($value, '@');

        foreach ($this->blacklist as $rule)
        {
            if(preg_match($rule,$domain) === 1)
            {
                return false;
            }
        }

        foreach ($this->whitelist as $rule)
        {
            if(preg_match($rule,$domain) === 1)
            {
                return true;
            }
        }

        return false;
    }
}
