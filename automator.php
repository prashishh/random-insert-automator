<?php
    
class Automator
{
    // database config
    protected $hostname;
    protected $username;
    protected $password;
    protected $database;
    protected $connection;
    protected $error;

    // constructor
    function __construct($host, $user, $pass, $db) {
        $this->hostname = $host;
        $this->username = $user;
        $this->password = $pass;
        $this->database = $db;
    
        $this->connectDatabase();
    }

    // create database connection
    private function connectDatabase() {
        
        $this->connection = mysql_connect($this->hostname,$this->username,$this->password);
        mysql_select_db($this->database, $this->connection);
    
        return true;
    }
    
    public function autoInsertion($table, $temp_array, $times) {
        
        for( $k = 0; $k < $times; $k++) {
            // new values' array
            $new_array = array();
            
            // for fetching via index
            $temp_values = array_values($temp_array);
            $temp_keys = array_keys($temp_array);
            
            // get random row for each column
            for ( $i = 0; $i < sizeof($temp_array); $i++ ) {
                $random_row = $this->getRandom(sizeof($temp_values[$i])-1);
                echo $temp_keys[$i] . ' -> ' . $temp_array[$temp_keys[$i]][$random_row] . '<br>';
                array_push($new_array, "'" . $temp_array[$temp_keys[$i]][$random_row] . "'");
            }
            
            // implode with comma for insert operation
            $new_values = implode(",", $new_array);
            
            // insertion
            if(!mysql_query('INSERT INTO ' . $table . ' VALUES ( ' . $new_values . ');', $this->connection)){
                $this->error = "Could not Insert to Database. MySQL Error: ". mysql_error();
                return false;	
            }
        }
        
        return true;
    }
    
    // gets random number, input string
    private function getRandom($length) {
        return mt_rand(0, $length);
    }
        
    // error alert
    public function insert_error(){
        return $this->error;
    }
    
    // close database connection
    private function closeDatabase() {
       // if($this->connection){mysql_close($this->connection);}
    }
    
    // destructor
    function __destruct() {
      // $this->closeDatabase();
    }
}

?>