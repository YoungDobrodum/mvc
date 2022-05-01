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
        $this->database = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if($this->database->connect_errno !== 0){
            //TODO log
            throw new \Exception($this->database->connect_error);
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

    /**
     * add new note -
     * @param string $noteText
     * @return bool
     */
    public function add (string $noteText)
    {
        $sql = "INSERT INTO notes (text) VALUES ('$noteText');";
        return $this->database->query($sql);
    }

    /**
     * edit note in database
     * @param int $index
     * @param string $note
     * @return bool
     */
    public function edit(int $index, string $note)
    {
        $sql = "UPDATE notes SET text = '$note' WHERE id = '$index';";
        return $this->database->query($sql);
    }

    /**
     * delete note from database
     * @param int $index
     * @return bool|
     *
     */
    public function delete(int $index)
    {
        $sql = "DELETE FROM notes WHERE id = '$index';";
        return $this->database->query($sql);
    }
}