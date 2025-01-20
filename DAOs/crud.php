<?php

require_once "../config/db.php";

class Crud {
	private $conn;
    public function __construct() {
        $this->conn = Database::getInstance()->getConnection();
    }
	public function read($column){
			$columns = implode(", ",$column);
			$query = 'SELECT'.' '.$columns.' FROM '.$this->table.'';
			$dbh_query = $this->conn->prepare($query);
			$dbh_query->execute();
			$result = $dbh_query->fetchAll();
			return $result;
	}
	public function create($column){
		$columns = array_keys($column);
			$col_value = implode(", :",$columns);
			$col_prepare = implode(", ",$columns);
			$query = 'INSERT INTO'.' '.$this->table.' ('.$col_prepare.') VALUES (:'.$col_value.')';
			$result = $this->conn->prepare($query);
			$result->execute($column);	
			return $result;
	}
	public function update($column){
		$columns = array_keys($column);
			$col_set = implode(",",$columns);
			$query_array = [];
			foreach ($column as $key => $value) {
				if ($key == 'id') {
					$query_array_id = $key.' = :'.$key;
				} else {
					$query_array[] = $key.' = :'.$key;
				}
			}
			$query = 'UPDATE'.' '.$this->table.' SET '.implode(", ",$query_array).' WHERE '.$query_array_id.'';
			$resutl = $this->conn->prepare($query);
			$resutl->execute($column);
			return $resutl;
	}
	public function delet($column){
	    	$columns = array_keys($column);
			$col_set = implode(",",$columns);
			$query = 'DELETE FROM'.' '.$this->table.' WHERE '.$col_set.'= :'.$col_set.'';
			$resutl = $this->conn->prepare($query);
			$resutl->execute($column);
			return $resutl;
	}
	public function findBy($column) {
		$columns = array_keys($column);
		$col_set = implode(",",$columns);
		$query = 'SELECT * FROM ' . $this->table . ' WHERE '.$col_set.'= :'.$col_set.'';
		$result = $this->conn->prepare($query);
		$result->execute($column);
		return $result->fetchAll();
	}
}
