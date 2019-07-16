<?php
class Toyota extends Car {
    public function __construct() {
        $this->maker = "Toyota";
        $this->capacity = 5;
        $this->price = 0;
        $this->speed = 150;
    }
}
?>