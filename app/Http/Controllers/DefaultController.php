<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Carbon\CarbonInterval;
use Illuminate\Support\Facades\Auth;


class DefaultController extends Controller
{
    public function index()
    {
//        $user = User::where('id',Auth::user()->id)->first();
//        $created_date = Carbon::parse($user->created_at);
////        $expire_dt  = $created_date->addDays(90)->toDayDateTimeString();
////        return $expire_dt;
        $date = CarbonImmutable::now();
        echo $date->calendar();                                      // Today at 11:08 PM
        echo "\n";
        echo $date->sub('1 day 3 hours')->calendar();                // Yesterday at 8:08 PM
        echo "\n";
        echo $date->sub('3 days 10 hours 23 minutes')->calendar();   // Last Wednesday at 12:45 PM
        echo "\n";
        echo $date->sub('8 days')->calendar();                       // 12/11/2020
        echo "\n";
        echo $date->add('1 day 3 hours')->calendar();                // Monday at 2:08 AM
        echo "\n";
        echo $date->add('3 days 10 hours 23 minutes')->calendar();   // Wednesday at 9:31 AM
        echo "\n";
        echo $date->add('8 days')->calendar();                       // 12/27/2020
        echo "\n";
        echo $date->locale('fr')->calendar();                        // Aujourd’hui à 23:08

     }
}
