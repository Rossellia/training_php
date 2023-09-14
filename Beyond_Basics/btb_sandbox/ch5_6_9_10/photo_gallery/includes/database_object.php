<?php 
require_once(INCLUDES_PATH.DS.'database.php');

class DatabaseObject{
    protected static $table_name = '';
    protected static $db_fields = array();
    //protected static $db_fields = array('id', 'username', 'password', 'first_name', 'last_name');
   //Common Database Methods

   public static function find_all(){
    //global $database;
    //$result_set = $database->query("SELECT * FROM users");
    $result_set = static::find_by_sql("SELECT * FROM ".static::$table_name);
    return $result_set;
}

public static function find_by_id($id=0){
    global $database;
    //$result_set = $database->query("SELECT * FROM users WHERE id =" . $database->escape_value($id));
    $result_array = static::find_by_sql("SELECT * FROM ". static::$table_name ." WHERE id =" . $database->escape_value($id) . " LIMIT 1");
    //$found = $database->fetch_array($result_set);
    //return $found;
    return !empty($result_array) ? array_shift($result_array) : false;
}
public static function find_by_sql($sql=""){
    global $database;
    $result_set = $database->query($sql);
    $object_array = array();
    while($row = $database->fetch_array($result_set)){
        $object_array[] = static::instantiate($row);
    }
    return $object_array;
}


private static function instantiate($record){
    //Could check that $record exists and is an array
    //Simple, long-form approach
    // $object             = new User();
    // $object->id         = $record['id'];
    // $object->username   = $record['username'];
    // $object->password   = $record['password'];
    // $object->first_name = $record['first_name'];
    // $object->last_name  = $record['last_name'];
    $calss_name = get_called_class();
    $object = new $calss_name;
    // More dynamic, short-form approach:
        foreach($record as $attribute=>$value){
            if($object->has_attribute($attribute)) {
              $object->$attribute = $value;
            }
        }
    return $object;


}
protected function attributes() { 
    // return an array of attribute keys and their values
  //return get_object_vars($this);
    $attributes = array();
	foreach(static::$db_fields as $field) {
	    if(property_exists($this, $field)) {
	      $attributes[$field] = $this->$field;
	    }
	}
	return $attributes;
}

private function has_attribute($attribute){
    // get_object_vars returns an associative array with all attributes 
    // (incl. private ones!) as the keys and their current values as the value
    //$object_vars = get_object_vars($this);
    // We don't care about the value, we just want to know if the key exists
    // Will return true or false
    //return array_key_exists($attribute, $object_vars);
    return array_key_exists($attribute, $this->attributes());
}

protected function sanitized_attributes() {
    global $database;
    $clean_attributes = array();
    // sanitize the values before submitting
    // Note: does not alter the actual value of each attribute
    foreach($this->attributes() as $key => $value){
      $clean_attributes[$key] = $database->escape_value($value);
    }
    return $clean_attributes;
  }

  


}