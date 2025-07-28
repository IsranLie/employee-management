<?php

use Illuminate\Support\Carbon;

if (!function_exists('formatDatetime')) {
    function formatDatetime($date, $format = 'd/m/Y H:i')
    {
        return Carbon::parse($date)->format($format);
    }
}
