<?php
/**
 * Created by PhpStorm.
 * User: pbameier
 * Date: 20.01.14
 * Time: 11:48
 */

class Tx_PhzHresregistration_ViewHelpers_SecondsToTimeViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {

    /**
     * @param integer $seconds
     * @return string
     */
    public function render($seconds)
    {
        $hours = $this->getHours($seconds);
        $minutes = $this->getRemainingMinutes($seconds, $hours);
        return str_pad($hours, 2, '0', STR_PAD_LEFT) . ':' . str_pad($minutes, 2, '0', STR_PAD_LEFT);
    }


    /**
     * this method rounds down (integer) the contained hours in $time
     *
     * @param integer $time
     * @return float
     */
    protected function getHours($time) {
        return floor((int) $time / 3600);
    }


    /**
     * Extracts the minutes from $time
     * Example:
     * 33.300 Seconds / 3.600 = 9,25 hours
     * 9 * 3.600 = 32.400
     * 33.300 - 32.400 = 900 seconds remaining
     * 900 / 60 = 15 minutes
     *
     * @param integer $time seconds since midnight
     * @param integer $hours
     * @return integer remaining minutes
     */
    protected function getRemainingMinutes($time, $hours) {
        $seconds = $time % ($hours * 3600);
        if ($seconds) {
            $minutes = ceil($seconds / 60);
        } else $minutes = 0;
        return $minutes;
    }

} 