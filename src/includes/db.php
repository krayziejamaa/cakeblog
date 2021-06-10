<?php

class database_object
{

    protected static $database_table = "register";
    protected static $database_table_fields = array('id', 'firstname', 'lastname', 'username', 'password');

    public $errors = array();
    public $error_in_upload_array = array(
        UPLOAD_ERR_OK => 'There is no error',
        UPLOAD_ERR_INI_SIZE => 'The uploaded file exceeds the upload_max_filesize',
        UPLOAD_ERR_FORM_SIZE => 'The uploaded file exceeds the MAX_FILE_SIZE directive',
        UPLOAD_ERR_PARTIAL => 'The uploaded file was only partially uploaded',
        UPLOAD_ERR_NO_FILE => 'No file was uploaded',
        UPLOAD_ERR_NO_TMP_DIR => 'Missing a temporary folder.',
        UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk',
        UPLOAD_ERR_EXTENSION => 'A PHP extension stopped the file upload'
    );


    // public function set_files($file)
    // {
    //     //handle error (no file)
    //     if (empty($file) || !$file || !is_array($file)) {
    //         $this->errors[] = "No file was uploaded";
    //         return false;
    //     } elseif ($file['error'] != 0) {

    //         //otherwise if error we save the error in the array error
    //         $this->errors[] = $this->error_in_upload_array[$file['error']];
    //         return false;
    //     } else {

    //         $this->filename = basename($file['name']);
    //         $this->tmp_path = $file['tmp_name'];
    //         $this->type = $file['type'];
    //         $this->size = $file['size'];
    //     }
    // }

    //so that we don't have to instantiate find_all_users() we use a static method
    public static function find_all()
    {
        //we cannot use static self from a parent class  so we use static
        return static::find_by_query("SELECT * FROM " . static::$database_table . "");
    }

    public static function find_by_id($id)
    {
        global $db;
        $the_result_array = static::find_by_query("SELECT * FROM " . static::$database_table . " WHERE id = $id ");

        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }

    public static function find_by_query($sql)
    {
        global $db;
        $result_set = $db->query($sql);

        //to use the instantiation method we create an empty array to put our object
        $the_object_array = array();


        //we create a loop to fetch th
        //and brings back the results from the table columns
        while ($row = mysqli_fetch_array($result_set)) {


            $the_object_array[] = static::instatation($row);
        }
        return $the_object_array;
    }

    public static function instatation($the_record)
    {
        //
        $calling_class = get_called_class();


        //we cannot instantiate new Self from a parent class
        //so now we can instantiate the calling class User rather than database_object
        $the_object = new $calling_class;

        //a simpler way to instantiate will be to use a foreach loop
        //we first obtain the record and then loop through the record
        //we obtain the key($the_attribute) and the $value out of the key
        foreach ($the_record as $the_attribute => $value) {
            //if the object has the atribute and the key exists
            if ($the_object->has_the_attribute($the_attribute)) {

                // we then assign that object which is the key that value
                $the_object->$the_attribute = $value;
            }
        }

        return $the_object;
    }

    //we create a function to be used only in the class and pass
    //in the parameter $the_attribute
    private function has_the_attribute($the_attribute)
    {

        //we use a built-in php function which returns all the properties of the class
        //even if private.
        //we pass in the class and can pseudo variable $this
        $object_properties = get_object_vars($this);

        //once we have all the properties and the key ($the_attribute) exists
        //we use another built in php function array_key exists
        //we then pass in two parameters, what we want($the_attribute) and
        //where it is ($object_properties)
        return array_key_exists($the_attribute, $object_properties);
    }

    public function query($sql)
    {
        $result = $this->connection->query($sql);
        $this->query_confirm($result);
        return $result;
    }

    private function query_confirm($result)
    {
        if (!$result) {
            die("Query failed" . $this->connection->error);
        }
    }

    public function clean_properties()
    {
        global $db;

        //we create an empty array where we place the clean values
        //then returning that array so we can use it
        $clean_properties = array();


        //we want to loop through properties to pull put the keys and values
        //since we want to return properties
        foreach ($this->properties() as $key => $value) {

            //we clean the $value and then assign it to the array
            $clean_properties[$key] = $db->escape_string($value);
        }

        //we then return the array
        return $clean_properties;
    }


    //whenever we create a method to abstract we create a protected functiom
    protected function properties()
    {

        $properties = array();

        foreach (static::$database_table_fields as $database_field) {
            if (property_exists($this, $database_field)) {

                //database_fields as a $ because it is not a property
                $properties[$database_field] = $this->$database_field;
            }
        }

        return $properties;
    } //end class


    //since we got rid of the escape string while abstracting the create and update method
    //we can create a new method that does the same



    public function save()
    {

        return isset($this->id) ? $this->update() : $this->create();
    }


    public function create()
    {
        global $db;

        $properties = $this->clean_properties();

        $sql = "INSERT INTO " . static::$database_table . "(" . implode(",", array_keys($properties)) . ")";
        $sql .= "VALUES ('" . implode("','", array_values($properties)) . "')";


        //To send the database class query, which will return a boolean
        //we can therefore put it in an iff statement
        if ($db->query($sql)) {


            $this->id = $db->the_insert_id();

            return true;
        } else {

            return false;
        }
    } // end of create method


    public function update()
    {

        global $db;

        $properties = $this->clean_properties();

        $properties_pairs = array();

        foreach ($properties as $key => $value) {

            $properties_pairs[] = "{$key}='{$value}'";
        }

        $sql = "UPDATE " . static::$database_table . " SET ";

        $sql .= implode(", ", $properties_pairs);
        $sql .= " WHERE id= " . $db->escape_string($this->id);

        $db->query($sql);


        return (mysqli_affected_rows($db->connection) == 1) ? true : false;
    }

    public function delete()
    {
        global $db;

        $sql = "DELETE FROM " . static::$database_table . "  ";
        $sql .= " WHERE id= " . $db->escape_string($this->id);
        $sql .= " LIMIT 1";

        $db->query($sql);


        return (mysqli_affected_rows($db->connection) == 1) ? true : false;
    }

    //this function/method counts the number of photos, users anf comments
    public static function count_all()
    {

        global $db;

        $sql = "SELECT COUNT(*) FROM " . static::$database_table;
        $result_set = $db->query($sql);
        $row = mysqli_fetch_array($result_set);

        return array_shift($row);
    }
}
