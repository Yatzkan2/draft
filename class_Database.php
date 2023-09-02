<?php
    class Database {
        private $server;
        private $username;
        private $password;
        private $dbname;
        private $connection;
        public function __construct($server, $username, $password, $dbname) {
            $this->server = $server;
            $this->username = $username;
            $this->password = $password;
            $this->dbname = $dbname;
            $this->connect();
        }
        public static function create_db($dbname, $server, $username, $password="") {
            $conn=mysqli_connect($server, $username, $password);
            if(!$conn) {
                die("Failed connecting to server '$server'. <br>".mysqli_connect_error()); //maybe need to redirect to othe page
            } 
            //Database creation query
            $query = "create database $dbname"; 
            if (mysqli_query($conn, $query)) {
                echo "database $dbname has created. <br>";
            }
            else {
                echo "Failed creating database $dbname. <br>". mysqli_error($conn);
            }
            mysqli_close($conn);
        }
        public function create_table($tablename, $columns=[]) {
            //create table query generation
            $query = "create table $tablename ( ";
            foreach($columns as $col) {
                $query .= "$col, ";
            }
            $query = substr($query, 0, -2); //trimming the last ',' character.
            $query .= ");";

            //echo $query;
            if (mysqli_query($this->connection, $query)) {
                echo "table $tablename created <br>";
            }
            else {
                echo "Failed creating table $tablename. <br>". mysqli_error($this->connection);
            }
        }
        public function insert($tablename, $columns=[], $values=[]) {
            if(count($columns)==0 or count($values)==0) {
                echo "inserting empty line is not allowed. <br>";
            }
            else if(count($columns) != count($values)) {
                echo "number of columns is not equal to the number of values. <br>";
            }
    
            else {
                $query = "insert into $tablename ( "; //generating the insert query.
                foreach($columns as $col) {
                    $query.="$col, ";
                }
                $query = substr($query,0,-2);
                $query .= ") values ( ";
                foreach($values as $val) {
                    $query.="$val, ";
                }
                $query = substr($query,0,-2);
                $query .= ");";
                //echo $query;
                mysqli_query($this->connection, $query);
            }
        }
        public function delete_table($tablename) {
            $query = "DROP TABLE $tablename;";
            
            if (mysqli_query($this->connection, $query)) {
                //table deleted successfully
            } else {
                throw new Error("Failed to delete '$tablename' table: " . mysqli_error($this->connection)); //error handling is not consistent. should improve that.
            }
        }
        public function update($tablename, $field, $newdata, $condition) {
            $query = "update $tablename set $field = $newdata where $condition;";
            
            // echo $query;
            if(mysqli_query($this->connection, $query)) {
                //updating probably succeded
            } else {
                echo "updating failed" . mysqli_error($this->connection);
            }
        }
        
        public function select($tables, $columns = "*", $condition = ""){
            $query="select " . $columns . " from " . $tables . $condition;
            $result = mysqli_query($this->connection, $query);
            while($row = mysqli_fetch_assoc($result)){
                // echo "<pre>";
                // print_r($row);
                // echo "</pre>";
                foreach($row as $val){
                    echo "$val ";
                }
                echo "<br>";
            }
            return $result;
        }
        
        private function connect(){
            $this->connection = mysqli_connect($this->server, $this->username, $this->password, $this->dbname);
            if(!($this->connection)){
                die("connecting to database failed. <br>");
            }
        }
        public function close_connection() {
            if ($this->connection) {
                mysqli_close($this->connection);
            }
        }

    }
?>