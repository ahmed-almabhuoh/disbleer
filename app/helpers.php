<?php

// app/helpers.php

if (!function_exists('disableCredits')) {
    function disableCredits()
    {
        if (auth('disable')->check()) {
            $credits = auth()->user()->credits;
            $creditsSummation = null;

            foreach ($credits as $credit) {
                $creditsSummation += $credit->credits;
            }
            return $creditsSummation;
        } else {
            return null;
        }
    }
}
