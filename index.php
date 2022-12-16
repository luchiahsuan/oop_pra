<a href="./static.php">static</a>
<a href="./chaining.php">chaining</a>
<a href="./base.php">base</a>
<br>
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
$cat = new Cat('小花', '黑白相間');
echo $cat->getType();
echo $cat->getName();
echo $cat->getColor();
echo $cat->hide();
echo "<br>";

$dog = new Dog('小米', '扎染黑色');
echo $dog->getType();
echo $dog->getName();
echo $dog->getColor();
echo $dog->eat();
echo "<br>";




$cat->run();
// $dog->speed();


class Animal
{
    public $type = 'animal';
    public $name = 'John';
    public $hair_color = "brown";

    public function __construct($type, $name, $color)
    {
        $this->type = $type;
        $this->name = $name;
        $this->hair_color = $color;
    }
    public function getType()
    {
        return $this->type;
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
        // echo "我會跑喔!";
        // $this->speed();
        // echo$this->type;
    }
    private function speed()
    {
        echo "我會叫喔!";
    }
}

class Cat extends Animal{
    public function __construct($name,$color)
    {
        $this->type = '貓';
        $this->name = $name;
        $this->hair_color = $color;
    }
    public function hide(){
        echo "很會躲";
    }
}
class Dog extends Animal{
    public function __construct($name,$color)
    {
        $this->type = '狗';
        $this->name = $name;
        $this->hair_color = $color;
    }
    public function eat(){
        echo "很會吃";
    }
}