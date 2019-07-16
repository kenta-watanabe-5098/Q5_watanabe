<?php

class Nissan extends \Car {
    public function __construct() {
        $this->maker = "Nissan";
        $this->price = 1500000;
        $this->capacity = 5;
        $this->speed = 160;
    }

    public function defect() {
        $this->maker = "Nissan";
        $this->price = 1500000;
        $this->capacity = 5;
        $this->speed = 160;
        $this->speed *= 0.6;
    }

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
}

?>