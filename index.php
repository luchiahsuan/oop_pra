<?php



// echo $cat->type;
// echo "<br>";
// echo $dog->type;
// echo "<br>";
// echo $cat->name;
// echo "<br>";
// echo $dog->hair_color;
// echo "<br>";
// echo "<pre>";
// var_dump($cat);
// echo "</pre>";
$cat = new Animal('小花','黑白相間');
echo $cat->getName();
echo $cat->getColor();
$dog = new Animal('小米','扎染黑色');
echo $dog->getName();
echo $dog->getColor();






$cat->run();
$dog->speed();


class Animal
{
    public $type = 'animal';
    public $name = 'John';
    public $hair_color = "brown";

    public function __construct($name,$color)
    {
        $this->name = $name;
        $this->hair_color = $color;
    }

    public function getName()
    {
        return $this->name;
    }
    public function getColor()
    {
        return $this->hair_color;
    }

    public function run()
    {
        echo "我會跑喔!";
        // $this->speed();
        // echo$this->type;
    }
    private function speed()
    {
        echo "我會叫喔!";
    }
}
