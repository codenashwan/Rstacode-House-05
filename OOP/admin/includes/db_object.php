<?php

class db_object{
 protected static $table_name = "user"; 


    public static function get_all($condition) {
        if($condition === 0){
        return static::query_proccess("SELECT * FROM ".static::$table_name." ");
    }else{
        return static::query_proccess("SELECT * FROM ".static::$table_name." WHERE $condition ");
    }
}

    public static function get_by_id($condition) {
        $single_user_data =  static::query_proccess("SELECT * FROM ".static::$table_name." WHERE $condition LIMIT 1");
        return !empty($single_user_data) ? array_shift($single_user_data) : false;
    }       

    public static function query_proccess($sql) {
        global $db;
        $result = $db-> query($sql);
        $all_data_in_db = array();
        while ($row = mysqli_fetch_array($result)) {
            $all_data_in_db[] = static::instant($row);
        }
        return $all_data_in_db;
    }


    public static function instant($columns) {
        $userClass = new static;
        foreach($columns as $property => $value) {
            if ($userClass->has_property($property)) {
                $userClass->$property = $value;
            }
        }
        return $userClass;
    }
    public function properties(){
        $prop = array();
        global $db;
        foreach(static::$columns as $column){
            if(property_exists($this , $column)){
                $prop[$column] = "'" . $db->secure($this->$column) ."'";
            }
        }
        return $prop;
    }

    
    private function has_property($property) {
        $class_property = get_object_vars($this);
        return array_key_exists($property, $class_property);
    }

    
    public function create(){
        $prorp = $this->properties();
        global $db;
        $execute = $db->query("INSERT INTO ".static::$table_name." ( ". implode(", " ,array_keys($prorp)) .") VALUES ( ". implode(", " ,array_values($prorp)) .")");
        if($execute){
            return true;
        }else{
            return false;
        }
    }

    public function update(){
        $prop =  $this->properties();
        $property_update = array();
        global $db;
        foreach ($prop as $key => $value) {
            $property_update[] = " `{$key}` = {$value}";
        }
        $id = $db->secure($this->id);     
        $execute = $db->query("UPDATE  ".static::$table_name." SET ".implode("," , $property_update)." WHERE `id` = '$id'");
        if($execute){
            return true;
        }else{
            return false;
        }
    }


    public function delete($condition){
        global $db;
        $execute = $db->query("DELETE FROM  ".static::$table_name." WHERE $condition ");
        if($execute){
          return true;
        }else{
        return false;
        }
    }


}

?>