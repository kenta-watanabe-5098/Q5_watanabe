<?php
class Car {
    var $maker = null;
    var $price = 0;
    var $capacity = 0;
    var $speed = 0;
    var $accele = 0;
    var $brake = 0;

    public function plusCap($capacity) {
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
        $this->speed *= 1.2;
    }

    public function accelerate() {
        $this->accele = rand(0,10);
    }

    public function brake() {
        $this->speed *= 0.8;
    }

    public function brakeRate() {
        $this->brake = rand(0,10);
    }
}

?>