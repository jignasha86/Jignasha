<?php
class Base {

protected $instances = array();
protected $total = 0;

public static function Instance() {
       static $inst = null;
       if ($inst === null) {
            $inst = new Base();
        }
        return $inst;
}

/***
*    Add single record
*    Args1 - Object to be added
***/

public function addRecord($instance) {              
       $this->instances[$instance->gpa][] = $instance;
       $this->total += 1;       
}

/***
*    Get all instances
*    No args
***/

public function getAll() { 
       $instances = $this->instances;
       ksort($instances);     
       return $instances;
}

/***
*    Set attributes
*    Args1 - attribute name
*    Args2 - attribute value
***/

public function setPercentile($key, $percentile) {       
       foreach($this->instances[$key] as $item) {
               $item->percentile = $percentile;
       }
}

/***
*    Get total number of instances
*    No args
***/

public function getTotalRecords() {
       return $this->total;
}

}
?>