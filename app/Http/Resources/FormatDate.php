<?php

namespace App\Http\Resources;

use Carbon\Carbon;

trait FormatDate
{
    protected $dateFormat = "YYYY-MM-DD";
    protected $timeFormat = "H:m:s";

    protected function setDateFormat(string $format){
        $this->dateFormat = $format;
    }

    protected function setTimeFormat(string $format){
        $this->timeFormat = $format;
    }

    protected function formatDateOnly($date)
    {
        return $date == null ? null : Carbon::parse($date)->isoFormat($this->dateFormat);
    }

    protected function formatDateTime($dateTime){
        return $dateTime == null ? : Carbon::parse($dateTime)->isoFormat($this->dateFormat.' '.$this->timeFormat);
    }
}
