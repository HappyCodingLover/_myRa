<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function get_user() {
        $user = DB::connection('fortuna_conn')->table('students')->where('name', '@UnuaLibro')->first();
        $userID = $user->userid;
        $leagueData = DB::connection('fortuna_conn')->table('students')->where('name', '@UnuaLibro')->groupBy('language')->get();
        $messageData = DB::connection('fortuna_conn')->table('messages')->where('userid', $userID)->orderBy('messages', 'desc')->get();
        // foreach ($leagueData as $key=>$league) {

        // }
        // DB::connection('mysql');
        return response()->json(['userData' => $user, 'leagueData' => $leagueData, 'messageData' =>  $messageData]);
    }
}
