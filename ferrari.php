<?php
class Ferrari extends Car {
    public function __construct() {
        $this->maker = "Ferrari";
        $this->price = 7000000;
        $this->capacity = 3;
        $this->speed = 300;
        $this->accelationFactor = 0.2;
        $this->brakingFriction = 0.2;
    }
}

?>