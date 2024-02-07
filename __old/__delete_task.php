<?php

  // Step 1: list out all the database info
  $host = 'devkinsta_db';
  $database_name = 'TODO_list';
  $database_user = 'root';
  $database_password = 'ohx5h6Sd98yrmgJs';

  // Step 2: connect to the database
  $database = new PDO(
   "mysql:host=$host;dbname=$database_name",
   $database_user,
   $database_password
 );

 // step 3: get student ID from the $_POST
 $todo_id = $_POST["todo_id"];

 // step 4: delete the student from the database using student ID
   // 4.1 - sql command (recipe)
   $sql = "DELETE FROM todos where id = :id";
   // 4.2 - prepare (put everything into the bowl)
   $query = $database->prepare($sql);
   // 4.3 - execute (cook it)
   $query->execute([
       'id' => $todo_id
   ]);

 // Step 5: redirect back to index.php
 header("Location: index.php");
 exit;