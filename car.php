<?php
class Car {
    var $maker = null;
    var $price = 0;
    var $capacity = 0;
    var $speed = 0;
    var $accele = 0;
    var $brakeTimes = 0;
    var $accelationFactor = 0;
    var $brakingFriction = 0;

    var $distanceToMaxSpeed = 0;
    var $TimeToMaxSpeed = 0;
    var $distanceToStop = 0;
    var $TimeToStop = 0;

    public function increasePassenger($capacity) {
        if($capacity <= $this->capacity) {
            for($i=1; $i<=$capacity; $i++) {
                $this->speed *= 0.95;
                $this->speed = floor($this->speed);
            }
        } else {
            return 'キャパオーバー';
        }

        return $this->speed . 'km/h';
    }

    public function accele() {
        $accelationFactor = $this->accelationFactor;

        $this->distanceToMaxSpeed = ($this->speed * 1000 / 60 / 60) * ($this->speed * 1000 / 60 / 60) / (2 * $accelationFactor * 9.8);
        $this->TimeToMaxSpeed = 2 * ($this->distanceToMaxSpeed) / ($this->speed * 1000 / 60 / 60); 
    }

    public function brake() {
        $brakingFriction = $this->brakingFriction;

        $this->distanceToStop = ($this->speed * 1000 / 60 / 60) * ($this->speed * 1000 /60 / 60) / (2 * $brakingFriction * 9.8);
        $this->TimeToStop = 2 * ($this->distanceToStop) / $this->speed;
    }

    public function brakeRate() {
        $this->brakeTimes = rand(100,1000);
    }

    public function convertToHoursMins($time, $format = '%d時間%d分') {
        if ($time < 1) {
            return;
        }
        $hours = floor($time / 60);
        $minutes = ($time % 60);
        return sprintf($format, $hours, $minutes);
    }
}

?>