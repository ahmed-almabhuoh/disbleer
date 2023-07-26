<?php

// app/helpers.php

if (!function_exists('disableCredits')) {
    function disableCredits()
    {
        if (auth('disable')->check()) {
            $credits = auth()->user()->credits;
            $creditsSummation = null;

            foreach ($credits as $credit) {
                if ($credit->status == 'active')
                    $creditsSummation += $credit->credits;
            }
            return $creditsSummation;
        } else {
            return null;
        }
    }
}

if (!function_exists('getPercent')) {
    function getPercent($number)
    {
        return $number * 0.05;
    }
}
