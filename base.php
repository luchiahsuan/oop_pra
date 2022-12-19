<?php

$student = new DB('students');
// $Dept=new DB('dept');
// echo $Dept->find(2)->name;

// var_dump($student);
// $john=$student->find(30);
// echo is_object($john);
// echo"<pre>";
// print_r($john);
// echo"</pre>";
// echo$john->name;

// $student->del(486);
// $student->save(['name'=>'鹿兒島','dept'=>'3']);
// echo $student->count('id');
$Score=new DB("student_scores");
echo $Score->max('score');
echo "<hr>";
echo $Score->min('score');
echo "<hr>";
echo $Score->avg('score');
echo "<hr>";

// echo "<br>";
// $stus = $student->all(['dept'=>3]);
// echo "<br>";
// foreach ($stus as $stu) {
//     echo $stu['parents']."=>".$stu['dept'];
//     echo "<br>";
// }
// var_dump($stus);
echo $student->sum('graduate_at');
echo "<hr>";
echo $student->sum('graduate_at',['dept'=>'2']);
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


    function find($id)
    {
        $sql = "select * from `$this->table` ";

        if (is_array($id)) {
            foreach ($id as $key => $value) {
                $tmp[] = "`$key`='$value'";
            }

            $sql = $sql . " where " . join(" && ", $tmp);
        } else {

            $sql = $sql . " where `id`='$id'";
        }
        //echo $sql;
        $row = $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
        $data = new stdClass;
        foreach ($row as $col => $value) {
            $data->{$col} = $value;
        }
        return $data;
    }

    function del($id)
    {
        $sql = "delete from `$this->table` ";

        if (is_array($id)) {
            foreach ($id as $key => $value) {
                $tmp[] = "`$key`='$value'";
            }

            $sql = $sql . " where " . join(" && ", $tmp);
        } else {

            $sql = $sql . " where `id`='$id'";
        }
        echo $sql;
        return $this->pdo->exec($sql);

    }

    function save($array)
    {
        if (isset($array['id'])) {
            foreach ($array as $key => $value) {
                $tmp[] = "`$key`='$value'";
            }
            $sql = "updates $this->table set";
            $sql .= join(",", $tmp);
            $sql .= "where `id`='{$array['id']}'";
        } else {
            $cols = array_keys($array);
            $sql = "insert into $this->table (`" . join("`,`", $cols) . "`)
                                       values('" . join("','", $array) . "')";
                                       echo $sql;
            //  return $this -> pdo->exec($sql);
        }
    }

    function count($arg){
        if(is_array($arg)){
            foreach ($arg as $key => $value) {
                $tmp[] = "`$key`='$value'";
            }
            $sql="select count(*) from $this->table where ";
            $sql.=join(" && ",$tmp);
        }else{

            $sql="select count($arg) from $this->table";
            
        }
        echo $sql;
            // return $this->pdo->query($sql)->fetchColumn();
    }

    function sum($col,...$arg){
        if(isset($arg[0])){
            foreach ($arg as $key => $value) {
                $tmp[] = "`$key`='$value'";
            }
            $sql="select sum($col) from $this->table where ";
            $sql.=join(" && ",$tmp);
        }else{

            $sql="select sum($col) from $this->table";
            
        }
        echo $sql;
            return $this->pdo->query($sql)->fetchColumn();
    }
    function max($col,...$arg){
        if(isset($arg[0])){
            foreach($arg[0] as $key => $value){
                $tmp[]="`$key`='$value'";
            }
            $sql="select max($col) from $this->table where ";
            $sql.=join(" && ",$tmp);
        }else{

            $sql="select max($col) from $this->table";
        }

        echo $sql;
        return $this->pdo->query($sql)->fetchColumn();
    }
    function min($col,...$arg){
        if(isset($arg[0])){
            foreach($arg[0] as $key => $value){
                $tmp[]="`$key`='$value'";
            }
            $sql="select min($col) from $this->table where ";
            $sql.=join(" && ",$tmp);
        }else{

            $sql="select min($col) from $this->table";
        }

        echo $sql;
        return $this->pdo->query($sql)->fetchColumn();
    }
    function avg($col,...$arg){
        if(isset($arg[0])){
            foreach($arg[0] as $key => $value){
                $tmp[]="`$key`='$value'";
            }
            $sql="select avg($col) from $this->table where ";
            $sql.=join(" && ",$tmp);
        }else{

            $sql="select avg($col) from $this->table";
        }

        echo $sql;
        return $this->pdo->query($sql)->fetchColumn();
    }

    private function mathsql($math,$col,...$arg){
        if(isset($arg[0])){
            foreach($arg[0] as $key => $value){
                $tmp[]="`$key`='$value'";
            }
            $sql="select avg($col) from $this->table where ";
            $sql.=join(" && ",$tmp);
        }else{
        $sql="select avg($col) from $this->table";
        }

        echo $sql;
        return $this->pdo->query($sql)->fetchColumn();
    }



}

function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}
