<?php

$cat = new Animal;

$dog = new Animal;

echo $cat->type;
echo "<br>";
echo $dog->type;
echo "<br>";
echo $cat->name;
echo "<br>";
echo $dog->hair_color;
echo "<br>";
echo "<pre>";
var_dump($cat);
echo "</pre>";


class Animal
{
    public $type = 'animal';
    public $name = 'John';
    public $hair_color = "brown";

    public function __construct()
    {
    }
    public function run()
    {
        echo "我會跑喔!";
    }
    private function speed()
    {
        echo "我會叫喔!";
    }
}
