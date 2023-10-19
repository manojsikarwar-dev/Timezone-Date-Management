<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Camroncade\Timezone\Facades\Timezone;
use DateTime;
use DateTimeZone;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'start_time'];
    protected $hidden = [];

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setStartTimeAttribute($input)
    {
        if ($input != null && $input != '') {
         
            $originalDatetime = $input;

            $currentTimezone = 'Asia/Kolkata';

            $targetTimezone = auth()->user()->timezone;

            $date = new DateTime($originalDatetime, new DateTimeZone($currentTimezone));

            $date->setTimezone(new DateTimeZone($targetTimezone));
    
            $convertedDateTime = $date->format('Y-m-d H:i:s');

            $this->attributes['start_time'] = $convertedDateTime;

        } else {
            $this->attributes['start_time'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getStartTimeAttribute($input)
    {
        $start_time = date('Y-m-d H:i:s T',strtotime($input));
       
        return $start_time;

    }
}
