<?php

namespace App\Rules;

use App\Models\Student;
use Illuminate\Contracts\Validation\Rule;

class PostojiStudent implements Rule {
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value) {
        $student = Student::find($value);
        return $student != null;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message() {
        return 'Ne postoji student!';
    }
}
