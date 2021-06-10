<?php

class User extends database_object
{
    protected static $database_table = 'register';
    protected static $database_table_fields = array('username', 'firstname', 'lastname', 'user_password');

    public $id;
    public $username;
    public $firstname;
    public $lastname;
    public $user_password;

    public static function find_by_id($id)
    {
        global $db;
        $the_result_array = static::find_by_query("SELECT * FROM " . static::$database_table . " WHERE id = $id ");

        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }

    public static function user_verify($username, $password)
    {
        global $db;

        $username = $db->escape_string($username);
        $user_password = $db->escape_string($password);

        $sql = "SELECT * FROM " . static::$database_table . " WHERE ";
        $sql .= "username = '{$username}' AND user_password = '{$user_password}' ";
        $sql .= "LIMIT 1";

        $array_result = static::find_by_query($sql);

        return !empty($array_result) ? array_shift(($array_result)) : false;
    }

    // public static function find_by_id($id)
    // {
    //     global $db;
    //     $the_result_array = static::find_by_query("SELECT * FROM " . static::$database_table . " WHERE id = $id ");

    //     return !empty($the_result_array) ? array_shift($the_result_array) : false;
    // }




}//end of class