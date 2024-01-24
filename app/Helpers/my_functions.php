<?php

use App\Models\accounts;

use App\Models\ref;
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
