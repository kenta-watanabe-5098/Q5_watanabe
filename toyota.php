<?php
class Toyota extends Car {
    public function __construct() {
        $this->maker = "Toyota";
        $this->capacity = 5;
        $this->price = 0;
        $this->speed = 150;
        $this->accelationFactor = 0.4;
        $this->brakingFriction = 0.4;
    }

    public function addOption($price) {
        $this->pirce = $price;

        if($price > 0 && $price < 15000000) {
            $this->speed += $price * 0.0001;
        } else {
            $this->speed = 300;
        }
    }
}
?>