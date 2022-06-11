<?php

class TimeCounter
/**
 * $timeStart stored start time stamp (s)
 * $timeFinish stored finish time stamp (s)
 * $duration stored duration of operation (s)
 */
{
    public function start()
    {
        $this->timeStart = microtime(true);
        return $this->timeStart;
    }

    public function finish()
    {
        $this->timeFinish = microtime(true);
        return $this->timeFinish;
    }

    public function getDuration()
    {
        $this->duration = $this->timeFinish - $this->timeStart;
        return $this->duration;
    }

}