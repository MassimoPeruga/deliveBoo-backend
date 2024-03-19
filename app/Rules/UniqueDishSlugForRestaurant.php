<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UniqueDishSlugForRestaurant implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    private $ignoreSlug;

    public function __construct($ignoreSlug = null)
    {
        $this->ignoreSlug  = $ignoreSlug;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $restaurantId = auth()->user()->restaurant->id;
        $slug = Str::of($value)->slug('-');

        if (isset($this->ignoreSlug)) {
            $query = DB::table('dishes')->where('slug', $slug)->where('restaurant_id', $restaurantId)->where('slug', '!=', $this->ignoreSlug);
        } else {
            $query = DB::table('dishes')->where('slug', $slug)->where('restaurant_id', $restaurantId);
        }

        if ($query->exists()) {
            $fail('Il nome inserito non è disponibile.');
        }
    }
}
