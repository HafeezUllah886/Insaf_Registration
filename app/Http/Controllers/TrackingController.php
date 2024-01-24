<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\registration;
use App\Models\tracking;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function forwarding(request $req){

        $check = tracking::where('appID', $req->id)->orderBy('id', "desc")->first();
        if($check->to == $req->user){
            return back()->with('error', "Aleardy forwarded to the same user");
        }
        tracking::create(
            [
                'appID' => $req->id,
                'from' => auth()->user()->id,
                'to' => $req->user,
                'notes' => $req->notes,
                'date' => now(),
            ]
        );
        $app = registration::find($req->id);
        $app->assigned = $req->user;
        $app->save();

        return back()->with('msg', "Application forwarded successfully");
    }
    public function finalize(request $req){


        tracking::create(
            [
                'appID' => $req->id,
                'from' => auth()->user()->id,
                'to' => 1,
                'Notes' => $req->notes,
                'date' => now(),
            ]
        );
        $app = registration::find($req->id);
        $app->isFinal = "yes";
        $app->assigned = 1;
        $app->save();

        return redirect('/dashboard')->with("msg", "Application Finalized");
    }

    public function suspend(request $req)
    {
        $app = registration::find($req->id);
        $app->status = "Suspended";
        $app->save();

        return redirect('/dashboard')->with("msg", "Application Suspended");
    }
}
