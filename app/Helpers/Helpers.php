<?php

namespace App\Helpers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Helpers
{
    public static function getRole()
    {
        $rule = User::where('id', '=', Auth::user()->id)->first();
        if ($rule)
            return $rule->rule;
    }
}
