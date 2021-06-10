<?php

require_once("new_config.php");


class DB
{

    //make connection available to entire class
    public $connection;

    function __construct()
    {
        $this->open_database_connection();
    }

    public function open_database_connection()
    {

        //instantiate db connection
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if ($this->connection->connect_errno) {
            die("Database connection failed badly" . $this->connection->connect_errno);
        }
    }



    public function query_confirm($result)
    {
        // only needed within db class
        if (!$result) {
            die("Database connection failed " . $this->connection->errno);
        }
    }


    public function query($sql)
    {

        $result = $this->connection->query($sql);
        $this->query_confirm($result);

        return $result;
    }

    public function escape_string($string)
    {
        $escaped_string = $this->connection->real_escape_string($string);
        return $escaped_string;
    }

    public function the_insert_id()
    {

        return mysqli_insert_id($this->connection);
    }
} //end of DB class

//instantiate class

$db = new DB();
