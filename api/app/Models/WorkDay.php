<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkDay extends Model
{
    use HasFactory;

    protected $fillable = [
        'week_day',
        'end',
        'start',
        'user_id'
    ];
    public static function getAvaliableDays($user_id){
        $employee = User::find($user_id)->employee()->first();
        $workDays = $employee->workdays()->get();
        // dd($workDays);

        $AvaliableDays = [];
        foreach ($workDays as $workDay){
            // dd($workDay->week_day);
            $day ='';
            switch($workDay->week_day){
                case 0:
                    $day = strtotime('next Sunday');
                    break;
                case 1:
                    $day = strtotime('next Monday');
                    break;
                case 2:
                    $day = strtotime('next Tuesday');
                    break;
                case 3:
                    $day = strtotime('next Wednesday');
                    break;
                case 4:
                    $day = strtotime('next Thursday');
                    break;
                case 5:
                    $day = strtotime('next Friday');
                    break;
                case 6:
                    $day = strtotime('next Saturday');
                    break;
            }
            $AvaliableHours = [];
            $currentHour = strtotime($workDay->start);
            

            while ( $currentHour < strtotime($workDay->end)){
                $AvaliableHours[] = $time = date('H:i', $currentHour);
                $currentHour = strtotime('+1 hour', $currentHour);
            }

            $AvaliableDays[date('Y-m-d', $day)] = $AvaliableHours;

        }
        return $AvaliableDays;
        
    }

    public static function getAvaliableDaysApi($user_id){
        $employee = User::find($user_id)->employee()->first();
        $workDays = $employee->workdays()->get();
        // dd($workDays);

        $AvaliableDays = [];
        foreach ($workDays as $workDay){
            // dd($workDay->week_day);
            $day ='';
            switch($workDay->week_day){
                case 0:
                    $day = strtotime('next Sunday');
                    break;
                case 1:
                    $day = strtotime('next Monday');
                    break;
                case 2:
                    $day = strtotime('next Tuesday');
                    break;
                case 3:
                    $day = strtotime('next Wednesday');
                    break;
                case 4:
                    $day = strtotime('next Thursday');
                    break;
                case 5:
                    $day = strtotime('next Friday');
                    break;
                case 6:
                    $day = strtotime('next Saturday');
                    break;
            }
            $AvaliableHours = [];
            $currentHour = strtotime($workDay->start);
            

            while ( $currentHour < strtotime($workDay->end)){
                $AvaliableHours[] = $time = date('H:i', $currentHour);
                $currentHour = strtotime('+1 hour', $currentHour);
            }

            
            $AvaliableDays[] = [
                                    "hours" => $AvaliableHours,
                                    "date" => date('d-m-Y', $day)
                                ] ;

        }
        return $AvaliableDays;
        
    }
}
