<?php

class User extends database_object
{
    protected static $database_table = "register";
    protected static $database_fields = array('firstname', 'lastname', 'username');

    public $id;
    public $username;
    public $first_name;
    public $last_name;
    public $password;
    public $user_image;


    public function user_verification($username, $password)
    {
        global $db;

        $username = $db->escape_string($username);
        $password = $db->escape_string($password);

        $sql = "SELECT * FROM " . static::$database_table
            . " WHERE ";
        $sql .= "username = '{username}' AND
        password = '{password}' ";
        $sql .= "LIMIT 1";

        $array_result = static::find_by_query($sql);

        return !empty($array_result) ?
            array_shift(($array_result)) : false;
    }
}
