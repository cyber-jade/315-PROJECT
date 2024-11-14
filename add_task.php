
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add task</title>
    
  </head>
  <body>
    <h2>
      Add Task
    </h2>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
          
      <input type="text" name="task-name" required placeholder="enter task"/>
      <button type="submit" name="subadd">
        Add Task
      </button>
      
    </form>
    <h2>
      <a href="index.php">
        Back to Homepage
      </a>
    </h2>
  </body>
</html>
<?php
include 'db.php';

if (isset($_POST['subadd'])) {

    $task = $_POST["task-name"];
    
    $ins_sql = "INSERT INTO tasks (taskname)
    VALUES ('$task')";
if ($conn->query($ins_sql) === TRUE) {
echo 'New task created successfully';
} else {
echo " Error:  . $ins_sql. $conn->error " ;
}
}
?>