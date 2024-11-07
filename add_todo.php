<?php

class Database
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbname = "to-do-task";
    private $conn;


    public function connect()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            throw new Exception("Connection failed: " . $this->conn->connect_error);
        } else {
            echo "connection succesfull";
        }
        return $this->conn;
    }


    public function insertTask($TodoInput, $TodoDescription)
    {
        $stmt = $this->conn->prepare("INSERT INTO to_do_tasks (task_name, task_description) VALUES (?, ?)");
        $stmt->bind_param("ss", $TodoInput, $TodoDescription);

        if ($stmt->execute()) {
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }


    public function fetchTasks()
    {
        $tasks = [];
        $sql = "SELECT * FROM to_do_tasks";
        $result = $this->conn->query($sql);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $tasks[] = $row;
            }
        } else {
            echo "No tasks found.";
        }

        return $tasks;
    }


    public function close()
    {
        if (isset($this->conn) && $this->conn instanceof mysqli) {
            $this->conn->close();
        }
    }
}
