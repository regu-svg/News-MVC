<?php


class connect
{
    public function database()
    {
        $conn = new mysqli('localhost', "root", "", "records");
        if ($conn->connect_error) {
            die("connect failed: " . $conn->connect_error);
        }
        return $conn;
    }
}
