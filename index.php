<?php
include 'add_todo.php';


$db = new Database();

try {

    $conn = $db->connect();


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $TodoInput = $_POST['TodoInput'];
        $TodoDescription = $_POST['TodoDescription'];


        $db->insertTask($TodoInput, $TodoDescription);
    }


    $tasks = $db->fetchTasks();
} catch (Exception $e) {
    echo "<p style='color:red;'>Error: " . $e->getMessage() . "</p>";
} finally {

    $db->close();
}
