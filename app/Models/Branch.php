<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "name", "address", "area", "map_link", "contact_person_id", "contact_number", "close_days", "open_time", "status"
    ];

    public function contact()
    {
        return $this->belongsTo(User::class, 'contact_person_id', 'id');
    }

    public function books()
    {
    	return $this->hasMany(Book::class, 'hub_id', 'id');
    }

    public static function array_in_string($items)
    {
        $array = '';
        foreach ($items as $item) {
            $array .= $item.',';
        }
        return $array;
    }

    public function is_open($text = false){
        $query_time = now();
        $time = explode('-', $this->open_time);

        $open = new DateTime($time[0]);
        $close = new DateTime($time[1]);
        $is_open = false;

        $close_days = explode(',', $this->close_days);
        
        if(in_array(date('D'), $close_days)){

            return 'Close';
        }


        //Determine if open time is before close time in a 24 hour period
        if($open < $close){
            //If so, if the query time is between open and closed, it is open
            if($query_time > $open){
                if($query_time < $close){
                    $is_open = true;
                }
            }
        }
        elseif($open > $close){
            $is_open = true;
            //If not, if the query time is between close and open, it is closed
            if($query_time < $open){
                if($query_time > $close){
                    $is_open = false;
                }
            }
        }

        if($text == true){
        }
        return ($is_open == true ? 'Open' : 'Close');
    }

    public function show_time()
    {
        $time = explode('-', $this->open_time);

        $open = new DateTime($time[0]);
        $close = new DateTime($time[1]);

        return $open->format('h:i A').' - '.$close->format('h:i A');
    }


    public function show_week()
    {
        $off_days = array_filter(explode(',', $this->close_days));
        $wd = ['Sat', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri'];
        $result = '';

        foreach ($off_days as $o) {           
            if (($key = array_search($o, $wd)) != false) {
                unset($wd[$key]);
            }
        }
        foreach ($wd as $day) {
            $result .= $day.' ';
        }
        return $result;
    }

}
