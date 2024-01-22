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

  // Step 3: grab the name from $POST
    $todo_label = $_POST["todo_label"];

  // Step 4: add the name into the database
    //4.1 - sql command
    $sql = 'INSERT INTO todos(`label`) VALUES (:label)';
    // 4.2 -prepare
    $query = $database ->prepare($sql);
    // 4.3 - execute
    $query-> execute([
        'label' => $todo_label
    ]);

  // Step 5: redirect the user back to index.php
   header("Location: index.php");
   exit;