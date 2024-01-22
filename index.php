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

 // Step 3: Load the data from the database
   // Step 3.1: -prepare the recipe (SQL command)
   $sql = "SELECT * FROM todos";
   // Step 3.2: -pour everything in the bowl (prepare your database)
   $query = $database->prepare($sql);
   // Step 3.3 -cook it
   $query->execute();
   // Step 3.4 - eat it (fetch all)
   $todos = $query -> fetchAll();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>TODO App</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
    />
    <style type="text/css">
      body {
        background: #f1f1f1;
      }
    </style>
  </head>
  <body>
    <div
      class="card rounded shadow-sm"
      style="max-width: 500px; margin: 60px auto;"
    >
      <div class="card-body">
        <h3 class="card-title mb-3">My Todo List</h3>
        <ul class="list-group">
      <?php foreach ( $todos as $todo): ?>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <div>
            <form 
                method="POST" 
                action="update_task.php"
                class="d-flex gap-1">
                
                  <input 
                  type="hidden"
                  name="todo_id"
                  value="<?= $todo["id"]; ?>" />

                  <input 
                  type="hidden"
                  name="todo_completed"
                  value="<?= $todo["completed"]; ?>" />
              <?php 
              if ( $todo["completed"] == 1 ) { ?>
                 <button class="btn btn-sm btn-success">
                    <i class="bi bi-check-square"></i>
                  </button>
              <?php } else { ?>
                <button class="btn btn-sm btn-light">
                  <i class="bi bi-square"></i>
                </button>

              <?php } ?>

              </form>
              <span class="ms-2"><?= $todo["label"]; ?></span>
             
            </div>
          
           <!-- delete Todo List-->
            <div>
            <form method="POST" action="delete_task.php">
            <input 
                  type="hidden"
                  name="todo_id"
                  value="<?= $todo["id"]; ?>" />
              <button class="btn btn-sm btn-danger">
                <i class="bi bi-trash"></i>
              </button>
              </form>
            </div>
          </li>
      <?php endforeach; ?>  
        </ul>
        <div class="mt-4">
          <form  method="POST"  action="add_task.php"class="d-flex justify-content-between align-items-center">
            <input
              type="text"
              class="form-control"
              placeholder="Add new item..."
              name="todo_label"
              required
            />
            <button class="btn btn-primary btn-sm rounded ms-2">Add</button>
          </form>
          <!--To render the $students data using foreach -->
         


   
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>