<?php

namespace Models;

class NoteModel
{
    /**
     * @var \mysqli
     */
    protected $database;

    public function __construct()
    {
        $database = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if($database->connect_errno !== 0){
            //TODO log
            throw new \Exception($database->connect_error);
        }
    }

    /**
     * return all notes
     * @return array
     */
    public function all()
    {
        $sql = "SELECT * FROM notes";
        $result = $this->database->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}