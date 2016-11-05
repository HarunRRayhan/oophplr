<?php

/**
* PHP OOP Login Register Project
* You can copy paste it
* @package ooplr
**/

/**
 * DB Main Class
 */
class DB {
   
    private static $_instance = null;
    private $_pdo,
            $_query,
            $_error = false,
            $_results,
            $_count = 0;
    
    /**
     * Construct Function to connect with DB
     */
    private function __construct() {
        try{
            $this->_pdo = new PDO('mysql:host=' . Config::get('mysql/host') . ';dbname=' . Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password'));
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }
    
    /**
     * Static Instance Method
     * @return string
     */
    public static function getInstance() {
        if(!isset(self::$_instance)){
            self::$_instance = new DB();
        }
        return self::$_instance;
    }
    
    /**
     * SQL Query
     * @param string $sql
     * @param array $params
     */
    public function query($sql, $params = array()) {
        $this->_error = false;
        if($this->_query = $this->_pdo->prepare($sql)){
            $x = 1;
            // Chicking Parameters on query and Bind
            if(count($params)){
                foreach($params as $param) {
                    $this->_query->bindValue($x, $param);
                    $x++;
                }
            }
            
            // Executing Query
            if($this->_query->execute()){
                $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
                $this->_count = $this->_query->rowCount();
            } else {
                $this->_error = true;
            }
        }
        return $this;
    } // end query()
    
    
    /**
     * 
     * @param string $action
     * @param string $table
     * @param array $where
     * @return boolean|\DB
     */
    public function action($action, $table, $where = array()) {
        if(count($where) === 3){
            $operators = array('=', '>', '<', '>=', '<=');
            
            $field      = $where[0];
            $operator   = $where[1];
            $value      = $where[2];
            
            // checking valid operator from input
            if(in_array($operator, $operators)){
               $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ? "; 
               if(!$this->query($sql, array($value))->error()) {
                   return $this;
               }
            }
        }
        return false;
    } // end action()
    
    /**
     * gettind data from table
     * @param string $table
     * @param array $where
     * @return array
     */
    public function get($table, $where) {
        return $this->action('SELECT *', $table, $where);
    } // end get()
    
    /**
     * Delete data from table
     * @param string $table
     * @param array $where
     * @return array
     */
    public function delete($table, $where) {
        return $this->action('DELETE', $table, $where);
    } // end delete()
    
    /**
     * Insrting Data
     * @param string $table
     * @param array $fields
     * @return boolean
     */
    public function insert($table, $fields = array()) {
        if(count($fields)) {
            $keys = array_keys($fields);
            $values = '';
            $x = 1;
            
            foreach($fields as $field) {
                $values .= '?';
                if($x < count($fields)) {
                    $values .= ', ';
                }
                $x++;
            }
            
            
            $sql = "INSERT INTO {$table} (`" . implode('`, `', $keys) . "`) VALUES ({$values})";
            //print_r($this->query($sql, $fields));
                        //die();
            if(!$this->query($sql, $fields)->error()) {
                return true;
            }
        }
        return false;
    } // end insert()
    
    
    /**
     * Update existing row
     * @param string $table
     * @param int $id
     * @param array $fields
     * @return boolean
     */
    public function update($table, $id, $fields) {
        $set = '';
        $x = 1;
        
        foreach($fields as $name => $value) {
            $set .= "{$name} = ?";
            if($x < count($fields)) {
                $set .= ', ';
            }
            $x++;
        }
       
        
        $sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";
       
        if(!$this->query($sql, $fields)->error()) {
            return true;
        }
        return false;
    } // end update()
    
    /**
     * Returning Result
     * @return array
     */
    public function results() {
        return $this->_results;
    }
    
    /**
     * Getting First Result only
     * @return array
     */
    public function first() {
        return $this->results()[0];
    }
    
    /**
     * Returning Errors
     * @return bool
     */
    public function error() {
        return $this->_error;
    } // end error()
    
    /**
     * Counting row of result
     * @return int
     */
    public function count() {
        return $this->_count;
    } // end count()
    
}