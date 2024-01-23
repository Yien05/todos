<?php
 // Step 1: list out all tje database info
 $host = 'devkinsta_db';
 $database_name = 'TODO_list';
 $database_user = 'root';
 $database_password = 'ohx5h6Sd98yrmgJs';

 
 // Step 2: Connect to the database to PHP
 $database = new PDO(
    "mysql:host=$host; dbname=$database_name",
    "$database_user",
    "$database_password"
);

 // step 3: get task id and completed is 0/1 from $_POST
$todo_id = $_POST['todo_id'];
$todo_completed = $_POST["todo_completed"];
// do error checking. Check if task is completed or not
if ($todo_completed == 0) {
    $sql = "UPDATE todos SET completed = 1 WHERE id = :id";
} else if ($todo_completed == 1) {
    $sql = "UPDATE todos SET completed = 0 WHERE id = :id";
}
$query = $database->prepare($sql);
$query->execute([
    'id' => $todo_id,
]);
header("Location: index.php");
exit;