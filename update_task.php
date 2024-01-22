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

 // step 3: get student id and updated name from $_POST
 $todo_completed = $_POST["todo_completed"];
 $todo_id = $_POST["todo_id"];

 // do error checking. Check if todo name is empty or not


   // Step 4: update the name in database
       // 4.1 - sql command (recipe)
       if($todo_completed===0){
        
       }
       $sql = "UPDATE todos SET completed = 1 WHERE id = :id";
       // 4.2 - prepare (put everything into the bowl)
       $query = $database->prepare( $sql );
       // 4.3 - execute (cook it)
       $query->execute([
           'id' => $todo_id
       ]);

   // Step 5: redirect back to index.php
   header("Location: index.php");
   exit;

 
