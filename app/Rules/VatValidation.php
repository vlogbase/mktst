<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class VatValidation implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

        $pattern = '/^(GB)?([0-9]{9}([0-9]{3})?|[A-Z]{2}[0-9]{3})$/';

        if (preg_match($pattern, $value)) {
            return true;
        } else {
            return false;
        }

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The Vat is not validated.';
    }
}
