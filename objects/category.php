<?php
class Category{
 
    // database connection and table name
    private $conn;
    private $table_name = "categories";
 
    // object properties
    public $id;
    public $name;
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    // used by select drop-down list
    function read(){
        //select all data
        $query = "SELECT
                    id, name
                FROM
                    " . $this->table_name . "
                ORDER BY
                    name";  
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }
// used to read category name by its ID
function readName(){
     
    $query = "SELECT name FROM " . $this->table_name . " WHERE id = ? limit 0,1";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->bindParam(1, $this->id);
    $stmt->execute();
 
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
    $this->name = $row['name'];
}
function readAll($from_record_num, $records_per_page){
 
    $query = "SELECT
                id, name
            FROM
                " . $this->table_name . "
            ORDER BY
                name ASC
            LIMIT
                {$from_record_num}, {$records_per_page}";
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
 
    return $stmt;
}
public function countAll(){
 
    $query = "SELECT id FROM " . $this->table_name . "";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
 
    $num = $stmt->rowCount();
 
    return $num;
    }
function create(){
 
        //write query
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                   id=:id, name=:name1";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->name=htmlspecialchars(strip_tags($this->id));
        $this->price=htmlspecialchars(strip_tags($this->name));
        
 
 
        // bind values 
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":name", $this->name);
        
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
}
?>