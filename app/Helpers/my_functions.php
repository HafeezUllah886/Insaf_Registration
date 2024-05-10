<?php

use App\Models\accounts;

use App\Models\ref;
use App\Models\registration;
use App\Models\settings;

use Carbon\Carbon;


function getRef(){
    $ref = ref::first();
    if($ref){
        $ref->ref = $ref->ref + 1;
    }
    else{
        $ref = new ref();
        $ref->ref = 1;
    }
    $ref->save();
    return $ref->ref;
}


function getSettings(){
    return settings::first();
}


function calculateProfileCompletion($cnic)
{
    // Fetch the user record
    $user = registration::where('cnic', $cnic)->first();

    if (!$user) {
        return "Registration not found";
    }

    // Define fields that contribute to profile completion
    $completionFields = [
        'name',
        'fname',
        'occupation',
        'cnic',
        'gender',
        'dist',
        'dob',
        'lc',
        'hc',
        'sc',
        'since',
        'barReg',
        'phone',
        'email',
        'addr',
        'photo',
        'cnicF',
        'cnicB',
        'bCard',
        'bCardB',
        'licenses',
    ];

    $totalFields = count($completionFields);
    $filledFields = 0;

    // Check how many of the completion fields are filled
    foreach ($completionFields as $field) {
        if (!empty($user->{$field})) {
            $filledFields++;
        }
    }

    // Calculate profile completion percentage
    if ($totalFields > 0) {
        $profileCompletionPercentage = ($filledFields / $totalFields) * 100;
    } else {
        $profileCompletionPercentage = 0;
    }

    return round($profileCompletionPercentage, 2) . "%";
}