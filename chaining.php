<?php

$car = new Car("yellow");
echo $car->addColor('red')->addColor('blue')->getColor();
echo "<br>";
// echo $car->addColor('blue');

class Car
{
    protected $color;

    public function __construct($color)
    {
        $this->color = $color;
    }
    function getColor()
    {
        return $this->color;
    }
    function addColor($color)
    {
        $this->color=$this->color."+".$color;
        return $this;
    }
}
