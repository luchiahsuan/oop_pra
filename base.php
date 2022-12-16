<?php

$student = new DB('students');
$Dept=new DB('dept');
echo $Dept->find(2)->name;

// var_dump($student);
$john=$student->find(30);
echo is_object($john);
echo"<pre>";
print_r($john);
echo"</pre>";
echo$john->name;

echo "<br>";
$stus = $student->all(['dept'=>3]);
echo "<br>";
foreach ($stus as $stu) {
    echo $stu['parents']."=>".$stu['dept'];
    echo "<br>";
}
// var_dump($stus);

class DB
{
    protected $table;
    protected $dsn = "mysql:hosy=localhost;charset=utf8;dbname=school";
    protected $pdo;
    public function __construct($table)
    {
        $this->pdo = new PDO($this->dsn, 'root', '');
        $this->table = $table;
    }
    public function all(...$args)
    {

        // global $pdo;
        $sql = "select * from $this->table ";

        if (isset($args[0])) {
            if (is_array($args[0])) {
                //是陣列 ['acc'=>'mack','pw'=>'1234'];
                //是陣列 ['product'=>'PC','price'=>'10000'];

                foreach ($args[0] as $key => $value) {
                    $tmp[] = "`$key`='$value'";
                }

                $sql = $sql . " WHERE " . join(" && ", $tmp);
            } else {
                //是字串
                $sql = $sql . $args[0];
            }
        }

        if (isset($args[1])) {
            $sql = $sql . $args[1];
        }

        echo $sql;
        return $this->pdo
            ->query($sql)
            ->fetchAll(PDO::FETCH_ASSOC);
    }


function find($id){
    $sql="select * from `$this->table` ";

    if(is_array($id)){
        foreach($id as $key => $value){
            $tmp[]="`$key`='$value'";
        }

        $sql = $sql . " where " . join(" && ",$tmp);

    }else{

        $sql=$sql . " where `id`='$id'";
    }
    //echo $sql;
    $row = $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    $data = new stdClass;
    foreach ($row as $col => $value) {
        $data->{$col} = $value;
    }
    return $data;
}
}