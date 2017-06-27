<?php

namespace App\Lib;

/*
 * This is used to produce the needed data 
 */

use App\UsersInfo;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class ApiProducer {

    public function __construct() {
        
    }

    /**
     * validate the API authentication
     * @param type $apikey
     * @return boolean
     */
    Static function requestToken($apikey) {

        $id = $apikey;
        //check whether token exist or not 
        $key = \Config::get('constants.api_key');
        if ($id == $key) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * getting weekly data from DB
     * @param none
     * @return Object array
     */
    static function getWeeklyData() {
        $records = \App\UsersInfo::orderBy(DB::raw("WEEK(  `created_at` ) "))
                        ->select(DB::raw("
    SUM(onboarding_perentage) / COUNT(  'user_id' )AS avg_perecentage"
                                ), DB::raw("COUNT( user_id)AS usercount"), DB::raw("WEEK(  `created_at` )AS week ")
                        )->groupBy(DB::raw("WEEK(  `created_at` ) "))->groupBy("onboarding_perentage")->get();

        return $records;
    }

    /**
     * arranging weekly data for graph 
     * @param none
     * @return Object array
     */
    static function getWeeklygraphData() {
        $arr = self::getWeeklyData();
        $output = [];
        $rslt = array();
        $week = '';

        $i = 0;
        foreach ($arr as $val) {

            if ($week != '' && $week < $val['week']) {
                $week = $val['week'];
                $output[$i]['name'] = "Week" . ($i + 1);
                $output[$i]['data'] = $week_array;
                $week_array = array();
                $i++;
            }

            if ($val['week'] != "" && $week == $val['week']) {
                $week_array[] = [$val['avg_perecentage'], $val['usercount']];
                ;
            } else {
                $week = $val['week'];
                $week_array[] = [$val['avg_perecentage'], $val['usercount']];
                ;
            }
        }
        return $output;
    }

}
