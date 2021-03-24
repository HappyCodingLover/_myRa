<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Student;
use App\Models\Message;

class UserController extends Controller
{
    //
    public function get_user() {
        // $database = 'fortuna_conn';
        $database = 'fortuna_conn';

        $telegramID = '@UnuaLibro';
        $number = 5;
        $user = DB::connection('fortuna_conn')->table('students')->where('name', $telegramID)->first();
        // $user = Student::where('name', $telegramID)->first();
        $userID = $user->userid;
        $leagueData = DB::connection('fortuna_conn')->table('students')->where('name', $telegramID)->groupBy('language')->get();
        // $leagueData = Student::where('name', $telegramID)->select("language")->groupBy('language')->get();
        $messageData = DB::connection('fortuna_conn')->table('messages')->where('userid', $userID)->orderBy('messages', 'desc')->get();
        // $messageData = Message::where('userid', $userID)->orderBy('messages', 'desc')->get();
        $languages_count = count($leagueData);
        $fortunas = DB::connection('fortuna_conn')->select("select sum(fortunas) as fortunas from students where language='English' and name='$telegramID'");

        //foreach ($leagueData as $league) {
            // $position = $league->language;
            // // $students = Student::where('language', $request->language)->where('exercise', $request->type)->orderBy('fortunas','desc')->get()->unique('name')->values()->all();
            // $oneLeague = DB::connection('fortuna_conn')->table('students')->where('language', $league->language)->orderBy('fortunas', 'desc')->get();
         //   $language = [];
            $result = DB::connection("fortuna_conn")->select(" select * from (select *, @row_no := @row_no+1 AS row_number from (select sum(fortunas) as val,
            `name` from students where language='English' group by `name` order by  val desc) as tb,(SELECT @row_no := 0) t) as tb1 where name = '$telegramID'")
            ;
            
            // $result = DB::select("select * from (select *, @row_no := @row_no+1 AS row_number from (select sum(fortunas) as val,
            // `name` from students where language='English' group by `name` order by  val desc) as tb,(SELECT @row_no := 0) t) as tb1 where name = '$telegramID'")
            // ;
            $tops = DB::connection('fortuna_conn')->select("select sum(fortunas) as val,`name` from students where language='English' group by `name` order by  val desc limit $number");
            // $tops = DB::select("select sum(fortunas) as val,`name` from students where language='$league->language' group by `name` order by  val desc limit $number");
     //   }
        return response()->json(['userData' => $user, 'leagueData' => $leagueData, 'messageData' =>  $messageData, 'myRank' => $result[0], 'tops' => $tops, 'fortunas' => $fortunas[0]->fortunas]);
    }

    public function get_classes() {
        $telegramID = '@UnuaLibro';
        //$leagueData = Student::where('name', $telegramID)->select("language")->groupBy('language')->get();
        $leagueData = DB::connection('fortuna_conn')->table('students')->where('name', $telegramID)->groupBy('language')->get();
        //$user = Student::where('name', $telegramID)->first();
        $user = DB::connection('fortuna_conn')->table('students')->where('name', $telegramID)->first();
        //$fortunas = DB::select("select sum(fortunas) as fortunas from students where language='English' and name='$telegramID'");
        $fortunas = DB::connection('fortuna_conn')->select("select sum(fortunas) as fortunas from students where language='English' and name='$telegramID'");
        //$messageData = Message::where('userid', $user->userid)->orderBy('messages', 'desc')->get();
        $messageData = DB::connection('fortuna_conn')->table('messages')->where('userid', $userID)->orderBy('messages', 'desc')->get();
        return response()->json(['user' => $user, 'leagueData' => $leagueData, 'fortunas' => $fortunas[0]->fortunas, 'messageData' => $messageData]);
    }
}
