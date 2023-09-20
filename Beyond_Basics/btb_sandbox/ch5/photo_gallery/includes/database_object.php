<?php 
require_once(INCLUDES_PATH.DS.'database.php');

class DatabaseObject{
    protected static $table_name = 'users';
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

private function has_attribute($attribute){
    // get_object_vars returns an associative array with all attributes 
    // (incl. private ones!) as the keys and their current values as the value
    $object_vars = get_object_vars($this);
    // We don't care about the value, we just want to know if the key exists
    // Will return true or false
    return array_key_exists($attribute, $object_vars);
}

}