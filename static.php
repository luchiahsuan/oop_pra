<?php

echo Car::$type;
echo Car::speed();
Car::$type="賓士";
echo Car::$type;


$carA=car::$type;
echo$carA;
$carA="賓士";
echo$carA;
$carB=car::$type;
echo$carB;


class Car{
public static $type='裕隆';
public static function speed(){
    return 60;
}

}


?>