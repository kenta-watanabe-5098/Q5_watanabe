<?php
class Honda extends Car {
    public function __construct() {
        $this->maker = "Honda";
        $this->price = 2500000;
        $this->capacity = 6;
        $this->speed = 200;
        $this->accelationFactor = 0.3;
        $this->brakingFriction = 0.2;
    }
}
?>